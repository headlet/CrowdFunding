<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        $validation = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($validation, $request->boolean('remember'))) {
            $request->session()->regenerate();
           return redirect()->route('dashboard')->with('success', 'Login successful');
           
        }
        return redirect('login')->withErrors(['error' => __('Failed to login')])->withInput($request->only('email'));
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
        return back()->withErrors(['error' => $th->getMessage()]);
    }
}

}
