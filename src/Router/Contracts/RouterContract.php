<?php

namespace Dark\Router\Contracts;

interface RouterContract
{
    public function get(string $url, array $params);
    public function post(string $url, array $params);
    public function put(string $url, array $params);
    public function delete(string $url, array $params);
}
