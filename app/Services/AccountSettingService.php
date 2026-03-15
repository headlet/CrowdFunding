<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountSettingService extends Services
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
 
    /**
     * Get user by ID for account settings page
     */
    public function getById($id)
    {
        return [
            'user' => $this->model->findOrFail($id),
        ];
    }

    /**
     * Update profile info (name, email, phone, gender, address, image)
     */
    public function update($id, Request $request): array|User
    {
        try {
            $user = $this->model->findOrFail($id);

            $data = $request->only([
                'full_name',
                'email',
                'phone_number',
                'gender',
                'address',
            ]);

            if ($request->hasFile('image')) {
                if ($user->image && Storage::disk('public')->exists($user->image)) {
                    Storage::disk('public')->delete($user->image);
                }
                $data['image'] = $request->file('image')->store('uploads/users', 'public');
            }

            $user->update($data);

            return $user;
        } catch (\Throwable $th) {
            return ['error' => 'Failed to update profile: ' . $th->getMessage()];
        }
    }

    /**
     * Update password — verifies current password first
     */
    public function updatePassword($id, Request $request): array|bool
    {
        try {
            $user = $this->model->findOrFail($id);

            if (!Hash::check($request->current_password, $user->password)) {
                return ['error' => 'Current password is incorrect.'];
            }

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return true;
        } catch (\Throwable $th) {
            return ['error' => 'Failed to update password: ' . $th->getMessage()];
        }
    }
}