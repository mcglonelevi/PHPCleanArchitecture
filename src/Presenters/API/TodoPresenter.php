<?php

namespace App\Presenters\API;

use App\Util\Response;

class TodoPresenter {
    public function __construct()
    {
        header('Content-Type: application/json');
        $this->wrap = preg_match('/(text\/html|\*)/', getallheaders()['Accept']);
    }

    public function index(Response $response)
    {
        return ($this->wrap ? '<pre>' . $response->toJSON() . '</pre>' : $response->toJSON());
    }

    public function show(Response $response)
    {
        return ($this->wrap ? '<pre>' . $response->toJSON() . '</pre>' : $response->toJSON());
    }

    public function store(Response $response)
    {
        return ($this->wrap ? '<pre>' . $response->toJSON() . '</pre>' : $response->toJSON());
    }

    public function update(Response $response)
    {
        return ($this->wrap ? '<pre>' . $response->toJSON() . '</pre>' : $response->toJSON());
    }

    public function delete(Response $response)
    {
        return ($this->wrap ? '<pre>' . $response->toJSON() . '</pre>' : $response->toJSON());
    }

}
