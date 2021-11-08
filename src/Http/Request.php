<?php

namespace Dark\Http;

class Request
{   
    public function isMethod(string $method): bool
    {   
        $method = strtoupper($method);

        if ($_SERVER['REQUEST_METHOD'] === $method) {
            return true;
        }

        return false;
    }

    public function input(string $name): mixed
    {
        if ($this->isMethod('post')) {
            return filter_input(INPUT_POST, $name);   
        }

        return filter_input(INPUT_GET, $name);
    }
    
    public function all(): mixed
    {   
        if ($this->isMethod('post')) {
            return filter_input_array(INPUT_POST) ?? [];
        }

        return filter_input_array(INPUT_GET) ?? [];
    }
}