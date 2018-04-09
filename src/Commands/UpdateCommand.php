<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

use App\Actions\Todo\UpdateAction;
use App\Entities\Todo;

$updateCmd = new Commando\Command();

$updateCmd->option()
    ->require()
    ->describedAs('The ID of the todo.');

$updateCmd->option('d')
    ->aka('description')
    ->require()
    ->describedAs('When set, updates the description of a todo.');

$todo = new Todo;
$todo->description = $updateCmd['description'];

$updateAction = $container->make(UpdateAction::class);
print_r($updateAction->execute($todo, $updateCmd[0]));
