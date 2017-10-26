setup:
	php -r "copy('https://getcomposer.org/composer.phar', 'composer.phar');"
	php composer.phar install
	php -r "file_exists('.env') || copy('.env.example', '.env');"
	php artisan key:generate
	mysql -e 'CREATE DATABASE IF NOT EXISTS `monitorex`'

test:
	make setup
	php artisan cache:clear
	php artisan route:cache
	php artisan config:cache
	php artisan migrate:refresh --seed
	phpunit --debug
