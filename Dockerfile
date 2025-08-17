# Use official PHP image with Apache
FROM php:8.1-apache

# Install required PHP extensions for WordPress
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy WordPress files into Apache root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
