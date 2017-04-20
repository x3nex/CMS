<?php
namespace App\Core;
class Router {

    public $routes = [];

    public static function load($file) ///routes.php
    {
        $routes = new static;

        require $file;

        return $routes;
    }
    public function register($routes)
    {
        $this->routes = $routes;
    }

    public function get($route, $controller)
    {
        $this->routes['GET'][$route] = $controller;
    }

    public function post($route, $controller)
    {
        $this->routes['POST'][$route] = $controller;
    }

    public function direct($uri, $method) // about/culture
    {
        if(array_key_exists($uri, $this->routes[$method])){

            return $this->callAction(
                ...explode("@", $this->routes[$method][$uri])
                );

        }
        try {
            throw new \Exception('No route found.');
        } catch (\Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function callAction($controller, $method)
    {
        $controller = "\\App\\Controllers\\{$controller}";
        return (new $controller)->$method();
    }
}