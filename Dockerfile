FROM allesonline/laravel:php8.3-node20-alpine3.19 as node_modules

WORKDIR /build

# Copy package.json
COPY --chown=docker:docker ./src/laravel/package.json ./src/laravel/package-lock.json ./src/laravel/vite.config.js /build/

# Install node_modules
RUN npm install

FROM allesonline/laravel:php8.3-node20-alpine3.19

# Set SSH private key
ARG SSH_PRIVATE_KEY
RUN echo "$SSH_PRIVATE_KEY" >> ~/.ssh/id_rsa &&\
    chmod 600 ~/.ssh/id_rsa

# Add application
COPY --chown=docker:docker ./src/laravel/ /var/www/html/

# Copy node_modules
COPY --chown=docker:docker --from=node_modules /build/node_modules /var/www/html/node_modules/

# Composer
RUN composer install --no-cache --no-dev --optimize-autoloader

# Set APP_URL which is needed by Vite to build
ARG APP_URL
ENV APP_URL=$APP_URL

# Build assets
RUN npm run build

# Remove SSH private key
RUN rm ~/.ssh/id_rsa
