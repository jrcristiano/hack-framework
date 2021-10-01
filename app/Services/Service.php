<?php

namespace App\Services;

abstract class Service
{
    protected $repository;

    public function all()
    {
        return $this->repository->all();
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function first()
    {
        return $this->repository->first();
    }
}
