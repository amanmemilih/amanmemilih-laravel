#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e

# Clear and cache config
php artisan config:clear
php artisan config:cache

# Start Octane server
php artisan octane:start --server=swoole --host=0.0.0.0 --port=8000
