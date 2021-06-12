<?php

namespace App\View;

use App\Renderable;

class View implements Renderable
{
    private $data;

    public function __construct($path, $parameters)
    {
        $this->data = [
            'path' => VIEW_DIR . '\\' . str_replace('.', '\\', $path) . '.php',
            'parameters' => $parameters
        ];
    }

    public function render()
    {
        $parameters = $this->data['parameters'];
        require_once $this->data['path'];
    }
}