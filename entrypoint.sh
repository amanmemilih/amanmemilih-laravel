#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e

# Clear and cache config
echo APP_KEY= >> .env
php artisan key:generate
php artisan config:clear
php artisan storage:link

# Start Octane server
php artisan octane:start --server=swoole --host=0.0.0.0 --port=8000
