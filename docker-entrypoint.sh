#!/bin/bash

# 1. Exit on error
set -e

# 2. Storage Link 
echo "Creating storage link..."
php artisan storage:link || true

# 3. Cache Clear 
echo "Clearing cache..."
php artisan optimize:clear

# 4. Start Apache Server
echo "Starting Apache..."
exec apache2-foreground