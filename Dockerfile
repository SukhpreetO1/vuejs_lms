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

# Install additional PHP extensions
RUN apt-get update && apt-get install -y \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install zip \
    && docker-php-ext-install soap \
    && docker-php-ext-install intl \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install opcache \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer json file
COPY composer.json auth.json ./

# Copy package json file
COPY package.json ./

# Copy project files
COPY . /var/www/html/vuejs_lms

# Add Adminer installation
RUN curl -L "https://www.adminer.org/latest.php" -o /var/www/html/vuejs_lms/public/adminer.php

# Install Composer dependencies
RUN composer install --ignore-platform-reqs

# Install Node.js dependencies
RUN npm install

# Make artisan executable
RUN chmod +x artisan

# Copy Nginx configuration file
COPY ./nginx.conf /etc/nginx/sites-available/default

# Expose the ports
EXPOSE 80

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "service nginx start && php-fpm"]
