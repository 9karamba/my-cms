<?php

namespace App;

class Router
{
    private $routers;

    public function dispatch()
    {
        $route = $this->routers[$_SERVER['REQUEST_URI']] ?? '';

        if (is_string($route)) {
            return $route;

        } elseif (is_array($route)) {
            return call_user_func($route);
        }

        return $route();
    }

    public function get($path, $callback)
    {
        if (is_string($callback)) {
            [$class, $method] = explode("@", $callback);
            $this->routers[$path] = array(new $class, $method);
        } else {
            $this->routers[$path] = $callback;
        }
    }
}
