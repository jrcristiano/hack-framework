<?php

namespace Core\Router;

use Core\DI\Resolver;
use Core\Router\Contracts\RouterContract;

abstract class BaseRouter implements RouterContract
{
    protected function request($url, $controller, $action)
    {
        $path = $_SERVER['PHP_SELF'];
        $path = str_replace('/index.php', '', $path);

        if (strlen($path) > 1) {
            $path = rtrim($path, '/');
        }

        if ($path === $url) {
            $resolver = new Resolver;
            return $resolver->handler($controller, $action);
        }
    }
}
