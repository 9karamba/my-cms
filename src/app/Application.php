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
        echo $this->router->dispatch();
    }
}