@echo off

cd ../RegistroVital

php artisan key:generate
php artisan migrate
php artisan serve