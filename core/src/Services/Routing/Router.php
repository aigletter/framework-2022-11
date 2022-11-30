<?php

namespace Learning\Core\Services\Routing;

use Learning\Core\Interfaces\RouteInterface;

class Router implements RouteInterface
{
    public function route(): callable
    {
        return function () {
            $knownEntities = [
                'product'
            ];

            $url = $_SERVER['REQUEST_URI'];
            $segments = explode('/', $url);
            array_shift($segments);

            $entity = $segments[0];
            $id = $segments[1];

            if ($url === '/' || in_array($entity, $knownEntities) && is_numeric($id)) {
                echo 'Мы можем обрабатывать данный запрос';
            } else {
                http_response_code(404);
                echo 'Page not found';
            }
        };
    }
}