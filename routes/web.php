<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\public\HomeController;
use App\Http\Controllers\system\BlogCategoryController;
use App\Http\Controllers\system\BlogController;
use App\Http\Controllers\system\CampaignCategoryController;
use App\Http\Controllers\system\CampaignController;
use App\Http\Controllers\system\DonationController;
use App\Http\Controllers\system\GalleryController;
use App\Http\Controllers\system\TeamController;

$pages = [
    'about',
    'gallery',
    'contact',
    'team-details',//
    'add-team',//
    'faq',
    'testimonial',
    'blog',//
    'blog-detail'//
];
foreach ($pages as $page) {
    Route::view("/{$page}", "frontend.{$page}")->name($page);
}
// User Interface
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/campaign-details/{campaign}', 'campaign_details')->name('campaign-details');
    Route::get('/donation-now/{campaign}', 'donation')->name('donate-now')->middleware('auth');
    Route::get('/all-campaigns', 'campaign')->name('campaign');
    Route::get('/teams', 'team')->name('team');
});

Route::controller(DonationController::class)->group(function () {
    Route::post('/donation-now', 'store')->name('donation.store');
    Route::get('/donation-success', 'success')->name('donation.success');
    Route::get('/donation-cancel', 'cancel')->name('donation.cancel');
});

//Auth login register....
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

    Route::view('/', 'backend.system.dashboard')->name('dashboard');
    Route::resource('campaigns', CampaignController::class)->except(['show']);
    Route::resource('campaign-category', CampaignCategoryController::class)->except(['show']);
    Route::resource('donation', DonationController::class)->except(['show']);
    Route::resource('team', TeamController::class)->except(['show']);
    Route::resource('blog', BlogController::class)->except(['show']);
    Route::resource('blog-category', BlogCategoryController::class)->except(['show']);
    Route::resource('gallery', GalleryController::class)->except('show');
});
