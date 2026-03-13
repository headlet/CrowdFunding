<?php

namespace App\Services;

use App\Models\About_us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutService extends Services
{
    public function __construct(About_us $model)
    {
        parent::__construct($model);
    }

    function getAll($pagination = 10)
    {
        return $this->model::first();
    }


    public function store(Request $request)
    {
        $data = $request->except('_token');

        // Background Image
        if ($request->hasFile('bg_image')) {
            $data['bg_image'] = $request->file('bg_image')->store('uploads/about', 'public');
        }

        // About Image
        if ($request->hasFile('about_image')) {
            $data['about_image'] = $request->file('about_image')->store('uploads/about', 'public');
        }

        return $this->model->create($data);
    }

    public function update(string $id, Request $request)
    {
        $about = $this->model->findOrFail($id);

        $data = $request->except('_token', '_method');

        // Background Image
        if ($request->hasFile('bg_image')) {

            if ($about->bg_image && Storage::disk('public')->exists($about->bg_image)) {
                Storage::disk('public')->delete($about->bg_image);
            }

            $data['bg_image'] = $request->file('bg_image')->store('uploads/about', 'public');
        }

        // About Image
        if ($request->hasFile('about_image')) {

            if ($about->about_image && Storage::disk('public')->exists($about->about_image)) {
                Storage::disk('public')->delete($about->about_image);
            }

            $data['about_image'] = $request->file('about_image')->store('uploads/about', 'public');
        }

        $about->update($data);

        return back()->with('success', 'About updated successfully');
    }
}
