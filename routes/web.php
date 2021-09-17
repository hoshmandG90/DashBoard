<?php

use Illuminate\Support\Facades\Route;

// Registeration Page




Route::get('/',App\Http\Controllers\Registeration::class)->name('register');

Route::get('/register',App\Http\Controllers\Registeration::class)->name('register');


Route::get('/login',App\Http\Controllers\admin\Login::class)->name('login');

// Home Page
Route::get('/Dashboard',App\Http\Controllers\Admin\Dashboard::class)->name('Dashboard')->middleware('auth');

// Logout Page
Route::get('/logout',App\Http\Controllers\Admin\Logout::class)->name('logout');


//Profile Page

Route::get('/profile',App\Http\Controllers\Profile::class)->name('profile');






Route::get('/contact',App\Http\Controllers\HackSession::class)->name('contact');

