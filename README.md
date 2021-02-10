<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

This is app is to create a todo api that handles CRUD functionalities

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

Base URL: http://localhost/todo-api/

CREATE
- This endpoint handles create functionality where new todo can be added

- Content-Type: application/json

- Method: 
    POST

- formBody:
{
    "id": 4,
    "title": "New Meeting",
    "status": false
}

- Response:
{
    "payload": {
        "code": 200,
        "error": false,
        "result": [
            {
                "id": 1,
                "title": "Meeting",
                "status": false
            },
            {
                "id": 2,
                "title": "Code Review",
                "status": true
            },
            {
                "id": 4,
                "title": "New Meeting",
                "status": false
            }
        ]
    }
}

READ
- This endpoint handles create functionality where new todo can be fetched

- Content-Type: application/json

- Method: 
    GET

- Response:
{
    "payload": {
        "code": 200,
        "error": false,
        "result": [
            {
                "id": 1,
                "title": "Meeting",
                "status": false
            },
            {
                "id": 2,
                "title": "Code Review",
                "status": true
            }
        ]
    }
}





DELETE
- This endpoint handles delete functionality where new todo can be fetched

- Content-Type: application/json

- Method: 
    POST

- formBody:
{
    "id": 2,
}

- Response:
{
    "payload": {
        "code": 200,
        "error": false,
        "result": [
            {
                "id": 1,
                "title": "Meeting",
                "status": false
            },
        ]
    }
}