<?php

namespace App\Controllers\API;

use Illuminate\Http\Request;

use App\Entities\Todo;
use App\Actions\Todo\CreateAction;
use App\Actions\Todo\IndexAction;
use App\Actions\Todo\DeleteAction;
use App\Actions\Todo\ShowAction;
use App\Actions\Todo\UpdateAction;
use App\Presenters\API\TodoPresenter;

class TodoController {
    public function index(TodoPresenter $presenter, IndexAction $indexAction)
    {
        $response = $indexAction->execute();
        return $presenter->index($response);
    }

    public function show(TodoPresenter $presenter, ShowAction $showAction, int $id)
    {
        $response = $showAction->execute($id);
        return $presenter->show($response);
    }

    public function store(TodoPresenter $presenter, Request $request, CreateAction $createAction)
    {
        $todo = new Todo;
        $todo->fill($request->input());

        $response = $createAction->execute($todo);
        return $presenter->store($response);
    }

    public function update(TodoPresenter $presenter, Request $request, UpdateAction $updateAction, int $id)
    {
        $todo = new Todo;
        $todo->fill($request->input());

        $response = $updateAction->execute($todo, $id);
        return $presenter->update($response);
    }

    public function delete(TodoPresenter $presenter, DeleteAction $deleteAction, int $id)
    {
        $response = $deleteAction->execute($id);
        return $presenter->delete($response);
    }
}
