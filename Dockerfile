 # Use official PHP-Apache image
FROM php:8.1-apache

# Install mysqli (needed for WordPress DB connection)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy all project files into Apache web root
COPY . /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Apache runs on port 80
EXPOSE 80

