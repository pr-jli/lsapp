 # My Blog
1. A blogging website which allows user to create an account,Create , Update , Delete  posts with images.
2. Implementation of a line graph using charts.js using dummy data.
 
 # Getting Started

### Server Requirements
-   PHP >= 5.6.4
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Mbstring PHP Extension
-   XML PHP Extension

### Installing

Clone this repo or download it on your local system.

Open composer and run this given command.

```shell
composer install
```

Rename the file `.env.example` to `.env`.

```shell
cp .env.example .env
```

Generate the Application key

```php
php artisan key:generate
```

Set DB credentials, InfoConnect API URL and App Name in `.env`

Migrate the database.

```php
php artisan migrate
```

### Local Development Server

To run this project on localhost

```php
php artisan serve
```

This project will by default run on this server:

```
http://localhost:8000/
```

For more details
```php
php artisan serve --help
```

### Screenshots:

![alt text](https://github.com/pr-jli/lsapp/blob/master/screenshots/Screenshot%20(24).png)

![alt text](https://github.com/pr-jli/lsapp/blob/master/screenshots/Screenshot%20(26).png)

![alt text](https://github.com/pr-jli/lsapp/blob/master/screenshots/Screenshot%20(27).png)

![alt text](https://github.com/pr-jli/lsapp/blob/master/screenshots/Screenshot%20(23).png)
