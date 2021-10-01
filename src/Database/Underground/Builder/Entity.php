<?php

namespace Dark\Database\Underground\Builder;

use Dark\ServiceContainer\Resolver;
use Dark\Database\Underground\Builder\Contracts\EntityDirector;

abstract class Entity implements EntityDirector
{
    /**
     * @var string $table
     */
    protected $table;

    /**
     * @var array $fillable
     */
    protected $fillable;

    /**
     * @var array $hidden
     */
    protected $hidden;

    /**
     * @var PDO $driver
     */
    private $driver;

    public function __construct()
    {   
        $this->driver = $this->getDriverInstance();
        $this->table();
    }

    public function getDriverInstance()
    {
        $resolver = new Resolver;

        $driver = getenv('DB_DRIVER');
        $driver = ucfirst($driver) . 'Builder';
        $driver = "Dark\\Database\\Underground\\Builder\\Drivers\\{$driver}";

        return $resolver->handler($driver);
    }

    public function table()
    {
        $table = explode('\\', get_called_class());
        $table = array_pop($table);
        $table = strtolower($table);
        
        if ($this->table) {
            return $this->driver->setTable($this->table);   
        }
        
        return $this->driver->setTable($table);
    }

    public function all()
    {
        $collection = $this->driver->select()
            ->exec()
            ->all();

        return $this->getCollectionWithoutHiddenColumns($collection);
    }

    public function first()
    {
        $result = $this->driver->select()
            ->exec()
            ->first();

        return $this->getResultWithoutHiddenColumns($result);
    }

    public function find(int $id)
    {
        $result =  $this->driver->select('*', ['id' => $id])
            ->exec()
            ->first();
            
        return $this->getResultWithoutHiddenColumns($result);
    }

    private function getCollectionWithoutHiddenColumns(array $collection)
    {
        $result = [];
        foreach ($collection as $item) {
            foreach ($this->hidden as $h) {
                unset($item[$h]);
            }
            $result[] = $item;
        }

        return $result;
    }

    private function getResultWithoutHiddenColumns(array $result)
    {
        foreach ($this->hidden as $h) {
            unset($result[$h]);
        }

        return $result;
    }

    public function create(array $data)
    {
        return $this->driver->create($data)
            ->exec();
    }

    public function update($id, $data)
    {
        return $this->driver->update($id, $data)
            ->exec();
    }

    public function delete($id)
    {
        return $this->driver->delete($id)
            ->exec();
    }
}
