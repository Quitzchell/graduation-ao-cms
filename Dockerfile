FROM allesonline/laravel:php8.3-node20-alpine3.19

# Set SSH private key
ARG SSH_PRIVATE_KEY
RUN echo "$SSH_PRIVATE_KEY" >> ~/.ssh/id_rsa &&\
    chmod 600 ~/.ssh/id_rsa

# Add application
COPY --chown=docker:docker src/backend/ /var/www/html/

# Composer
RUN composer install --no-cache --no-dev --optimize-autoloader

# Remove SSH private key
RUN rm ~/.ssh/id_rsa
