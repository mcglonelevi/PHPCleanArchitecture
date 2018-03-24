<?php

namespace App\Util;

class Response
{
    public $data;
    public $error;

    public function __construct(array $data, string $error = null)
    {
        $this->data = $data;
        $this->error = $error;
    }

    public function toJSON()
    {
        if ($this->error)
        {
            return json_encode(['error' => $this->error], JSON_PRETTY_PRINT);
        }
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }
}
