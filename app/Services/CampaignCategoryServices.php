<?php

namespace App\Services;

use App\Models\CampaignCategories;
use Illuminate\Http\Request;

class CampaignCategoryServices extends Services
{
    public function __construct(CampaignCategories $model)
    {
        parent::__construct($model);
    }

    public function getAll($pagenumber = 10)
    {
        return $this->model::orderBy('name', 'asc')->paginate($pagenumber);
    }

    public function getCreateData()
    {
        return [];
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->model::create($data);
    }

    public function getById($id)
    {
        return [
            'category' => $this->model->findorFail($id),
        ];
    }

    public function update(string $id, Request $request)
    {
        $category = $this->model::findorFail($id);

        $data = $request->except('_token');

        $category->update($data);

        return $category;
    }
}
