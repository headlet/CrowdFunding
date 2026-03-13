<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'about_small_text' => 'nullable|string|max:500',

            'header_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',

            'is_active' => 'nullable|boolean',
        ];
    }
}
