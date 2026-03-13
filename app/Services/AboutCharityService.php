<?php

namespace App\Services;

use App\Models\AboutCharity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutCharityService extends Services
{
    public function __construct(AboutCharity $model)
    {
        parent::__construct($model);
    }

    public function getAll($perPage = 15)
    {

        return $this->model::first();
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/about_charity', 'public');
        }

        return $this->model->create($data);
    }

    public function update(string $id, Request $request)
    {
        $record = $this->model->findOrFail($id);
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            if ($record->image && Storage::disk('public')->exists($record->image)) {
                Storage::disk('public')->delete($record->image);
            }
            $data['image'] = $request->file('image')->store('uploads/about_charity', 'public');
        }

        $record->update($data);
        return $record;
    }

}