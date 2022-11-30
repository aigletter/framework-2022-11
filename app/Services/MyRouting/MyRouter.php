<?php

namespace Learning\App\Services\MyRouting;

use Learning\Core\Interfaces\RouteInterface;

class MyRouter implements RouteInterface
{
    protected $namespace;

    public function __construct(string $namespace)
    {
        $this->namespace = $namespace;
    }

    public function setNamespace(string $namespace)
    {
        $this->namespace = $namespace;
    }

    public function route(): callable
    {
        return function () {
            if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/') {
                $controllerName = 'Home';
                $method = 'index';
                //$controllerName = ucfirst($exploded[0]);
                $controllerClass = $this->namespace . '\\' . $controllerName;
                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();
                    //$method = $exploded[1];
                    if (method_exists($controller, $method)) {
                        call_user_func([$controller, $method], $_GET);
                    }
                }
                /*$controller = new Home();
                $controller->index();*/
            } else {
                http_response_code(404);
                echo 'Page not found';
            }
        };
    }
}