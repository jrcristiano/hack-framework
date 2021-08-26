<?php

namespace Core\Router;

class Router extends BaseRouter
{
    public function get(string $url, array $params)
    {
        $controller = $params[0] ?? null;
        $action = $params[1] ?? null;
        return $this->request($url, $controller, $action);
    }

    public function post(string $url, array $params)
    {

    }

    public function put(string $url, array $params)
    {

    }

    public function delete(string $url, array $params)
    {

    }
}
