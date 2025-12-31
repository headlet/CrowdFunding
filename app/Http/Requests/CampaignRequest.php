<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CampaignRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $campaignId = request()->input('id') ?? request()->segment(2) ?? null;

        return [
            'user_id'           => 'required|integer|exists:users,id',
            'category_id'       => 'required|integer|exists:campaign_categories,id',
            'title'             => 'required|string|max:255',
            'slug'              => 'required|string|max:255|unique:campaigns,slug,' . $campaignId,
            'short_description' => 'required|string|max:500',
            'description'       => 'required|string',
            'goal_amount'       => 'required|numeric|min:0',
            'raised_amount'     => 'nullable|numeric|min:0',
            'start_date'        => 'required|date|after:yesterday',
            'end_date'          => 'required|date|after_or_equal:start_date',
            'country'           => 'required|string|max:100',
            'address'           => 'required|string|max:255',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'            => 'required|in:active,inactive',
            'is_featured'       => 'nullable|boolean',
        ];
    }
}
