<?php

namespace App\Actions\Todo;

use App\Repositories\TodoRepository;
use App\Entities\Todo;
use App\Util\Response;

class CreateAction {
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute(Todo $todo) : Response
    {
        $todo->id = null; // Set to null to stop updates
        $error = null;

        try {
            $todo = $this->todoRepository->save($todo);
        } catch (Exception $e) {
            $todo = null;
            $error = $e->getMessage();
        }

        return new Response(compact('todo'), $error);
    }
}
