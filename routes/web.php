<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/subscription', function () {
    return view('subscription');
});

Route::get('/contact', function () {
    return view('contact');
});

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');
