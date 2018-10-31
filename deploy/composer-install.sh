#/var/www
php artisan down
composer install --no-dev --no-interaction -o
#chgrp -R www-data storage bootstrap/cache
#chmod -R ug+rwx storage bootstrap/cache
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan migrate
php artisan up
echo 'Deps Install Finished'
exit $?