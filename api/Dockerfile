FROM php:7.4-apache
RUN docker-php-ext-install mysqli
COPY index.php create_emp.php get_emp.php /var/www/html/
RUN chown -R www-data:www-data /var/www
EXPOSE 80