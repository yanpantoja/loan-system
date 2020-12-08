## Sistema de Empréstimos

Sistema CRUD de coleções e de empréstimos

### Dependências

- Docker

### Instruções para rodar

Primeiramente, entre no diretório `loan-system/backend/api` e renomeie o arquivo `.env.example` para `.env`.


**+Você pode executar de duas formas**


**1) Pode executar atravês do run.sh da pasta raiz, exemplo:**

`sh ./run.sh`

Este comando ira executar uma série de passos que você poderá acompanhar via terminal, referente a:

1) Build
2) Instalação das dependências do vue
2) instalação das dependências do framework lumen
3) Run migrations para a criação das tabelas
4) Run tests de integração com PHPUnit
5) A API poderá ser acessada no http://localhost:3000
6) O Front-end poderá ser acesso no http://localhost:8080


**2) Ou você pode executar os passos separadamente no seu terminal dentro da pasta raiz do projeto:**

`docker-compose up --build -d`

`docker run --rm --interactive --tty -v $PWD/backend/api:/app composer install`

`docker exec -it phpdocker php /var/www/html/artisan migrate`

`docker exec -it phpdocker bash -c "cd /var/www/html && ./vendor/bin/phpunit"`

A API poderá ser acessada no http://localhost:3000
O Front-end poderá ser acesso no http://localhost:8080


### Importante

Verifique se não existe outro processo rodando nas portas 3000, 9000 e 3306 pois serão as portas utilizadas ao executar o docker

### Tests

Para rodar os testes: `docker exec -it phpdocker bash -c "cd /var/www/html && ./vendor/bin/phpunit"`


## Endpoints

GET http://localhost:3000/collections - Route to return collections

+ RETURN EXAMPLE - Success 200

```json
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "user_id": 1,
      "collection_id": 1,
      "collection_type": "App\\Models\\Collections\\Livro",
      "name": "Coleção de teste editada",
      "loaned": "Sim",
      "created_at": "2020-12-08T13:18:20.000000Z",
      "updated_at": "2020-12-08T13:18:20.000000Z",
      "user_name": "Yan",
      "email": "yanpantoja@email.com",
      "collection": {
        "id": 1,
        "name": "Coleção de teste editada",
        "created_at": "2020-12-08T13:18:20.000000Z",
        "updated_at": "2020-12-08T13:18:20.000000Z"
      }
    },
    {
      "id": 2,
      "user_id": null,
      "collection_id": 1,
      "collection_type": "App\\Models\\Collections\\Dvd",
      "name": "Coleção de Teste",
      "loaned": "Não",
      "created_at": "2020-12-08T13:18:20.000000Z",
      "updated_at": "2020-12-08T13:18:20.000000Z",
      "user_name": null,
      "email": null,
      "collection": {
        "id": 1,
        "name": "Coleção de Teste",
        "created_at": "2020-12-08T13:18:20.000000Z",
        "updated_at": "2020-12-08T13:18:20.000000Z"
      }
    },
    {
      "id": 3,
      "user_id": null,
      "collection_id": 2,
      "collection_type": "App\\Models\\Collections\\Livro",
      "name": "Coleção de Teste",
      "loaned": "Não",
      "created_at": "2020-12-08T13:18:20.000000Z",
      "updated_at": "2020-12-08T13:18:20.000000Z",
      "user_name": null,
      "email": null,
      "collection": {
        "id": 2,
        "name": "Coleção de Teste",
        "created_at": "2020-12-08T13:18:20.000000Z",
        "updated_at": "2020-12-08T13:18:20.000000Z"
      }
    }
  ],
  "first_page_url": "http:\/\/localhost:3000\/collections?page=1",
  "from": 1,
  "last_page": 1,
  "last_page_url": "http:\/\/localhost:3000\/collections?page=1",
  "links": [
    {
      "url": null,
      "label": "pagination.previous",
      "active": false
    },
    {
      "url": "http:\/\/localhost:3000\/collections?page=1",
      "label": 1,
      "active": true
    },
    {
      "url": null,
      "label": "pagination.next",
      "active": false
    }
  ],
  "next_page_url": null,
  "path": "http:\/\/localhost:3000\/collections",
  "per_page": 3,
  "prev_page_url": null,
  "to": 3,
  "total": 3
}
```

POST http://localhost:3000/collections - Route to create an collection

+ INPUT EXAMPLE

```json
{
	"name": "Coleção de teste",
	"collection_type": "Livro",
	"loaned": "Sim",
	"user_name": "Yan",
	"email": "yaanpatrick@gmail.com"
}
```

+ RETURN EXAMPLE - Created 201

```json
{
  "status": "success",
  "message": {
    "name": "Coleção de teste",
    "collection_type": "App\\Models\\Collections\\Livro",
    "loaned": "Sim",
    "user_id": 1,
    "collection_id": 3,
    "updated_at": "2020-12-07T07:01:29.000000Z",
    "created_at": "2020-12-07T07:01:29.000000Z",
    "id": 4
  }
}
```

PUT http://localhost:3000/collections/{id} - Route to update an collection

+ INPUT EXAMPLE

```json
{
	"name": "Coleção de Teste editada",
	"collection_type": "App\\Models\\Collections\\Dvd",
	"loaned": "Não",
}
```

+ RETURN EXAMPLE - Success 200

```json
{
  "status": "success",
  "message": {
    "id": 1,
    "user_id": null,
    "collection_id": 1,
    "collection_type": "App\\Models\\Collections\\Dvd",
    "name": "Coleção de Teste editada",
    "loaned": "Não",
    "created_at": "2020-12-08T13:18:20.000000Z",
    "updated_at": "2020-12-08T13:27:40.000000Z",
    "collection": {
      "id": 1,
      "name": "Coleção de Teste editada",
      "created_at": "2020-12-08T13:18:20.000000Z",
      "updated_at": "2020-12-08T13:26:49.000000Z"
    }
  }
}
```

DELETE http://localhost:3000/collections/{id} - Route to delete an collection


+ RETURN 204 No Content
