<?php

namespace App;

class Application
{
    private $router;

    public function __construct($router)
    {
        $this->router = $router;
    }

    public function run()
    {
        $data = $this->router->dispatch();

        if ($data instanceof Renderable) {
            $data->render();
        } else {
            echo $data;
        }
    }
}