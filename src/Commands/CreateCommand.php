<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

use App\Actions\Todo\CreateAction;
use App\Entities\Todo;

$createCmd = new Commando\Command();

$createCmd->option('d')
    ->aka('description')
    ->require()
    ->describedAs('When set, updates the description of a todo.');

$todo = new Todo;
$todo->description = $createCmd['description'];

$createAction = $container->make(CreateAction::class);
print_r($createAction->execute($todo));
