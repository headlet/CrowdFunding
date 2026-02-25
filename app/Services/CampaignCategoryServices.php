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

     public function getAll($perPage = 10)
    {
        $sort = request('sort', 'created_at');
        $direction = request('direction', 'desc');
        $search = request('search');

        $allowedSorts = ['name', 'created_at'];

        if (!in_array($sort, $allowedSorts)) {
            $sort = 'created_at';
        }

        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }


        return $this->model
            ->orderBy($sort, $direction)
            ->paginate($perPage)
            ->withQueryString(); // VERY IMPORTANT
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
