# Menggunakan image PHP dari Docker Hub
FROM php:8.0-apache

# Menyalin file PHP dari direktori lokal ke dalam container
COPY . /var/www/html/

# Mengatur hak akses pada direktori
RUN chown -R www-data:www-data /var/www/html/
