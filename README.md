# README

## SYSTEM REQUIREMENT

* DB
  - MySQL 5.6
* Apache 
    - 2.4
* PHP
  - 7.0
* Laravel
  - 5.5
* Composer
  - 1.4.1


## Deploy
* permission
```
sudo chmod -R 777 bootstrap/cache
sudo chmod -R 777 storage/logs/
sudo chmod -R 777 storage/framework
sudo chmod -R 777 public/media
sudo chmod -R 777 public/tmp_uploads
```

* run
```bash
 composer install
 php artisan cache:clear
 php artisan config:clear
 php artisan view:clear
```

* run deploy
```bash
cp .env.example .env
php artisan key:generate
```
* config your database in .env
find and replace database config
```bash
vi .env
```
* run database
```bash
php artisan migrate
php artisan db:seed
```

* config AWS SNS in aws.php and replace AW*
```bash
vi config/aws.php
```