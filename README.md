requirements:
 	php: ^8.0,
 	mysql or sqlite3

hot to install:
    composer install
    touch database/database.sqlite
    php8.0 artisan migrate --seed
