<?php

namespace App\Actions\Todo;


use App\Entities\Todo;
use Exception;
use App\Util\Response;
use App\Repositories\TodoRepository;

class ShowAction {
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute(int $id) : Response
    {
        $error = null;

        try {
            $todo = $this->todoRepository->getById($id);
        } catch (Exception $e) {
            $todo = null;
            $error = $e->getMessage();
        }

        return new Response(compact('todo'), $error);
    }
}
