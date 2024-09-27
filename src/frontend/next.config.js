/** @type {import("next").NextConfig} */
const nextConfig = {
    cacheHandler: require.resolve("./cache-handler.js"),
    env: {
        NEXT_PUBLIC_REDIS_INSIGHT_URL: process.env.REDIS_INSIGHT_URL ?? "http://localhost:8001",
    },
    images: {
        unoptimized: true,
        remotePatterns: [
            // Local
            {
                protocol: "https",
                hostname: "graduation-ao-cms-admin.local.alles.onl",
                port: "",
                pathname: "/**",
            },
            // Staging
            {
                protocol: "https",
                hostname: "graduation-ao-cms-backend.staging.alles.onl",
                port: "",
                pathname: "/**",
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
