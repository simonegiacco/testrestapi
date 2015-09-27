<?php

namespace App\Repositories;

class Repository
{
    protected $model;

    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function store(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function findById($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function findByIds(array $ids)
    {
        return $this->model->whereIn('id', $ids)->get();
    }

    public function update($id, array $attributes = [])
    {
        $record = $this->findById($id);

        $record->fill($attributes)->save();

        return $record;
    }

}