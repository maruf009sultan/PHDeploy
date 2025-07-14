# Use the official WordPress image (includes PHP + Apache + WordPress)
FROM wordpress:6.5-php8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy your custom themes, plugins, or uploads (optional)
# COPY wp-content /var/www/html/wp-content

# Copy a custom wp-config.php if you want (optional)
# COPY wp-config.php /var/www/html/wp-config.php

# Expose port 80
EXPOSE 80
