<?php
namespace App\Core;

class Router
{
    public function dispatch($uri)
    {
        // Clean and split the URI
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = trim($uri, '/');
        $segments = explode('/', $uri);

        // Defaults
        $controllerName = !empty($segments[0]) ? ucfirst($segments[0]) . 'Controller' : 'HomeController';
        $method = $segments[1] ?? 'index';
        $params = array_slice($segments, 2);

        // Check and call controller
        if (class_exists($controllerName)) {
            $controller = new $controllerName();

            if (method_exists($controller, $method)) {
                call_user_func_array([$controller, $method], $params);
            } else {
                $this->error("Method '$method' not found.");
            }
        } else {
            $this->error("Controller '$controllerName' not found.");
        }
    }

    private function error($message)
    {
        http_response_code(404);
        echo "<h1>404 Not Found</h1><p>$message</p>";
    }
}
