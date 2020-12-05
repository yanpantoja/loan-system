<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return "Hello world!";
});

$router->get('/collections', 'CollectionsController@index');
$router->post('/collections', 'CollectionsController@store');
$router->put('/collections/{id}', 'CollectionsController@update');
$router->delete('/collections/{id}', 'CollectionsController@destroy');

