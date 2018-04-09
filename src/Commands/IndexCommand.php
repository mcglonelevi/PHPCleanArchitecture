<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

use App\Actions\Todo\IndexAction;

$indexAction = $container->make(IndexAction::class);
print_r($indexAction->execute());
