#!/usr/bin/env sh
set -e

composer install --no-interaction --prefer-dist --no-progress --ansi
php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration

exec php-fpm
