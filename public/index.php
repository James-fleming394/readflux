<?php
// Enable error reporting for development
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../config/config.php';
require_once '../app/core/Router.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Database.php'; 

// Autoload controllers
spl_autoload_register(function ($class) {
    if (file_exists("../app/controllers/$class.php")) {
        require_once "../app/controllers/$class.php";
    }
});

$router = new \App\Core\Router();
$router->dispatch($_SERVER['REQUEST_URI']);