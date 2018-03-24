<?php

namespace App\Actions\Todo;

use App\Util\DIContainer;
use App\Util\Reponse;

class DeleteAction {
    public function __construct($id)
    {
        $container = DIContainer::getInstance();
        $this->todoRepository = $container->get('TodoRepository');

        $this->id = $id;
    }

    public function execute() : int
    {
        return $this->todoRepository->delete(['id' => $this->id]);
    }
}
