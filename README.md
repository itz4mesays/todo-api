<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

This is app is to create a todo api that handles CRUD functionalities

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
- This endpoint handles read functionality 

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


UPDATE
- This endpoint handles updates functionality

- Content-Type: application/json

- Method: 
    PUT

- formBody:
{
    "id": 2,
    "title": "Welcome to my World",
    "status": "Completed"
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
                "title": "Welcome to my World",
                "status": "Completed"
            }
        ]
    }
}


DELETE
- This endpoint handles delete functionality

- Content-Type: application/json

- Method: 
    POST

- formBody:
{
    "id": 2
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
