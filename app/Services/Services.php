<?php
namespace App\Services;

class Services{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }


       public function delete(string $id)
    {
        $data = $this->model->findorFail($id);

        $data->delete();

        return ['success' => true];
    }
}