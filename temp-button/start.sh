#!/usr/env/bin bash
# start

# composer install
echo "Running Migrate, Process and Local Php Server"
php-fpm -D
php artisan migrate:refresh
# ONLY TO BE USED FOR DEVELOPMENT
php artisan db:seed
php artisan passport:install
echo "Runing Test Scripts"
php artisan test
php artisan serve