<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\system\CampaignController;

Route::get('/', function () {
    return view('frontend.index');
})->name('index');

$pages = [
    'about',
    'donation',
    'donation-details',
    'donate-now',
    'gallery',
    'contact',
    'team',
    'team-details',
    'add-team',
    'faq',
    'testimonial',
    'blog',
    'blog-detail'
];

foreach ($pages as $page) {
    Route::view("/{$page}", "frontend.{$page}")->name($page);
}

Route::middleware('guest')->group(function () {
    Route::get("/login", [LoginController::class, 'show'])->name('login');
    Route::post("/login", [LoginController::class, 'login_auth'])->name('login_auth');
    Route::get("register", [RegisterController::class, 'show'])->name('register');
    Route::post('register', [RegisterController::class, 'create'])->name('register_create');
    Route::get('forgot-password', [ForgotPasswordController::class, 'show'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'send'])->name('password.email');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'show'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});
Route::get('logout', [LoginController::class, 'destroy'])->name('logout');

Route::view('admin', 'backend.system.dashboard')->name('dashboard')->middleware('auth');
Route::resource('campaigns', CampaignController::class)->except(['show']);
