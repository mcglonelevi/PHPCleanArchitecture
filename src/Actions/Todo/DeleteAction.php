<?php

namespace App\Actions\Todo;

use App\Repositories\TodoRepository;
use App\Util\Response;

class DeleteAction {
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function execute(int $id) : Response
    {
        $error = null;

        try {
            $numRows = $this->todoRepository->delete(['id' => $id]);
            $success = true;
        } catch (Exception $e) {
            $error = $e->getMessage();
            $success = false;
        }

        if (!$error && $numRows == 0) {
            $success = false;
            $error = 'Could not find Todo to delete.';
        }

        return new Response(compact('success'), $error);
    }
}
