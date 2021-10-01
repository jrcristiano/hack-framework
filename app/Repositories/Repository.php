<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model;

    public function all()
    {
        return $this->model->all();
    }
    public function first()
    {
        return $this->model->first();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->model->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->driver->delete($id);
    }
}
