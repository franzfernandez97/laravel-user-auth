# laravel-user-auth
laravel sail project with user login, user administration using breeze and sanctum

# Steps To run this app on window
- Requirements:
1) Install ubuntu wsl on window
2) Install Docker Desktop

# Deploy app
1) Run docker desktop app (Start docker service)
2) Download sails repository

```
curl -s https://laravel.build/laravel-user-auth | bash
```
3) Create a mysql database in the localhost


# Install breeze
1) First, you should create a new Laravel application, configure your database, and run your database migrations. Once you have created a new Laravel application, you may install Laravel Breeze using Composer:

```
composer require laravel/breeze --dev
```

2) publishes the authentication views, routes, controllers, and other resources to your application

```
php artisan breeze:install
 
php artisan migrate
npm install
npm run dev
```

