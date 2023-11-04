<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model;

    abstract public function model();

    public function __construct()
    {
        $this->model = app($this->model());
    }

    public function all()
    {
        return $this->model->latest()->paginate();
    }

    public function getBy($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($model, $data)
    {
        $model->update($data);

        if(method_exists($model, 'fresh')){
            $model->fresh();
        }

        return $model;
    }

}
