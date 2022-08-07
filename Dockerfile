ARG PHP_VERSION=8.1

FROM php:${PHP_VERSION}-cli-alpine as google-places-sdk

ARG APCU_VERSION=5.1.19
RUN set -eux; \
	apk add --no-cache \
		$PHPIZE_DEPS \
        libxml2-dev \
    ; \
    docker-php-ext-install -j$(nproc) soap; \
    pecl install \
        apcu-${APCU_VERSION} \
        pcov \
    ; \
    pecl clear-cache; \
    docker-php-ext-enable \
        apcu \
        opcache \
        soap\
    ;

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mkdir /app
WORKDIR /app

RUN docker-php-ext-enable pcov