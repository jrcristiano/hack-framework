<?php

namespace Dark\Router;

class Router extends BaseRouter
{
    public function get(string $url, array $params)
    {
        return $this->setControllerWithAction($url, $params);
    }

    public function post(string $url, array $params)
    {
        return $this->setControllerWithAction($url, $params);
    }

    public function put(string $url, array $params)
    {
        return $this->setControllerWithAction($url, $params);
    }

    public function delete(string $url, array $params)
    {
        return $this->setControllerWithAction($url, $params);
    }
}
