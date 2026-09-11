#!/bin/bash

# Force Apache to listen on Render's dynamic $PORT variable
sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf
sed -i "s/:80/:${PORT}/g" /etc/apache2/sites-available/000-default.conf

# Run database migrations safely
php artisan migrate --force

# Start Apache in the foreground
apache2-foreground
