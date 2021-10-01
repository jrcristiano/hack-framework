<?php

function asset(string $path) {
    $exp = explode('\\', $path);

    $host = $_SERVER['HTTP_HOST'];
    $http = 'http://';
    
    if (isset($_SERVER['HTTPS'])) {
        return $http = 'https://';
    }

    if ($exp[0] === '') {
        return "{$http}{$host}{$path}";
    }

    return "{$http}{$host}/{$path}";
}
