<?php

namespace App\Entities;

abstract class Model {
    public function fill (array $properties) : void {
        array_walk($properties, function ($value, $key) {
            $this->$key = $value;
        });
    }
}
