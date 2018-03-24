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
}
