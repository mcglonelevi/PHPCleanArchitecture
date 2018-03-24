<?php

namespace App\Actions\Todo;

use App\Util\DIContainer;
use App\Entities\Todo;
use Exception;

class ShowAction {
    public function __construct(int $id)
    {
        $container = DIContainer::getInstance();
        $this->todoRepository = $container->get('TodoRepository');

        $this->id = $id;
    }

    public function execute() : Todo
    {
        $todo = $this->todoRepository->getById($this->id);

        if (!$todo) {
            throw new Exception('Todo not found!');
        }

        return $todo;
    }
}
