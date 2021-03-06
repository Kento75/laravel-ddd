#!/bin/sh

if [ -d "/var/www/app/public/app" ] && [ ! -d "/var/www/app/public/vendor" ]; then
  cd /var/www/app/public
  chmod -R 777 ./*
  composer install
  php artisan key:generate
  php artisan config:cache

elif [ -d "/var/www/app/public/app" ];then
  cd /var/www/app/public
  php artisan config:cache

else
  cd /var/www/app/public
  composer create-project "laravel/laravel=5.*.*" laravelapp
  chmod -R 777 ./*
  # .始まりのファイルもコピーできるようにする
  shopt -s dotglob
  cp -r /var/www/app/public/laravelapp/* /var/www/app/public/
  rm -rf laravelapp
  cp .env.example .env
  php artisan key:generate
  php artisan config:cache
fi
