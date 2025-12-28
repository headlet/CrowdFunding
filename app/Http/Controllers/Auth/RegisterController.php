<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class RegisterController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return view('backend.public.auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validation = $request->validate([
            'full_name' => 'required|string',
            'email'     => 'required|email',
        ]);
        $validation['password'] = uniqid();
        $validation['role_id'] = 2;
        try {
            DB::beginTransaction();
            $response = User::create($validation);

            if ($response) {
                Password::sendResetLink(['email' => $validation['email']]);
            }
            DB::commit();
            return view('backend.public.auth.login')->with('success', 'Success. Please check your email...');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('register')->withErrors(['error' => 'Something went wrong. Please try again later.'. $th]);
        }
    }

   
}
