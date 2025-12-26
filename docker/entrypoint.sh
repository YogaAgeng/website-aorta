#!/bin/bash

# ===========================================
# Docker Entrypoint Script for Laravel
# ===========================================

set -e

echo "🚀 Starting Laravel Application..."

# Wait for database to be ready
echo "⏳ Waiting for database connection..."
while ! php artisan db:monitor --databases=mysql 2>/dev/null; do
    sleep 2
done
echo "✅ Database is ready!"

# Run migrations
echo "📦 Running database migrations..."
php artisan migrate --force

# Clear and cache configuration
echo "⚡ Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage link if not exists
if [ ! -L "public/storage" ]; then
    echo "🔗 Creating storage link..."
    php artisan storage:link
fi

echo "✅ Application is ready!"

# Execute the main container command
exec "$@"
