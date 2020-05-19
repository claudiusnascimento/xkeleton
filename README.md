# LARAVEL XKELETON

## About

Just another laravel boilerplate...


# Installation

## Clone the repo

``` bash
git clone https://github.com/claudiusnascimento/skeleton.git
```

## Up the container

Inside the project folder run the followed code to up the containers

``` bash
docker-compose up -d
```

## Install project

``` bash
sudo docker-compose exec app composer install
```
## Folder permissions
``` bash
sudo docker-compose exec app chmod -R 777 storage/
sudo docker-compose exec app chmod -R 777 bootstrap/
```

## Copy .env.axample

``` bash
cp .env.example .env
```

## Generate the key

``` bash
sudo docker-compose exec app php artisan key:generate
```

## Accessing the application
```
http://localhost:8080
```

## Run migrations
``` bash
sudo docker-compose exec app php artisan migrate
```

## Seeding

Uncomment in ***Illuminate\Database\Seeder\DatabaseSeeder*** the seeds that you want and...

``` bash
sudo docker-compose exec app php artisan db:seed
```

*After that is good practice comment the seeds again*

## Access the admin
```
http://localhost:8080/admin
```

## Log with credentials

email: ***admin@admin.com*** 
pass: ***123456***


### To tests run
``` bash
sudo docker-compose exec app vendor/bin/phpunit
```

## To access the container with 'sudo' permissions run
``` bash
docker exec -u root -t -i app /bin/bash
```

## What you get with this boilerplate?

- User admin
- Pages admin
- Blog Admin
- Forget password (need email credentials)
- Wysiwyg (Summernote)

## Some peculiarities of the boilerplate you should to know

- Admin routes must to be put in *routes/admin.php* because that routes has the auth middleware

- Models are in *App/Models*

- You dont have to use the *CrudTraits* - it's too much abstraction :0

## This admin boilerplate uses:

> [Gentelella Admin Template](https://colorlib.com/polygon/gentelella/) 

> The Gentelella template are provided by the [claudiusnascimento/gentelelladashboard](https://github.com/claudiusnascimento/gentelelladashboard)

> Bootstrap v3.3.7

> jQuery v2.2.4

> [Summernote Wysiwyg](https://summernote.org/)

> [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)

## Packages indications to use with this boilerplate

- [ClaudiusNascimento/XACL](https://github.com/claudiusnascimento/xacl)
** A simple xacl groups/routes based **

- [ClaudiusNascimento/HtmlBlocks](https://github.com/claudiusnascimento/html-blocks)
** A package that provides many html-blocks to your models **

### enjoy...

