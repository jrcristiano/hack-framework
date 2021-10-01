<?php

namespace Dark\Database;

use PDO;

class Connector
{
    private $instance = null;

    public function getInstance(): PDO
    {
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_DATABASE');

        if (!$this->instance) {
            $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4" ?? null;
            $user = getenv('DB_USERNAME') ?? null;
            $password = getenv('DB_PASSWORD') ?? null;

            $this->instance = new PDO($dsn, $user, $password);
        }

        return $this->instance;
    }
}
