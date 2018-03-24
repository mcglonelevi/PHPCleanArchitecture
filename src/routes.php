<?php

use Illuminate\Routing\Router;

$router->prefix('api')->group(function () use ($router) {
    $router->get('/todos', ['name' => 'users.index', 'uses' => 'App\Presenters\API\TodoPresenter@index']);
    $router->get('/todos/{id}', ['name' => 'users.show', 'uses' => 'App\Presenters\API\TodoPresenter@show']);
    $router->post('/todos', ['name' => 'users.store', 'uses' => 'App\Presenters\API\TodoPresenter@store']);
    $router->put('/todos/{id}', ['name' => 'users.update', 'uses' => 'App\Presenters\API\TodoPresenter@update']);
    $router->delete('/todos/{id}', ['name' => 'users.delete', 'uses' => 'App\Presenters\API\TodoPresenter@delete']);
});

$router->get('/todos', ['name' => 'users.index', 'uses' => 'App\Presenters\Frontend\TodoPresenter@index']);
$router->get('/todos/{id}', ['name' => 'users.show', 'uses' => 'App\Presenters\Frontend\TodoPresenter@show']);
$router->post('/todos', ['name' => 'users.store', 'uses' => 'App\Presenters\Frontend\TodoPresenter@store']);
$router->put('/todos/{id}', ['name' => 'users.update', 'uses' => 'App\Presenters\Frontend\TodoPresenter@update']);
$router->delete('/todos/{id}', ['name' => 'users.delete', 'uses' => 'App\Presenters\Frontend\TodoPresenter@delete']);  
