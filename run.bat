composer install
cp .env.example .env
rm -r public/storage
php artisan storage:link
php artisan migrate:refresh --seed

