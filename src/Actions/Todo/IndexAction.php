<?php

namespace App\Actions\Todo;


use App\Util\Response;
use App\Repositories\TodoRepository;

class IndexAction {
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute() : Response
    {
        $error = null;

        try {
            $todos = $this->todoRepository->getAll();
        } catch (Exception $e) {
            $todos = null;
            $error = $e->getMessage();
        }

        return new Response(compact('todos'), $error);
    }
}
