<?php
namespace Suggestotron;

class Router {
    public function start($route)
    {
        $path = realpath("./" . $route . ".php");

        if (file_exists($path)) {
            require $path;
        } else {
            require 'error.php';
        }
    }
}