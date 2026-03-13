<?php

namespace App\Services;

use App\Models\SuccessStory;
use Illuminate\Support\Facades\Storage;

class SuccessStoryService extends Services
{
    public function __construct(SuccessStory $model)
    {
        parent::__construct($model);
    }

    public function getAll($pagination = 10)
    {
        return $this->model->first();
    }

    public function store($request)
    {
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('success_stories', 'public');
        }

        $this->model->create($data);

        return true;
    }

    public function update($id, $request)
    {
        $story = $this->model->findOrFail($id);

        $data = $request->except('_token', '_method');

        if ($request->hasFile('image')) {
            if ($story->image) {
                Storage::disk('public')->delete($story->image);
            }
            $data['image'] = $request->file('image')->store('success_stories', 'public');
        }

        $story->update($data);

        return true;
    }
}