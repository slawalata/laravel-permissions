## Simple WriterPublisherAdmin apps using spatie.

## Installing permission
- composer require spatie/laravel-permission
- composer require laravel/ui
- php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migration"
- php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"

## Installing auth
- composer require laravel/ui
- php artisan ui bootstrap
- php artisan ui bootstrap --auth
- npm install
- npm run dev

## Create Model, Controller, CRUD, and migration files
php artisan make:model Post --migration --controller --all

## Seeder
- php artisan migrate:fresh --seed

## how to install
-composer install

-Rename .env.example file to .envinside your project root 

-php artisan key:generate

-php artisan migrate:fresh --seed