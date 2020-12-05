<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return "Hello world!";
});

$router->get('/books', 'BooksController@index');
$router->post('/books', 'BooksController@store');
