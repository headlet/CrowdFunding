<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignCategories;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CampaignServices extends Services
{

    public function __construct(Campaign $model)
    {
        parent::__construct($model);
    }

    public function getAll($perPage = 10)
    {
        $sort = request('sort', 'created_at');
        $direction = request('direction', 'desc');
        $search = request('search');

        $allowedSorts = ['title', 'status', 'created_at'];

        if (!in_array($sort, $allowedSorts)) {
            $sort = 'created_at';
        }

        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        $query = $this->model->with(['user', 'category']);

        // 🔍 SEARCH LOGIC
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($cat) use ($search) {
                        $cat->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('user', function ($user) use ($search) {
                        $user->where('full_name', 'like', "%{$search}%");
                    });
            });
        }

        return $query
            ->orderBy($sort, $direction)
            ->paginate($perPage)
            ->withQueryString(); // VERY IMPORTANT
    }


    public function getCreateData()
    {
        return [
            'users'      => User::orderBy('full_name')->get(),
            'categories' => CampaignCategories::orderBy('name')->get(),
        ];
    }

    public function getById(string $id)
    {
        return [
            'campaign' => $this->model
                ->with(['user', 'category'])
                ->findOrFail($id),

            'users' => User::select('id', 'full_name')->get(),
            'categories' => CampaignCategories::select('id', 'name')->get(),
        ];
    }


    public function store(Request $request)
    {
        $data = $request->except('_token');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/campaign', 'public');
        }
        return $this->model->create($data);
    }

    public function update(string $id, Request $request)
    {

        $campaign = $this->model->findorFail($id);

        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            if ($campaign->image && Storage::disk('public')->exists($campaign->image)) {
                Storage::disk('public')->delete($campaign->image);
            }
            $data['image'] = $request->file('image')->store('uploads/campaign', 'public');
        }


        $campaign->update($data);

        return $campaign;
    }

    public function delete(string $id)
    {
        $campaign = $this->model->findorFail($id);
        if (!$campaign) {
            return ['error' => 'Campaign not found.'];
        }

        $campaign->delete();

        return ['success' => true];
    }
}
