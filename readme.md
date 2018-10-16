# Test Application

## Install

Please refer to Laravel install documentation [Here](https://laravel.com/docs/5.7#installation) for environnement setup.

First clone the repository:

```shell
git clone https://github.com/yassine-khachlek/BWM-TEST.git
```

Move to the cloned repository:

```shell
cd BWM-TEST
```

Install dependencies using composer:

```shell
composer dumpautoload
```

Once your environment is up, copy the .env.example to .env and update your database credentials:

```shell
cp .env.example .env
```

Regenerate the application key and the JWT secret:

```shell
php artisan key:generate

php artisan jwt:secret
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

## Available API Endpoints:

### Login (GET A VALID TOKEN FOR ONE HOUR)

POST     http://127.0.0.1:8000/api/v1/auth/login

Parameters:

| Name | Type |
|---|---|
| email * | string |
| password * | string |
    
Response: 

```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC92MVwvYXV0aFwvbG9naW4iLCJpYXQiOjE1Mzk2NzM1ODMsImV4cCI6MTUzOTY3NzE4MywibmJmIjoxNTM5NjczNTgzLCJqdGkiOiI2aEVDUjlFNDk5SG5qNkMxIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Bp9eP3Jv0WQJ722-2yNOIBP2AhaaDxVxbVzrZvqUqMY",
    "token_type": "bearer",
    "expires_in": 3600
}
```


### GET PAGINATED POSTS WITH USER RELATION:

GET     http://127.0.0.1:8000/api/v1/posts?page=1&token={access_token}

Headers:

| Name| Type | value | Description |
|---|---|---|---|
| Authorization * | string | Bearer {access_token} | Used instead of query string parameter (token) |

Response:

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 578,
            "user_id": 1,
            "value": "Post body",
            "created_at": "2018-10-16 07:12:05",
            "updated_at": "2018-10-16 07:12:05",
            "user": {
                "id": 1,
                "name": "Melyna O'Connell",
                "email": "hhayes@example.net",
                "email_verified_at": null,
                "created_at": "2018-10-15 17:07:13",
                "updated_at": "2018-10-15 17:07:13"
            }
        },
        {
            "id": 577,
            "user_id": 1,
            "value": "Post Body",
            "created_at": "2018-10-16 07:11:42",
            "updated_at": "2018-10-16 07:11:42",
            "user": {
                "id": 1,
                "name": "Melyna O'Connell",
                "email": "hhayes@example.net",
                "email_verified_at": null,
                "created_at": "2018-10-15 17:07:13",
                "updated_at": "2018-10-15 17:07:13"
            }
        },
        ...
    ],
    "first_page_url": "http://127.0.0.1:8000/api/v1/posts?page=1",
    "from": 1,
    "last_page": 58,
    "last_page_url": "http://127.0.0.1:8000/api/v1/posts?page=58",
    "next_page_url": "http://127.0.0.1:8000/api/v1/posts?page=2",
    "path": "http://127.0.0.1:8000/api/v1/posts",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 574
}
```

### STORE POST:

POST    http://127.0.0.1:8000/api/v1/posts?token={access_token}

Headers:

| Name| Type | value | Description |
|---|---|---|---|
| Authorization * | string | Bearer {access_token} | Used instead of query string parameter (token) |

Parameters:

| Name| Type  |
|---|---|
| value * |  string |

Response:

```json
{
    "value": "Post body",
    "user_id": 1,
    "updated_at": "2018-10-16 07:12:05",
    "created_at": "2018-10-16 07:12:05",
    "id": 578
}
```

### UPDATE POST:

PATCH   http://127.0.0.1:8000/api/v1/posts/{id}?token={access_token}

Headers:

| Name | Type | value | Description |
|---|---|---|---|
| Authorization * | string | Bearer {access_token} | Used instead of query string parameter (token) |

Parameters:

| Name| Type  |
|---|---|
| value * |  string |

Response:

```json
{
    "id": 578,
    "user_id": 1,
    "value": "Post body updated",
    "created_at": "2018-10-16 07:12:05",
    "updated_at": "2018-10-16 07:15:14"
}
```

### GET POST WITH USER AND COMMENTS (LAST 10) RELATIONS:

GET     http://127.0.0.1:8000/api/v1/posts/{id}?token={access_token}

Headers:

| Name| Type | value | Description |
|---|---|---|---|
| Authorization * | string | Bearer {access_token} | Used instead of query string parameter (token) |

Response:

```json
{
    "id": 1,
    "user_id": 1,
    "value": "Non voluptates provident iusto voluptate rerum quia. Voluptatibus possimus necessitatibus et voluptatem occaecati facere nobis. Aut quis et aut vel minima dolorum vitae. Ratione aperiam voluptatibus itaque velit.\n\nIpsam cum quae et. Aut et totam consequuntur cum reiciendis. Dolorem commodi consequatur itaque placeat porro et. Ea voluptates cupiditate impedit distinctio provident repellat dolores.\n\nSequi doloremque cumque totam amet. Dolore aut non vel et ut.\n\nPorro aliquid natus tempora saepe architecto nesciunt. Exercitationem ad vero ad consequatur magnam molestiae ab. Accusantium vitae quaerat cum ullam ab consequuntur non.",
    "created_at": "2018-10-15 17:07:18",
    "updated_at": "2018-10-15 17:07:18",
    "user": {
        "id": 1,
        "name": "Melyna O'Connell",
        "email": "hhayes@example.net",
        "email_verified_at": null,
        "created_at": "2018-10-15 17:07:13",
        "updated_at": "2018-10-15 17:07:13"
    },
    "comments": [
        {
            "id": 17,
            "user_id": 3,
            "post_id": 1,
            "value": "Architecto quibusdam nobis dolorum maxime.",
            "created_at": "2018-10-15 17:08:50",
            "updated_at": "2018-10-15 17:08:50"
        },
        {
            "id": 18,
            "user_id": 20,
            "post_id": 1,
            "value": "Dicta omnis voluptatem dignissimos asperiores. Tempora dolor molestias sit saepe ea porro omnis. Suscipit rerum dolor sed quasi omnis eum.",
            "created_at": "2018-10-15 17:08:50",
            "updated_at": "2018-10-15 17:08:50"
        },
        ...
    ]
}
```

### DELETE POST:

DELETE  http://127.0.0.1:8000/api/v1/posts/{id}?token={access_token}

Headers:

| Name| Type | value | Description |
|---|---|---|---|
| Authorization * | string | Bearer {access_token} | Used instead of query string parameter (token) |

Response:

```json
{
    "id": 578,
    "user_id": 1,
    "value": "Post body updated",
    "created_at": "2018-10-16 07:12:05",
    "updated_at": "2018-10-16 07:15:14"
}
```

### GET PAGINATED POST COMMENTS:

GET  http://127.0.0.1:8000/api/v1/posts/{id}/comments?page=1&token={access_token}

Headers:

| Name| Type | value | Description |
|---|---|---|---|
| Authorization * | string | Bearer {access_token} | Used instead of query string parameter (token) |

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 195,
            "user_id": 10,
            "post_id": 10,
            "value": "Animi dicta culpa sit aliquid.",
            "created_at": "2018-10-15 17:09:18",
            "updated_at": "2018-10-15 17:09:18",
            "user": {
                "id": 10,
                "name": "Rubie Donnelly",
                "email": "ullrich.osbaldo@example.net",
                "email_verified_at": null,
                "created_at": "2018-10-15 17:07:15",
                "updated_at": "2018-10-15 17:07:15"
            }
        },
        {
            "id": 196,
            "user_id": 2,
            "post_id": 10,
            "value": "Eos molestias fugiat facilis et aliquid dolor alias sequi. Possimus repellendus doloribus molestias est maxime quibusdam dolorum. Provident qui incidunt minima repellat qui nostrum.",
            "created_at": "2018-10-15 17:09:18",
            "updated_at": "2018-10-15 17:09:18",
            "user": {
                "id": 2,
                "name": "Fanny Toy I",
                "email": "katelyn71@example.org",
                "email_verified_at": null,
                "created_at": "2018-10-15 17:07:14",
                "updated_at": "2018-10-15 17:07:14"
            }
        },
        ...
    ],
    "first_page_url": "http://127.0.0.1:8000/api/v1/posts/10/comments?page=1",
    "from": 1,
    "last_page": 2,
    "last_page_url": "http://127.0.0.1:8000/api/v1/posts/10/comments?page=2",
    "next_page_url": "http://127.0.0.1:8000/api/v1/posts/10/comments?page=2",
    "path": "http://127.0.0.1:8000/api/v1/posts/10/comments",
    "per_page": 10,
    "prev_page_url": null,
    "to": 10,
    "total": 16
}
```

### Contact:

Yassine Khachlek <yassine.khachlek@gmail.com>
