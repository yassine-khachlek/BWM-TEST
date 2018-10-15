# Test Application

## Install

Please refer to Laravel install documentation [Here](https://laravel.com/docs/5.7#installation) for environnement setup.

First clone the repository:

```shell
git clone https://github.com/yassine-khachlek/BWM-TEST.git
```

Move to the cloned repository:

```shell
cd clone BWM-TEST
```

Once your environment is up, copy the .env.example to .env and update your database credentials:

```shell
cp .env.example .env
```

Regenerate the application key:

```shell
php artisan key:generate
```

Run the migration:

```shell
php artisan migrate
```

Populate tables with fake data users, posts and comments:

```shell
php artisan db:seed
```

Start the local server development:

```shell
php artisan serve
```

The application will be available on:

```shell
http:://127.0.0.1:8080
```

## Available endpoints:

### GET PAGINATED POSTS WITH USER RELATION:

GET     http://127.0.0.1:8000/api/v1/posts?page=1

### STORE POST:

POST    http://127.0.0.1:8000/api/v1/posts

Params:

    user_id
    value

### UPDATE POST:

PATCH   http://127.0.0.1:8000/api/v1/posts/{id}

Params:

    user_id
    value

### GET POST WITH USER AND COMMENTS (LAST 10) RELATIONS:

GET     http://127.0.0.1:8000/api/v1/posts/{id}

### DELETE POST:

DELETE  http://127.0.0.1:8000/api/v1/posts/{id}

### GET PAGINATED POST COMMENTS:

GET  http://127.0.0.1:8000/api/v1/posts/{id}/comments?page=1

To Do:

- JWT authentification
- Change the application to a package.

### Contact:

Yassine Khachlek <yassine.khachlek@gmail.com>
