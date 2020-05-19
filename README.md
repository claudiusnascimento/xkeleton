# LARAVEL SKELETON

## About

Soon


# Installation

## Clone the repo

```
https://github.com/claudiusnascimento/skeleton.git
```

## Up the container

```
docker-compose up -d
```

## Access the container with 'sudo' permissions

docker exec -u root -t -i app /bin/bash

## Inside the container, run

```
composer install
```
## Folder permissions, inside the container yet
```
chmod -R 777 storage/
chmod -R 777 bootstrap/
```

## Copy .env.axample
```
cp .env.example .env
```

## Generate the key
```
php artisan key:generate
```

## Exit the container

```
exit
```

## Access the application
```
http://localhost:8080
```

## To run migrations outside the container
```
sudo docker-compose exec app php artisan migrate
```

### if you are usind docker, pleas run testes inside the container
