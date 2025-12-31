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
        $campaign = $this->model->find($id);
        if (!$campaign) {
            return ['error' => 'Campaign not found.'];
        }

        $campaign->delete();

        return ['success' => true];
    }
}