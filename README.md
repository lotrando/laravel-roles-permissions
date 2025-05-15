## Screenshot
<p align="center">
    <img src="public/documentation/users.png"/>
</p>

## Instalation
```
git clone https://github.com/lotrando/laravel-roles-permissions
```

```
cd laravel-roles-permissions
```

```
cp .env.example .env
```

```
nano .env
```

## Setup database for Laravel
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-roles-permissions
DB_USERNAME={user}
DB_PASSWORD={password}
```

## Install dependecies
```
composer install
```

## Artisan commands
```
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Other screens
<p align="center">
    <img src="public/documentation/login.png"/>
</p>
<p align="center">
    <img src="public/documentation/register.png"/>
</p>
<p align="center">
    <img src="public/documentation/roles.png"/>
</p>
<p align="center">
    <img src="public/documentation/permissions.png"/>
</p>
<p align="center">
    <img src="public/documentation/2fa.png"/>
</p>
<p align="center">
    <img src="public/documentation/2faModal.png"/>
</p>


