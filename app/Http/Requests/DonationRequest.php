<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
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
            'campaign_id'   => 'required|exists:campaigns,id',
            'amount'        => 'required|numeric|min:1',
            'donor_name'    => 'required|string|max:255',
            'phone_number'  => 'nullable|string|max:20',
            'donor_email'   => 'required|email|max:255',
        ];
    }
}
