# ------------------------------------------------------------------
# Image PHP-FPM 8.3 pour Symfony – Alpine
# ------------------------------------------------------------------
FROM php:8.3-fpm-alpine

# 1. Paquets système
RUN apk add --no-cache git unzip icu-data-full icu-libs \
 && apk add --no-cache --virtual .build-deps icu-dev

# 2. Extensions PHP
RUN docker-php-ext-install pdo_mysql intl opcache
RUN apk del .build-deps

# 3. Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 4. Code applicatif
WORKDIR /var/www
COPY . /var/www

# 4.1 Assurer la présence d'un entrypoint et ses permissions (sans heredoc)
RUN set -eux; \
    if [ -f /var/www/docker/php/entrypoint.sh ]; then \
      :; \
    else \
      mkdir -p /var/www/docker/php; \
      printf '%s\n' \
        '#!/usr/bin/env sh' \
        'set -e' \
        'composer install --no-interaction --prefer-dist --no-progress --ansi' \
        'php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration' \
        'exec php-fpm' \
        > /var/www/docker/php/entrypoint.sh; \
    fi; \
    sed -i "s/\r$//" /var/www/docker/php/entrypoint.sh; \
    chmod +x /var/www/docker/php/entrypoint.sh

# 5. Dossier de travail Symfony
WORKDIR /var/www/app

# 6. Utilisateur non-root
RUN addgroup -g 1000 symfony \
 && adduser  -G symfony -u 1000 -D symfony \
 && chown -R symfony:symfony /var/www
USER symfony

# 7. Point d’entrée
CMD ["php-fpm"]
