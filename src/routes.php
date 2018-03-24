<?php

use Illuminate\Routing\Router;

$router->get('/', ['name' => 'users.index', 'uses' => 'App\Presenters\API\TodoPresenter@index']);
$router->get('/{id}', ['name' => 'users.show', 'uses' => 'App\Presenters\API\TodoPresenter@show']);
$router->post('/', ['name' => 'users.store', 'uses' => 'App\Presenters\API\TodoPresenter@store']);
$router->put('/{id}', ['name' => 'users.update', 'uses' => 'App\Presenters\API\TodoPresenter@update']);
$router->delete('/{id}', ['name' => 'users.delete', 'uses' => 'App\Presenters\API\TodoPresenter@delete']);
