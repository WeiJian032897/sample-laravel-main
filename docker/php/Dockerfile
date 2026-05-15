FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip libzip-dev libicu-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions required for Laravel
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd intl zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# (Optional) Install Node.js if needed for Vite / Mix
# RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
#     && apt-get install -y nodejs

# Create a non-root user to avoid permission issues on Mac/Windows
RUN useradd -ms /bin/bash laravel \
    && mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

USER laravel

# Set working directory
WORKDIR /var/www/html

# Expose port 8000 for Laravel's artisan serve
EXPOSE 8000

# Default command (can be overridden in docker-compose.yml)
CMD ["php", "-a"]