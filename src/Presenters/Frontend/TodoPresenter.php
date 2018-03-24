<?php

namespace App\Presenters\Frontend;

use App\Controllers\TodoController;
use Illuminate\Http\Request;
use App\Entities\Todo;
use App\Util\DIContainer;

class TodoPresenter {
    public function __construct()
    {
        $container = DIContainer::getInstance();
        $this->twig = $container->get('Twig');
    }

    public function index()
    {
        // return (new TodoController)->index()->toJSON();
        return $this->twig->load('index.html')->render();
    }

    public function show($id)
    {
        return (new TodoController)->show($id)->toJSON();
    }

    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->fill($request->input());
        return (new TodoController)->store($todo)->toJSON();
    }

    public function update(Request $request, $id)
    {
        $todo = new Todo;
        $todo->fill($request->input());
        return (new TodoController)->update($id, $todo)->toJSON();
    }

    public function delete($id)
    {
        return (new TodoController)->delete($id)->toJSON();
    }

}
