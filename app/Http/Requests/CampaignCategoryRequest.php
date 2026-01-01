<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignCategoryRequest extends FormRequest
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
        $categoriesId = request()->input('id') ?? request()->segment(2);
        return [
            'name'        => 'required|string',
            'slug'        => 'required|string|max:255|unique:campaign_categories,slug,' . $categoriesId,
            'description' => 'required|string',
            'status'      => 'required|in:0,1'
        ];
    }
}
