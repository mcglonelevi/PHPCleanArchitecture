<?php

namespace App\Actions\Todo;

use App\Entities\Todo;

class CreateAction {
    public function __construct(Todo $todo) : void
    {
        $this->todo = $todo;
    }

    public function execute() : Todo
    {
        return $this->todoRepository->save($this->todo);
    }
}
