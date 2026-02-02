# Use the official PHP image with Apache
FROM php:8.2-apache

# Install PostgreSQL libraries (just in case you use a database later)
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copy your files into the container
COPY . /var/www/html/

# CRITICAL CHANGE: Redirect Apache logs to the Render Dashboard Logs
RUN ln -sf /dev/stdout /var/log/apache2/access.log \
    && ln -sf /dev/stderr /var/log/apache2/error.log

# Ensure the web server (www-data) owns the files so it can write if needed
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

EXPOSE 80