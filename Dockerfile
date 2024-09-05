# Usar la imagen base oficial de PHP con Apache
FROM php:8.3-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql zip

# Habilitar módulos de Apache
RUN a2enmod rewrite

# Copiar el archivo de configuración de Apache
COPY docker/apache/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto al directorio de trabajo
COPY . /var/www/html

# Establecer permisos adecuados
RUN chmod -R 755 /var/www/html

RUN chown -R www-data:www-data /var/www/html

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Exponer el puerto 80 para Apache
EXPOSE 80

# Comando por defecto para ejecutar Apache
CMD ["apache2-foreground"]
