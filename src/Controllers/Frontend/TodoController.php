<?php

namespace App\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Entities\Todo;
use App\Actions\Todo\CreateAction;
use App\Actions\Todo\IndexAction;
use App\Actions\Todo\DeleteAction;
use App\Actions\Todo\ShowAction;
use App\Actions\Todo\UpdateAction;
use App\Presenters\Frontend\TodoPresenter;
use Illuminate\Routing\Redirector;

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

    public function create(TodoPresenter $presenter)
    {
        return $presenter->create();
    }

    public function store(TodoPresenter $presenter, Request $request, CreateAction $createAction, Redirector $redirect)
    {
        $todo = new Todo;
        $todo->fill($request->input());

        $response = $createAction->execute($todo);
        return $redirect->route('todos.show', $response->data['todo']->id);
    }

    public function edit(TodoPresenter $presenter, ShowAction $showAction, $id)
    {
        $response = $showAction->execute($id);
        return $presenter->edit($response);
    }

    public function update(Redirector $redirect, Request $request, UpdateAction $updateAction, int $id)
    {
        $todo = new Todo;
        $todo->fill($request->input());

        $response = $updateAction->execute($todo, $id);
        return $redirect->route('todos.show', $response->data['todo']->id);
    }

    public function delete(Redirector $redirect, DeleteAction $deleteAction, int $id)
    {
        $response = $deleteAction->execute($id);
        return $redirect->route('todos.index');
    }
}
