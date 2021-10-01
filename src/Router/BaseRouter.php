<?php

namespace Dark\Router;

use Dark\ServiceContainer\Resolver;
use Dark\Router\Contracts\RouterContract;

abstract class BaseRouter implements RouterContract
{
    protected function request($url, $controller, $action)
    {
        $path = $_SERVER['REQUEST_URI'];

        if (strlen($path) > 1) {
            $path = rtrim($path, '/');
        }

        if ($path === $url) {
            $resolver = new Resolver;
            return $resolver->handler($controller, $action);
        }
    }

    protected function setControllerWithAction(string $url, array $params)
    {
        $controller = $params[0] ?? null;
        $action = $params[1] ?? null;
        return $this->request($url, $controller, $action);
    }
}
