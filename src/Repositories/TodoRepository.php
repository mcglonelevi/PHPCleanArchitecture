<?php

namespace App\Repositories;

use App\Entities\Todo;

class TodoRepository {
    public function __construct($database) {
        $this->database = $database;
    }

    public function getAll() : array {
        return $this->getWhere([]);
    }

    public function getById(int $id) : Todo {
        $row = $this->database->get('todos', '*', compact('id'));

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
        $upsert = [
            'description' => $todo->description
        ];

        if ($todo->id) {
            $this->database->update('todos', $upsert, [
                'id' => $todo->id
            ]);
        } else {
            $this->database->insert('todos', $upsert);
            $todo->id = $this->database->id();
        }

        return $todo;
    }

    public function delete(array $where) : bool {
        try {
            $this->database->delete('todos', $where);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}
