<?php

$router->prefix('api')->group(function () use ($router) {
    $router->get('/todos', ['name' => 'api.todos.index', 'uses' => 'App\Controllers\API\TodoController@index']);
    $router->get('/todos/{id}', ['name' => 'api.todos.show', 'uses' => 'App\Controllers\API\TodoController@show']);
    $router->post('/todos', ['name' => 'api.todos.store', 'uses' => 'App\Controllers\API\TodoController@store']);
    $router->put('/todos/{id}', ['name' => 'api.todos.update', 'uses' => 'App\Controllers\API\TodoController@update']);
    $router->delete('/todos/{id}', ['name' => 'api.todos.delete', 'uses' => 'App\Controllers\API\TodoController@delete']);
});

$router->get('/todos', ['as' => 'todos.index', 'uses' => 'App\Controllers\Frontend\TodoController@index']);
$router->get('/todos/create', ['as' => 'todos.create', 'uses' => 'App\Controllers\Frontend\TodoController@create']);
$router->post('/todos', ['as' => 'todos.store', 'uses' => 'App\Controllers\Frontend\TodoController@store']);
$router->get('/todos/{id}', ['as' => 'todos.show', 'uses' => 'App\Controllers\Frontend\TodoController@show']);
$router->get('/todos/{id}/edit', ['as' => 'todos.edit', 'uses' => 'App\Controllers\Frontend\TodoController@edit']);
$router->put('/todos/{id}', ['as' => 'todos.update', 'uses' => 'App\Controllers\Frontend\TodoController@update']);
$router->delete('/todos/{id}', ['as' => 'todos.delete', 'uses' => 'App\Controllers\Frontend\TodoController@delete']);
