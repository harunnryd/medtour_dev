<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->makeModel();
    }

    abstract function model();

    public function makeModel()
    {
        $model = app($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} harus instance dari Illuminate\\Database\\Eloquent\\Model");
        }   return $this->model = $model->newQuery();

    }

    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function find($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function findBy($field, $value, $columns = array('*'))
    {
        return $this->model->where($field, '=', $value)->first($columns);
    }
}
