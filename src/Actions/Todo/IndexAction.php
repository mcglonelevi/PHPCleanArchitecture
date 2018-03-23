<?php

namespace App\Actions\Todo;

use App\Util\DIContainer;

class IndexAction {
    public function __construct()
    {
        $container = DIContainer::getInstance();
        $this->todoRepository = $container->get('TodoRepository');
    }

    public function execute() : array
    {
        return $this->todoRepository->getAll();
    }
}
