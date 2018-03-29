<?php

namespace App\Presenters\Frontend;

use App\Controllers\TodoController;
use Illuminate\Http\Request;
use App\Entities\Todo;
use App\Util\Response;
use Twig_Environment;

class TodoPresenter {
    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function index(Response $response)
    {
        return $this->twig->load('index.html')->render(compact('response'));
    }

    public function show(Response $response)
    {
        return $this->twig->load('show.html')->render(compact('response'));
    }

    public function create()
    {
        return $this->twig->load('create.html')->render();
    }

    public function edit(Response $response)
    {
        return $this->twig->load('edit.html')->render(compact('response'));
    }

}
