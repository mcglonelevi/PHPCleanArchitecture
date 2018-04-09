<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

use App\Actions\Todo\DeleteAction;

$deleteCmd = new Commando\Command();

$deleteCmd->option()
    ->require()
    ->describedAs('The ID of the todo.');

$deleteAction = $container->make(DeleteAction::class);
print_r($deleteAction->execute($deleteCmd[0]));
