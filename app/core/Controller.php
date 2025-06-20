<?php
namespace App\Core;

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        $viewPath = __DIR__ . "/../views/{$view}.php";
        
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "<h1>View not found:</h1> <p>{$view}</p>";
        }
    }
}
