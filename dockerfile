FROM php:8.0-apache as base

COPY ./src/php /var/www/html