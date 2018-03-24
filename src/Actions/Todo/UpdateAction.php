<?php

namespace App\Actions\Todo;

use App\Util\DIContainer;
use App\Entities\Todo;

class UpdateAction {
    public function __construct(Todo $todo)
    {
        $container = DIContainer::getInstance();
        $this->todoRepository = $container->get('TodoRepository');

        $this->todo = $todo;
    }

    public function execute() : Todo
    {
        return $this->todoRepository->save($this->todo);
    }
}
