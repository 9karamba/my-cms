<?php

namespace App\View;

use App\Renderable;

class View implements Renderable
{
    private $path,
            $parameters;

    public function __construct($path, $parameters)
    {
        $this->path = VIEW_DIR . '\\' . str_replace('.', '\\', $path) . '.php';
        $this->parameters = $parameters;
    }

    public function render()
    {
        $parameters = $this->parameters;
        require_once $this->path;
    }
}
