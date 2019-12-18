composer update
cp .env.example .env
php artisan key:generate
CREATE DATABASE laravel_irt;

sudo ln -s /var/www/html/sites/irt/hosts/irt-admin.conf /etc/nginx/sites-enabled/irt-admin.conf
sudo ln -s /var/www/html/sites/irt/hosts/irt-admin.conf /etc/nginx/sites-available/irt-admin.conf
