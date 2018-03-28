<?php

namespace App\Actions\Todo;

use App\Repositories\TodoRepository;
use App\Entities\Todo;
use App\Util\Response;

class UpdateAction {
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute(Todo $todo, int $id) : Response
    {
        $error = null;
        $todo->id = $id; // set to id to stop store action

        try {
            $todo = $this->todoRepository->save($todo);
        } catch (Exception $e) {
            $todo = null;
            $error = $e->getMessage();
        }

        return new Response(compact('todo'), $error);
    }
}
