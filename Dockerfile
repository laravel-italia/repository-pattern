FROM php:apache
WORKDIR /var/www/
ENV DEBIAN_FRONTEND=noninteractive
ENV APACHE_DOCUMENT_ROOT /var/www/api/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf && \
    apt-get update && \
    apt-get install zip unzip && \
    docker-php-ext-install pdo pdo_mysql && \
    php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
EXPOSE 80