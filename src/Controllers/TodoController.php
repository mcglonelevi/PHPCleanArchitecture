<?php

namespace App\Controllers;

use App\Entities\Todo;
use App\Util\Response;
use App\Actions\Todo\CreateAction;
use App\Actions\Todo\IndexAction;
use App\Actions\Todo\DeleteAction;
use App\Actions\Todo\ShowAction;
use App\Actions\Todo\UpdateAction;
use Exception;

class TodoController {
    public function index()
    {
        $error = null;

        try {
            $todos = (new IndexAction)->execute();
        } catch (Exception $e) {
            $todos = null;
            $error = $e->getMessage();
        }

        return new Response(compact('todos'), $error);
    }

    public function show(int $id)
    {
        $error = null;

        try {
            $todo = (new ShowAction($id))->execute();
        } catch (Exception $e) {
            $todo = null;
            $error = $e->getMessage();
        }

        return new Response(compact('todo'), $error);
    }

    public function store(Todo $todo)
    {
        $todo->id = null; // Set to null to stop updates
        $error = null;

        try {
            $todo = (new CreateAction($todo))->execute();
        } catch (Exception $e) {
            $todo = null;
            $error = $e->getMessage();
        }

        return new Response(compact('todo'), $error);
    }

    public function update(int $id, Todo $todo)
    {
        $todo->id = $id; // set to id to stop store action

        try {
            $todo = (new UpdateAction($todo))->execute();
        } catch (Exception $e) {
            $todo = null;
            $error = $e->getMessage();
        }

        return new Response(compact('todo'), $error);
    }

    public function delete(int $id)
    {
        $error = null;

        try {
            $numRows = (new DeleteAction($id))->execute();
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
