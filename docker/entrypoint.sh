#!/bin/sh
set -e

# Railway meng-inject $PORT; Apache harus listen di port tersebut
PORT="${PORT:-8080}"
sed -ri "s/^Listen 80$/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Volume yang baru di-mount dimiliki root — kembalikan ke www-data
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

# Migrasi HARUS sebelum operasi cache: CACHE_STORE/SESSION_DRIVER=database
# butuh tabelnya sudah ada (deploy pertama = database kosong)
php artisan migrate --force

# Symlink public/storage (filesystem container ephemeral)
php artisan storage:link --force || true

# Cache config/route/view di runtime karena env Railway baru tersedia di sini
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan filament:optimize || true

exec apache2-foreground
