FROM allesonline/laravel:php8.3-node20-alpine3.19 as node_modules

WORKDIR /build

# Copy package.json
COPY --chown=docker:docker ./package.json ./package-lock.json vite.config.js /build/

# Install node_modules
RUN npm install

FROM allesonline/laravel:php8.3-node20-alpine3.19 as experience_build

WORKDIR /build

# Add Github to known hosts
RUN ssh-keyscan github.com >> ~/.ssh/known_hosts

# Set SSH private key, make sure you have it installed on ~/.ssh/id_rsa
ARG EXPERIENCE_SSH_PRIVATE_KEY
RUN echo "$EXPERIENCE_SSH_PRIVATE_KEY" >> ~/.ssh/id_rsa &&\
    chmod 600 ~/.ssh/id_rsa

# Retrieve GIT repo
RUN git clone git@github.com:pressplay-dev/westfalia-fruit-experience.git --branch main ./

# Set APP_URL
ARG APP_URL
ENV APP_URL=$APP_URL

# Install JQ
USER root
RUN apk add jq
USER docker

# Retrieve URI's from CMS
RUN wget "${APP_URL}/api/experience" --no-check-certificate -O uri.json || touch uri.json

# Create build for every URI
RUN jq -r '.[]' uri.json | while read i; do \
      (wget "${APP_URL}/api/experience/${i}" --no-check-certificate -O ${i}.json && ./export ${i}.json ${i}) || true; \
    done;

FROM allesonline/laravel:php8.3-node20-alpine3.19

# Set SSH private key
ARG SSH_PRIVATE_KEY
RUN echo "$SSH_PRIVATE_KEY" >> ~/.ssh/id_rsa &&\
    chmod 600 ~/.ssh/id_rsa

# Add application
COPY --chown=docker:docker ./ /var/www/html/

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

# Copy experience page
COPY --chown=docker:docker --from=experience_build /build/static-export* /var/www/html/public/
