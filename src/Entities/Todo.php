<?php

namespace App\Entities;

use App\Entities\Model;

class Todo extends Model
{
    public $id;
    public $description;

    public function toArray() : array
    {
        $arr = [
            'description' => $this->description
        ];

        if ($this->id) {
            $arr['id'] = $this->id;
        }

        return $arr;
    }

    public function validate() : bool
    {
        if ($this->description) {
            return true;
        }
        return false;
    }
}
