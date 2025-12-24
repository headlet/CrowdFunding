<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});

Route::view('/about', 'frontend.about')->name('about');
Route::view('/donation', 'frontend.donation')->name('donation');
Route::view('/donation-details', 'frontend.donation-details')->name('donation-details');