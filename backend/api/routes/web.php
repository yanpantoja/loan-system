<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return "Hello world!";
});

$router->get('/books', 'CollectionsController@index');
$router->post('/books', 'BooksController@store');
$router->put('/books/{id}', 'BooksController@update');
