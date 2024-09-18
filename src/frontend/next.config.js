/** @type {import("next").NextConfig} */
const nextConfig = {
    cacheHandler: require.resolve("./cache-handler.js"),
    env: {
        NEXT_PUBLIC_REDIS_INSIGHT_URL: process.env.REDIS_INSIGHT_URL ?? "http://localhost:8001",
    },
    images: {
        remotePatterns: [
            {
                protocol: "https",
                hostname: process.env.ASSETS_URL,
            },
        ],
    },
    webpack: (config) => {
        config.watchOptions = {
            poll: 1000,
            aggregateTimeout: 300,
            ignored: ["**/node_modules"],
        };
        return config;
    },
    output: "standalone",
};

module.exports = nextConfig;
