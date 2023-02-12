<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img 
            src="public/images/new-logo.png" 
            width="100" 
            alt="ALOPE Logo"
        >
    </a>
</p>

# IL-LEARNING

made according to college experience to improve personal skills. The application is still in the development stage.

## How To Install

1). Setup Project

```sh
composer install
```

and

```sh
npm install
```

2). Copy .env.example file to .env on the root folder.

```sh
cp .env.example .env
```

3). Open your .env file and change the database name (DB_DATABASE) according to the database you have

4). Generate APP KEY

```sh
php artisan key:generate
```

5). Run Migration and seeder (Make sure your XAMPP/Laragon or something is running)

```sh
php artisan migrate
```

and for run seeder

```sh
php artisan db:seed
```

or you can do this

```sh
php artisan migrate:fresh --seed
```

6). Run the project

```sh
php artisan serve
```

```sh
npm run dev
```

7). For an initial account, first log in with the admin role, please log in with the following account:

```sh
email: admin@gmail.com
password: password
```
