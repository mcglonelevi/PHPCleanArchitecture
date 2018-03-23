<?php

namespace App\Actions\Todo;

use App\Entities\Todo;

class DeleteAction {
    public function __construct($id) : void
    {
        $this->id = $id;
    }

    public function execute() : Todo
    {
        return $this->todoRepository->delete(['id' => $this->id]);
    }
}
