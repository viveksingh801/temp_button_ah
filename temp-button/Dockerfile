FROM php:8.1.4-fpm-alpine3.14

RUN docker-php-ext-install pdo pdo_mysql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php --install=/usr/bin --filename=composer && php -r "unlink('composer-setup.php');"

RUN mv composer /usr/bin

RUN mkdir /var/www/app/

COPY .  /var/www/app/

WORKDIR /var/www/app/

RUN composer install

RUN wget -qO- https://raw.githubusercontent.com/eficode/wait-for/v2.2.3/wait-for >> wait_for.sh

RUN chmod +x wait_for.sh

RUN chmod 777 -R /var/www/app/storage/logs

EXPOSE 9000
