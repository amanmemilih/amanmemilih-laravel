FROM composer:2.2 AS builder

# Set working directory inside the container
WORKDIR /app

# Copy only the composer files initially to leverage Docker caching
COPY composer.json composer.lock ./

# Install PHP dependencies without dev packages, optimize autoloading and disable scripts
RUN composer install --no-dev --prefer-dist --no-scripts --optimize-autoloader

# Bring in the rest of your application code
COPY . .

# Pre-cache Laravel configuration and routes for production
RUN php artisan config:cache && php artisan route:cache

FROM php:8.2-fpm-alpine

# Set the working directory
WORKDIR /app

# Install minimal runtime dependencies
RUN apk add --no-cache \
    libpng \
    libjpeg-turbo \
    freetype \
    libzip \
    brotli

# Install build dependencies for compiling PHP extensions, compile them and then remove the build deps
RUN apk add --no-cache --virtual .build-deps \
    libzip-dev \
    brotli-dev \
    $PHPIZE_DEPS && \
    apk add --no-cache \
    libstdc++ \
    openssl \
    pcre \
    zlib && \
    docker-php-ext-configure zip && \
    docker-php-ext-install pdo_mysql zip opcache pcntl && \
    pecl install swoole && docker-php-ext-enable swoole && \
    apk del .build-deps

# Copy the built application from the builder stage
COPY --from=builder /app /app
# Use .env.example as a default if .env is missing
COPY --from=builder /app/.env.example /app/.env

# Ensure proper permissions for storage and cache directories
RUN chown -R www-data:www-data storage bootstrap/cache

RUN php artisan config:clear
RUN php artisan cache:clear

RUN php artisan octane:install --server=swoole

RUN php artisan key:generate

# Expose the port that Laravel Octane will listen on (default 8000)
EXPOSE 8000

# Run Laravel Octane with Swoole
CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000"]
