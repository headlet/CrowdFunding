<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\AccountSettingRequest;
use App\Services\AccountSettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSettingController extends ResourceController
{
    protected bool $skipPermission = true;

    public function __construct(AccountSettingService $services)
    {
        parent::__construct($services);
    }

    public function viewsFolder()
    {
        return 'backend.system.account_setting';
    }

    public function getResourceNames()
    {
        return 'admin.account_setting';
    }

    public function storeValidationRequest()
    {

        return AccountSettingRequest::class;
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $response = $this->services->updatePassword(Auth::id(), $request);

            if (isset($response['error'])) {
                return redirect()->back()->withErrors(['error' => $response['error']]);
            }

            return redirect()->back()->with('success', 'Password updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong: ']);
        }
    }
}
