# Use a PHP base image
FROM php:8.3-fpm-alpine3.19 AS base

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apk add --no-cache curl \
    nodejs \
    npm \
    git \
    icu-dev \
    libintl \
    libzip-dev \
    mysql-client

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Use a separate stage for the application
FROM base

# Copy necessary files from the composer stage including composer
COPY --from=base /usr/local/bin/composer /usr/local/bin/composer

# Install required PHP extensions
RUN docker-php-ext-install  \
    pdo \
    pdo_mysql \
    mysqli \
    intl \
    zip \
    bcmath

# Copy the rest of the application files
COPY . .

EXPOSE 8080
