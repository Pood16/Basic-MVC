<?php

namespace App\Core;

class Router {

    private array $routes = [];
    
    public function add($method, $path, $handler){
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'handler' => $handler
        ];
    }
    
    public function dispatch(){
        
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $this->matchPath($route['path'], $path)) {
                [$controller, $action] = $route['handler'];
                $controller = new $controller();
                $controller->$action();
                return;
            }
        }
        
        // Handle 404
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
    
    private function matchPath($routePath, $requestPath){
        $routeRegex = preg_replace('/\{([^}]+)\}/', '([^/]+)', $routePath);
        return preg_match("#^$routeRegex$#", $requestPath);
    }

    public function getRoutes(){
        return $this->routes;
    }
}
