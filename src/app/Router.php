<?php

namespace App;

class Router
{
    private $routers;

    public function dispatch()
    {
        $route = $this->routers[str_replace('/', '', $_SERVER['REQUEST_URI'])] ?? $this->routers[$_SERVER['REQUEST_URI']] ?? '';

        return is_string($route) ? $route : $route();
    }

    public function get($path, $callback)
    {
        if (is_string($callback)) {
            $data = str_replace('@', '::', $callback);
            $this->routers[$path] = $data();
        } else {
            $this->routers[$path] = $callback;
        }
    }
}