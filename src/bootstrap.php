<?php

use Medoo\Medoo;
use App\Util\DIContainer;
use App\Repositories\TodoRepository;

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$container = DIContainer::getInstance();

$container->set('DB', function () {
    return new Medoo([
        'database_type' => getenv('DB_TYPE'),
        'database_name' => getenv('DB_NAME'),
        'server' => getenv('DB_HOST'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD')
    ]);
});

$container->set('TodoRepository', function () use ($container) {
    return new TodoRepository($container->get('DB'));
});

$container->set('Twig', function () use ($container) {
    $loader = new Twig_Loader_Filesystem('Templates');
    $twig = new Twig_Environment($loader, []);
    return $twig;
});
