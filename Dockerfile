# Use the official WordPress image (PHP 8.2 + Apache + WordPress)
FROM wordpress:6.5-php8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install additional PHP extensions (optional, for better compatibility)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Fix permissions for WordPress (common issue)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Copy custom themes/plugins (optional, uncomment if needed)
# COPY wp-content /var/www/html/wp-content

# Expose port 80
EXPOSE 80
