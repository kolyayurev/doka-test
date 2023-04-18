<?php

namespace Core;

use Core\Request;
use Core\Traits\Singleton;

class Router
{
    use Singleton;
    public Request $request;
    protected array $routes = [];

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return "404";
        }

        if (is_array($callback)) {
            $controller = new $callback[0]();
            return call_user_func(array($controller, $callback[1]),$this->request);
        }

        return call_user_func($callback,$this->request);
    }
}