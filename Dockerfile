# Use an official PHP-Apache image
FROM php:8.2-apache

# Enable necessary Apache modules
RUN a2enmod rewrite

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Set working directory
WORKDIR /var/www/html

# Copy application files to the container
COPY . /var/www/html

# Expose port 80 for access
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]