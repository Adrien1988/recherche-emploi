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

# 5. Dossier de travail Symfony
WORKDIR /var/www/app

# 6. Utilisateur non-root
RUN addgroup -g 1000 symfony \
 && adduser  -G symfony -u 1000 -D symfony \
 && chown -R symfony:symfony /var/www
USER symfony

# 7. Point d’entrée
CMD ["php-fpm"]
