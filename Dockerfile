FROM php:8.2-apache

# Redirect Apache access and error logs to the console (Render Logs)
RUN ln -sf /dev/stdout /var/log/apache2/access.log \
    && ln -sf /dev/stderr /var/log/apache2/error.log

COPY . /var/www/html/

# Ensure write permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 777 /var/www/html

EXPOSE 80
