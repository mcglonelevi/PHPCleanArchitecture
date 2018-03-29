<?php

use Medoo\Medoo;
use App\Repositories\TodoRepository;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;

/**
 * Load Environment Vars
 */
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

/**
 * Setup Container and dispatcher
 */
$container = new Container;
$events = new Dispatcher($container);
$router = new Router($events, $container);
$request = Request::capture();
$redirect = new Redirector(new UrlGenerator($router->getRoutes(), $request));

/**
 * Setup Dependency Injection
 */
$container->instance('Illuminate\Http\Request', $request);
$container->instance('Illuminate\Routing\Redirector', $redirect);

$container->instance('Illuminate\Container\Container', $container);

$container->singleton('Medoo\Medoo', function ($container) {
    return new Medoo([
        'database_type' => getenv('DB_TYPE'),
        'database_name' => getenv('DB_NAME'),
        'server' => getenv('DB_HOST'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD')
    ]);
});

$container->singleton('TodoRepository', function ($container) {
    return new TodoRepository($container->make('Medoo\Medoo'));
});

$container->singleton('Twig_Environment', function ($container) {
    $loader = new Twig_Loader_Filesystem('Templates');
    $twig = new Twig_Environment($loader, []);
    return $twig;
});
