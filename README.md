## Screenshots

<p align="center">
    <img src="public/documentation/login.png"
</p>
<p align="center">
    <img src="public/documentation/register.png"
</p>
<p align="center">
    <img src="public/documentation/users.png"
</p>
<p align="center">
    <img src="public/documentation/roles.png"
</p>
<p align="center">
    <img src="public/documentation/permissions.png"
</p>
<p align="center">
    <img src="public/documentation/2fa.png"
</p>
<p align="center">
    <img src="public/documentation/2faModal.png"
</p>

## Instalation
```
git clone https://github.com/lotrando/laravel-roles-permissions
```

## Setup database for Laravel
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-roles-permissions
DB_USERNAME=root
DB_PASSWORD=*********
```

## Commands
```
cd laravel-roles-permissions
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```


