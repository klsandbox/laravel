#!/bin/bash
mysql_username=$1

php ./scripts/update-env-example.php
php ./scripts/update-env.php

sed -e'/sqlite/d' -i.bak .env
echo ';Delete Key after install, and delete database/database.sqlite' >> .env
echo 'DB_CONNECTION=sqlite' >> .env

echo > database/database.sqlite
composer install --no-scripts
php artisan key:generate
composer install

rm database/database.sqlite
sed -e'/sqlite/d' -i.bak .env
rm .env.bak

./scripts/new_user.sh $mysql_username
./scripts/reset_db.sh