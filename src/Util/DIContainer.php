<?php

namespace App\Util;

class DIContainer
{
    private $instances = [];
    private $closures = [];
    private static $instance = null;

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function get(string $key)
    {
        if (!isset($this->instances[$key])) {
            $this->instances[$key] = $this->closures[$key]();
        }
        return $this->instances[$key];
    }

    public function set(string $key, $closure) : void
    {
        $this->closures[$key] = $closure;
    }
}
