<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return view('backend.public.auth.login');
    }

    public function login_auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (!User::where('email', $request->email)->exists()) {
            return back()->withErrors([
                'email' => 'Email does not exist.'
            ])->withInput($request->only('email'));
        }

        // Attempt login
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'password' => 'Incorrect password.'
            ])->withInput($request->only('email'));
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Login successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('index')->with('success', 'Logout Successful');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => 'Unable to logout']);
        }
    }
}
