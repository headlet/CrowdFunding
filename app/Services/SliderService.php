<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderService extends Services
{
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }

    public function getAll($perPage = 10)
    {
        $sort = request('sort', 'created_at');
        $direction = request('direction', 'desc');
        $search = request('search');

        $allowedSorts = ['title1', 'title2', 'order', 'created_at'];

        if (!in_array($sort, $allowedSorts)) {
            $sort = 'created_at';
        }

        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        $query = $this->model->query();

        // 🔍 Search
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title1', 'like', "%{$search}%")
                  ->orWhere('title2', 'like', "%{$search}%");
            });
        }

        return $query
            ->orderBy($sort, $direction)
            ->paginate($perPage)
            ->withQueryString();
    }

    public function getCreateData()
    {
        return [];
    }

    public function getById(string $id)
    {
        return [
            'slider' => $this->model->findOrFail($id)
        ];
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/sliders', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        return $this->model->create($data);
    }

    public function update(string $id, Request $request)
    {
        $slider = $this->model->findOrFail($id);

        $data = $request->except('_token');

        if ($request->hasFile('image')) {

            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            $data['image'] = $request->file('image')->store('uploads/sliders', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $slider->update($data);

        return $slider;
    }

    public function delete(string $id)
    {
        $slider = $this->model->findOrFail($id);

        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return ['success' => true];
    }
}