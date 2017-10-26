setup:
	php -r "copy('https://getcomposer.org/composer.phar', 'composer.phar');"
	php composer.phar install
	php -r "file_exists('.env') || copy('.env.example', '.env');"
	php artisan key:generate
	mysql -e 'CREATE DATABASE IF NOT EXISTS `monitorex`'
	mysql -e 'CREATE USER IF NOT EXISTS "homestead"@"localhost" IDENTIFIED BY "secret";'
	mysql -e 'CREATE USER IF NOT EXISTS "homestead"@"localhost" IDENTIFIED BY "secret";'
	mysql -e 'GRANT ALL ON monitorex TO "homestead"@"localhost";'

test:
	make setup
	php artisan cache:clear
	php artisan route:cache
	php artisan config:cache
	php artisan migrate:refresh --seed
	./vendor/bin/phpunit --debug
	./vendor/bin/phpcs --standard=ruleset.xml -p
