<?php

require_once '../vendor/autoload.php';
require_once 'bootstrap.php';

use App\Controllers\TodoController;
use App\Entities\Todo;

$todoController = new TodoController();

print_r($todoController->show(2));
