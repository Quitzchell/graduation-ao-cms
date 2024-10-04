// require("./envConfig.ts");

const { CacheHandler } = require("@neshca/cache-handler");
const createRedisHandler = require("@neshca/cache-handler/redis-strings").default;
const createLruHandler = require("@neshca/cache-handler/local-lru").default;
const { PHASE_PRODUCTION_BUILD } = require("next/constants");
const { createClient } = require("redis");

/* from https://caching-tools.github.io/next-shared-cache/redis */
CacheHandler.onCreation(async () => {
    let client;
    // use redis client during build could cause issue https://github.com/caching-tools/next-shared-cache/issues/284#issuecomment-1919145094
    if (PHASE_PRODUCTION_BUILD !== process.env.NEXT_PHASE) {
        try {
            let isReady = false;

            // Create a Redis client.
            client = createClient({
                username: process.env.REDIS_USERNAME,
                password: process.env.REDIS_PASSWORD,
                socket: {
                    host: process.env.REDIS_HOST ?? "localhost",
                    port: process.env.REDIS_PORT ?? 6379,
                    tls: (process.env.REDIS_SCHEME || "tls") === "tls",
                    rejectUnauthorized: false,
                    reconnectStrategy: () => (isReady ? 5000 : false),
                },
            });

            // Redis won't work without error handling.
            // NB do not throw exceptions in the redis error listener,
            // because it will prevent reconnection after a socket exception.
            client.on("error", (e) => {
                if (typeof process.env.NEXT_PRIVATE_DEBUG_CACHE !== "undefined") {
                    console.warn("Redis error", e);
                }
            });

            client.on("ready", () => (isReady = true));
        } catch (error) {
            console.warn("Failed to create Redis client:", error);
        }
    }

    if (client) {
        try {
            console.info("Connecting Redis client...");

            // Wait for the client to connect.
            // Caveat: This will block the server from starting until the client is connected.
            // And there is no timeout. Make your own timeout if needed.
            await client.connect();
            console.info("Redis client connected.");
        } catch (error) {
            console.warn("Failed to connect Redis client:", error);

            console.warn("Disconnecting the Redis client...");
            // Try to disconnect the client to stop it from reconnecting.
            client
                .disconnect()
                .then(() => {
                    console.info("Redis client disconnected.");
                })
                .catch(() => {
                    console.warn("Failed to quit the Redis client after failing to connect.");
                });
        }
    }

    /** @type {import("@neshca/cache-handler").Handler | null} */
    let redisHandler = null;
    if (client?.isReady) {
        // Create the `redis-stack` Handler if the client is available and connected.
        redisHandler = await createRedisHandler({
            client,
            keyPrefix: `next-shared-cache-${process.env.APP_NAME}:`,
            timeoutMs: 1000,
        });
    }
    // Fallback to LRU handler if Redis client is not available.
    // The application will still work, but the cache will be in memory only and not shared.
    const LRUHandler = createLruHandler({
        maxItemsNumber: 10000,
        maxItemSizeBytes: 1024 * 1024 * 250, // Limit to 250 MB
    });
    console.warn("Falling back to LRU handler because Redis client is not available.");

    return {
        handlers: [redisHandler, LRUHandler],
        ttl: {
            // This value is also used as revalidation time for every ISR site
            defaultStaleAge: process.env.NEXT_PUBLIC_CACHE_IN_SECONDS,
            // This makes sure, that resources without set revalidation time aren't stored infinitely in Redis
            estimateExpireAge: (staleAge) => staleAge,
        },
    };
});

module.exports = CacheHandler;
