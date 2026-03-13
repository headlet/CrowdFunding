<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'bg_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video_link' => 'nullable|url|max:255',
            'description' => 'required|string'
        ];
    }
}
