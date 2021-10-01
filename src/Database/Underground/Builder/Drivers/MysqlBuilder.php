<?php

namespace Dark\Database\Underground\Builder\Drivers;

use Dark\Database\Connector;
use Dark\Database\Underground\Builder\Contracts\EntityBuilder;
use PDO;

class MysqlBuilder implements EntityBuilder
{
    protected $table;
    protected $query;
    private $connector;

    public function __construct(Connector $connector)
    {
        $this->connector = $connector->getInstance();
    }

    public function setTable(string $table)
    {
        if (!isset($this->table)) {
            $this->table = $table;
        }
    }

    public function select($columns = '*', array $data = [])
    {
        $query = "SELECT {$columns} FROM {$this->table}";

        if ($data) {
            $query .= " WHERE " . $this->params($data);
        }

        $this->query = $this->connector->prepare($query);

        $this->bind($data);

        return $this;
    }

    public function all()
    {
        return $this->query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first()
    {
        return $this->query->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {   
        $places = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO {$this->table}({$places}) VALUES({$values})";

        $this->query = $this->connector->prepare($query);

        $this->bind($data);

        return $this;
    }

    public function update($id, array $data)
    {   
        $places = $this->params($data);

        $query = "UPDATE {$this->table} SET {$places} WHERE " . $this->params($data);

        $this->query = $this->connector->prepare($query);

        $this->bind($data);
        $this->query->bindValue(':product_id', $id);

        return $this;
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE product_id = :product_id";

        $this->query = $this->connector->prepare($query);

        $this->query->bindValue('product_id', $id);

        return $this;
    }

    public function bind($params)
    {   
        foreach ($params as $key => $value) {
            $this->query->bindValue($key, $value);
        }
    }

    public function params($params)
    {
        $parameters = [];
        foreach ($params as $key => $value) {
            $parameters[] = $key .' = :'. $key;
        }

        return implode(', ', $parameters);
    }

    public function exec($query = null)
    {
        if ($query) {
            $this->query->prepare($query);
        }

        $this->query->execute();
        return $this;
    }
}
