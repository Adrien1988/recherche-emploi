# -----------------------------------------------------------------------------
# Image PHP-FPM 8.3 pour Symfony – Alpine
# -----------------------------------------------------------------------------
FROM php:8.3-fpm-alpine

# -----------------------------------------------------------------------------
# 1. Paquets système et dépendances
#    • git, unzip            : outils courants
#    • icu-data-full + icu-libs : locales et runtime pour l’extension intl
#    • .build-deps (virtual) : paquets *-dev* nécessaires le temps de compiler
# -----------------------------------------------------------------------------
RUN apk add --no-cache git unzip icu-data-full icu-libs \
 && apk add --no-cache --virtual .build-deps icu-dev

# -----------------------------------------------------------------------------
# 2. Extensions PHP
# -----------------------------------------------------------------------------
RUN docker-php-ext-install pdo_mysql intl opcache

# Supprime uniquement les paquets de build, conserve icu-libs pour l’exécution
RUN apk del .build-deps

# -----------------------------------------------------------------------------
# 3. Composer (copié depuis l’image officielle)
# -----------------------------------------------------------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# -----------------------------------------------------------------------------
# 4. Utilisateur non-root + code applicatif
# -----------------------------------------------------------------------------
WORKDIR /var/www
COPY . /var/www

RUN addgroup -g 1000 symfony \
 && adduser  -G symfony -u 1000 -D symfony \
 && chown -R symfony:symfony /var/www
USER symfony

# -----------------------------------------------------------------------------
# 5. Point d’entrée
# -----------------------------------------------------------------------------
CMD ["php-fpm"]
