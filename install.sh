#!/bin/bash

if [ "$EUID" != 0 ]; then
    sudo "$0" "$@"
    exit $?
fi

apt install mariadb-server php composer nginx -y
 
password=""
mariadb -u root -p$password -e "CREATE DATABASE 'apr';\
CREATE USER 'user1'@localhost IDENTIFIED BY 'password1';\
GRANT ALL PRIVILEGES ON 'apr'.* TO 'user1'@localhost;\
FLUSH PRIVILEGES;"

composer install --no-dev --optimize-autoloader
#edit .env

composer dump-env prod
APP_ENV=prod APP_DEBUG=0 php bin/console cache:clear


php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
php bin/console cache:clear
php bin/console cache:clear --env=prod

./node_modules/.bin/encore production