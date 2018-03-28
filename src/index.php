<?php
require_once '../vendor/autoload.php';
require_once 'bootstrap.php';
require_once 'routes.php';

/**
 * Handle the request
 */
$response = $router->dispatch($request);
$response->send();
