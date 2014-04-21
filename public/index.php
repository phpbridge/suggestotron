<?php
require_once '../src/Suggestotron/Config.php';
\Suggestotron\Config::setDirectory('../config');

$config = \Suggestotron\Config::get('autoload');
require_once $config['class_path'] . '/Suggestotron/Autoloader.php';

$route = null;
if (isset($_SERVER['PATH_INFO'])) {
    $route = $_SERVER['PATH_INFO'];
}

$router = new \Suggestotron\Router();
$router->start($route);
?>