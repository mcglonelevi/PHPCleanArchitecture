<?php

namespace App\Repositories;

use App\Entities\Todo;
use Exception;

class TodoRepository {
    public function __construct(\Medoo\Medoo $database) {
        $this->database = $database;
    }

    public function getAll() : array {
        return $this->getWhere([]);
    }

    public function getById(int $id) : ?Todo {
        $row = $this->database->get('todos', '*', compact('id'));

        if (!$row)
        {
            return null;
        }

        $todo = new Todo;
        $todo->fill($row);
        return $todo;
    }

    public function getWhere(array $properties) : array {
        $results = $this->database->select('todos', '*', $properties);

        return array_map(function ($row) {
            $todo = new Todo;
            $todo->fill($row);
            return $todo;
        }, $results);
    }

    public function save(Todo $todo) : Todo {
        if (!$todo->validate()) {
            throw new Exception('Cannot insert todo into database.  Object failed validation.');
        }

        if ($todo->id) {
            $this->database->update('todos', $todo->toArray(), [
                'id' => $todo->id
            ]);
        } else {
            $this->database->insert('todos', $todo->toArray());
            $todo->id = $this->database->id();
        }

        return $todo;
    }

    public function delete(array $where) : int {
        return $this->database->delete('todos', $where)->rowCount();
    }
}
