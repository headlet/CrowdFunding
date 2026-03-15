<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AccountSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = Auth::id();

        return [
            'full_name'    => ['required', 'string', 'max:255'],
            'email'        => ['required', 'email', 'unique:users,email,' . $userId],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'gender'       => ['nullable', 'in:male,female,other'],
            'address'      => ['nullable', 'string', 'max:500'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Full name is required.',
            'email.required'     => 'Email address is required.',
            'email.unique'       => 'This email is already taken.',
            'image.image'        => 'Profile picture must be an image.',
            'image.max'          => 'Profile picture must not exceed 2MB.',
        ];
    }
}