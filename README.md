## Guild Marketplace

Small marketplace.

Stack :
- Laravel
- Semantic UI

1 - After downloading project : 
```
composer update
```

2 - Configure .env to interact with a DB (see .env example laravel).

3 - Build DB structure :
```
php artisan migrate:fresh
```

3 - (if local) Start serving laravel :
```
php artisan serve
```
output : localhost:8000

Create dev tools for IDE (see https://github.com/barryvdh/laravel-ide-helper) :
- php artisan ide-helper:generate - phpDoc generation for Laravel Facades
- php artisan ide-helper:models - phpDocs for models
- php artisan ide-helper:meta - PhpStorm Meta file
