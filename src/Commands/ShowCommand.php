<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

use App\Actions\Todo\ShowAction;

$showCmd = new Commando\Command();

$showCmd->option()
    ->require()
    ->describedAs('The ID of the todo.');

$showAction = $container->make(ShowAction::class);
print_r($showAction->execute($showCmd[0]));
