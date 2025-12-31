<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\campaign_categories;
use App\Models\User;

class CampaignServices extends Services
{
   
    public function __construct(Campaign $model)
    {
        parent::__construct($model);
    }

    public function getAll($perPage = 10)
    {
        return $this->model->with(['user', 'category'])->orderBy('created_at', 'desc')->paginate($perPage);
    }
  

    public function getCreateData()
    {
        return [
            'users'      => User::orderBy('full_name')->get(),
            'categories' => campaign_categories::orderBy('name')->get(),
        ];
    }

    public function getById(string $id)
    {
        return [
            'campaign' => $this->model
                ->with(['user', 'category'])
                ->findOrFail($id),

            'users' => User::select('id', 'full_name')->get(),
            'categories' => campaign_categories::select('id', 'name')->get(),
        ];
    }


    public function store(Request $request)
    {
        $data = $request->except('_token');
        if (isset($data['image']) && $data['image']->isValid()) {
            $filename = time() . '_' . $data['image']->getClientOriginalName();
            $data['image']->move(public_path('uploads/campaigns'), $filename);
            $data['image'] = $filename;
        }
        return $this->model->create($data);
    }


    public function update(string $id, Request $request)
    {

        $campaign = $this->model->find($id);
        if (!$campaign) {
            return ['error' => 'Campaign not found.'];
        }

        $data = $request->except('_token');

        if (isset($data['image']) && $data['image']->isValid()) {
            $filename = time() . '_' . $data['image']->getClientOriginalName();
            $data['image']->move(public_path('uploads/campaigns'), $filename);
            $data['image'] = $filename;
        }

        $campaign->update($data);

        return $campaign;
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
