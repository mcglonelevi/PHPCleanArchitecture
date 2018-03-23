<?php

require_once '../vendor/autoload.php';

use Medoo\Medoo;
use App\Repositories\TodoRepository;
use App\Util\DIContainer;
use App\Actions\Todo\IndexAction;

$container = DIContainer::getInstance();

$container->set('DB', function () {
    return new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'todo_app',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);
});

$container->set('TodoRepository', function () use ($container) {
    return new TodoRepository($container->get('DB'));
});

$index = new IndexAction;

print_r($index->execute());
