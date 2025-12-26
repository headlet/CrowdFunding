<?php

use Illuminate\Support\Facades\Route;

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


 Route::view("/login", "backend.public.auth.login")->name('login');
 Route::view("/register", "backend.public.auth.register")->name('register');