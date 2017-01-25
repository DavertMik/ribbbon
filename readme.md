# Ribbbon


## Installation

```bash
git clone git@github.com:davertmik/ribbbon.git
cd ribbon
composer install
cp .env.example .env
```

edit .env file:

```
DB_HOST=localhost
DB_DATABASE=ribbon
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

MAIL_DRIVER=log
MAIL_HOST=localhost
MAIL_PORT=25
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

run commands

```bash
echo "create database ribbon" | mysql -uroot
php artisan migrate
php artisan db:seed
php artisan serve
``` 

---


_V 2.2_


[Ribbbon.com](http://ribbbon.com)

Ribbbon is a project management system built on Laravel 5.1.* & Vue.js :)

# Features
  - User / account creation
  - Client creation
  - Project creation
  - Task creation 
  - Assigning weights to tasks
  - Project sharing
  - Api Driven

# Get involved
  - Clone or fork the project. 
  - Create feature branches off develop branch.
  - Once your changes are ready create a pull request into the master branch.
   
# Installation
 - Clone the repo
 - Run composer install
 - Run php artisan migrate
 - Run php artisan db:seed
 - Start developing!


