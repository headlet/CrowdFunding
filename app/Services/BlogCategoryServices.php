<?php

namespace App\Services;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryServices extends Services
{

    public function __construct(BlogCategory $model)
    {
        parent::__construct($model);
    }

    public function getAll($pagination = 10)
    {
        return $this->model->paginate($pagination);
    }

    public function store($request)
    {
        $data = $request->except('token');

        return $this->model->create($data);
    }

    public function getById($id)
    {
        return ['category' => $this->model->findorFail($id),];
    }

    public function update($id, $request){
        $category = $this->model->findorFail($id);
        $data = $request->except('token');

        return $category->update($data);
    }
}
