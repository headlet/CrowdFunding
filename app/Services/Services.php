<?php

namespace App\Services;

class Services
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getCreateData()
    {
        return [];
    }

    public function getAll($pagination = 10)
    {
        return $this->model->paginate($pagination);
    }

    public function getById(string $id)
    {
        return ['team' => $this->model->findorFail($id)];
    }

    public function delete(string $id)
    {
        $data = $this->model->findorFail($id);

        $data->delete();

        return ['success' => true];
    }
}
