FROM php:8.2-apache

RUN apt-get update && apt-get install -y libpng-dev zip unzip sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite gd

COPY . /var/www/html/

WORKDIR /var/www/html

RUN cp .env.example .env

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --optimize-autoloader

RUN mkdir -p storage/logs database \
    && touch database/database.sqlite \
    && chown -R www-data:www-data storage bootstrap/cache database \
    && chmod -R ug+rwx storage bootstrap/cache database

RUN echo '<VirtualHost *:80>' > /etc/apache2/sites-available/000-default.conf \
    && echo '    DocumentRoot /var/www/html/public' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    <Directory /var/www/html/public>' >> /etc/apache2/sites-available/000-default.conf \
    && echo '        AllowOverride All' >> /etc/apache2/sites-available/000-default.conf \
    && echo '        Require all granted' >> /etc/apache2/sites-available/000-default.conf \
    && echo '    </Directory>' >> /etc/apache2/sites-available/000-default.conf \
    && echo '</VirtualHost>' >> /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite headers

EXPOSE 80

CMD php artisan key:generate --force && php artisan migrate --force --seed && apache2-foreground
