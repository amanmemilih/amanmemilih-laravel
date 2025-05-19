FROM php:8.3-alpine3.19

# Locate the application
WORKDIR /var/www

# Instal php depedencies
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd zip pdo pdo_mysql swoole pcntl

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install system dependencies
RUN apk add --no-cache \
    nodejs \
    npm

# Install node dependencies for watching
RUN npm install -g chokidar-cli

# Set npm global path
ENV PATH="=/home/node/.npm-global/bin:${PATH}"

# Set PHP memory_limit to -1
RUN echo "memory_limit=-1" > /usr/local/etc/php/conf.d/memory-limit.ini
RUN echo "upload_max_filesize=1G" > /usr/local/etc/php/conf.d/uploads.ini
RUN echo "post_max_size=1G" > /usr/local/etc/php/conf.d/uploads.ini

# Set permissions
# RUN chown -R www-data:www-data /var/www/storage

# Optional: Remove pcntl from disabled functions in php.ini
RUN sed -i 's/disable_functions = pcntl_*/disable_functions = /' /usr/local/etc/php/php.ini || true

# CMD ["tail", "-f", "/dev/null"]
CMD ["php", "artisan", "octane:start", "--host=0.0.0.0", "--watch"]