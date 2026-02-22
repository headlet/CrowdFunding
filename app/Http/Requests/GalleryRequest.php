<?php

namespace App\Http\Requests;

class GalleryRequest
{
    public function rules(string $id = null): array
    {
        return [
            'title'       => 'required|string|max:100',
            'image'       => $id ? 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
                                 : 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'alt_text'    => 'nullable|string|max:255',
            'caption'     => 'nullable|string|max:500',
            'category_id' => 'nullable|exists:gallery_categories,id',
            'sort_order'  => 'nullable|integer|min:0',
            'featured'    => 'nullable|boolean',
            'status'      => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'  => 'Image title is required.',
            'title.max'       => 'Title may not exceed 100 characters.',
            'image.required'  => 'Please upload an image.',
            'image.image'     => 'The file must be an image.',
            'image.mimes'     => 'Accepted formats: JPG, PNG, GIF, WEBP.',
            'image.max'       => 'Image size may not exceed 2MB.',
            'category_id.exists' => 'Selected category does not exist.',
            'status.required' => 'Status is required.',
        ];
    }

    public function attributes(): array
    {
        return [
            'alt_text'    => 'alt text',
            'category_id' => 'category',
            'sort_order'  => 'sort order',
        ];
    }
}