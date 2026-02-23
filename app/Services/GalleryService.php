<?php

namespace App\Services;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\Storage;

class GalleryService extends Services
{
    public function __construct(Gallery $model)
    {
      parent::__construct($model);
    }

    public function getAll($perPage = 15)
    {
        return $this->model::with('galleryCategory')
            ->ordered()
            ->paginate($perPage);
    }

    public function getById(string|int $id)
    {
        return $this->model::with('galleryCategory')->find($id);
    }

    public function getCreateData(): array
    {
        return [
            'categories' => GalleryCategory::active()->orderBy('name')->get(),
        ];
    }

    public function store($request): array
    {
        try {
            $data = $request->only([
                'title', 'alt_text', 'caption',
                'category_id', 'sort_order', 'status',
            ]);

            $data['featured']   = $request->boolean('featured');
            $data['status']     = $request->input('status', 1);
            $data['sort_order'] = $request->input('sort_order', 0);

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('uploads/gallery', 'public');
            }

            Gallery::create($data);

            return ['success' => true];
        } catch (\Throwable $th) {
            return ['error' => 'Could not save: ' . $th->getMessage()];
        }
    }

    public function update(string|int $id, $request): array
    {
        try {
            $gallery = Gallery::findOrFail($id);

            $data = $request->only([
                'title', 'alt_text', 'caption',
                'category_id', 'sort_order', 'status',
            ]);

            $data['featured']   = $request->boolean('featured');
            $data['status']     = $request->input('status', 1);
            $data['sort_order'] = $request->input('sort_order', 0);

            if ($request->hasFile('image')) {
                if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                    Storage::disk('public')->delete($gallery->image);
                }
                $data['image'] = $request->file('image')->store('uploads/gallery', 'public');
            }

            $gallery->update($data);

            return ['success' => true];
        } catch (\Throwable $th) {
            return ['error' => 'Could not update: ' . $th->getMessage()];
        }
    }

    public function delete(string|int $id): array
    {
        try {
            // Supports single "5" and bulk "5,6,7"
            $ids = array_filter(explode(',', (string) $id));

            Gallery::whereIn('id', $ids)->each(function ($gallery) {
                if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                    Storage::disk('public')->delete($gallery->image);
                }
                $gallery->delete();
            });

            return ['success' => true];
        } catch (\Throwable $th) {
            return ['error' => 'Could not delete: ' . $th->getMessage()];
        }
    }
}