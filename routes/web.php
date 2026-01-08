<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\public\HomeController;
use App\Http\Controllers\system\CampaignCategoryController;
use App\Http\Controllers\system\CampaignController;
use App\Http\Controllers\system\DonationController;


$pages = [
    'about',
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/campaign-details/{campaign}', 'show')->name('campaign-details');
    Route::get('/donation-now/{campaign}', 'donation')->name('donate-now')->middleware('auth');
    Route::get('/all-campaigns', 'campaign')->name('campaign');
});

Route::controller(DonationController::class)->group(function () {
    Route::post('/donation-now', 'store')->name('donation.store');
    Route::get('/donation-success', 'success')->name('donation.success');
    Route::get('/donation-cancel', 'cancel')->name('donation.cancel');
});

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

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::view('admin', 'backend.system.dashboard')->name('dashboard');
    Route::resource('campaigns', CampaignController::class)->except(['show']);
    Route::resource('campaign-category', CampaignCategoryController::class)->except(['show']);
    Route::resource('donation', DonationController::class)->except(['show']);
});
