<?php

namespace App\Actions\Todo;

use App\Entities\Todo;

class ShowAction {
    public function __construct(int $id) : void
    {
        $this->id = $id;
    }

    public function execute() : Todo
    {
        return $this->todoRepository->getById($this->id);
    }
}
