FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html/vuejs_lms

# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add Adminer installation
RUN curl -L "https://www.adminer.org/latest.php" -o /var/www/html/revgentv/public/adminer.php

# Copy composer json file
COPY composer.json ./

# Install Composer dependencies
RUN composer install --ignore-platform-reqs

# Copy package json file
COPY package.json ./

# Install Node.js dependencies
RUN npm install

# Copy project files
COPY . /var/www/html/vuejs_lms

# Make artisan executable
RUN chmod +x artisan

# Copy Nginx configuration file
COPY ./nginx.conf /etc/nginx/sites-available/default

# Expose the ports
EXPOSE 80

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "service nginx start && php-fpm"]
