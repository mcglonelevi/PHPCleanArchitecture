<?php

namespace App\Presenters\API;

use App\Controllers\TodoController;
use Illuminate\Http\Request;
use App\Entities\Todo;

class TodoPresenter {
    public function __construct()
    {
        header('Content-Type: application/json');
    }

    public function index()
    {
        return (new TodoController)->index()->toJSON();
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
