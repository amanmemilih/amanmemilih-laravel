FROM composer:2.2 AS builder

# Set working directory inside the container
WORKDIR /app

# Copy only the composer files initially; this helps cache dependency installation
COPY composer.json composer.lock ./

# Install PHP dependencies without dev packages, optimize autoloading, and disable scripts
RUN composer install --no-dev --prefer-dist --no-scripts --optimize-autoloader

# Now bring in the rest of your application code
COPY . .

# (Optional) Run any build or optimization steps needed for production.
# For example, you might pre-cache configurations and routes:
RUN php artisan config:cache && php artisan route:cache

FROM php:8.2-fpm-alpine

# Install system-level dependencies and PHP extensions required by your app.
# Use apk’s no-cache flag to keep the image size minimal.
RUN apk add --no-cache \
    libzip-dev libpng libjpeg-turbo freetype brotli-dev && \
    docker-php-ext-configure zip && \
    docker-php-ext-install pdo_mysql zip

# Install PHP opcache and pcntl for performance and signal handling
RUN docker-php-ext-install opcache pcntl

# Install dependencies needed to compile Swoole extension
RUN apk add --no-cache $PHPIZE_DEPS

# Install the Swoole extension from PECL and enable it
RUN pecl install swoole && docker-php-ext-enable swoole

# Set the working directory
WORKDIR /app

# Copy the built application from the builder stage
COPY --from=builder /app /app
# Instead of copying a possibly missing .env file, copy the .env.example file and rename it as .env
COPY --from=builder /app/.env.example /app/.env

# Ensure proper permissions for Laravel’s storage and bootstrap/cache directories
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose the port that Octane will listen on (default is 8000)
EXPOSE 8000

# Command to run Laravel Octane with Swoole when the container starts.
CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000"]
