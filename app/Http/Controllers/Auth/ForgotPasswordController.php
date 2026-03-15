<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function show()
    {
        return view('backend.public.auth.forgot-password');
    }

    public function send(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors([
                'email' => 'Email does not exist.'
            ])->withInput($request->only('email'));
        }
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', __($status))
            : back()->withErrors(['error' => __($status)]);
    }
}
