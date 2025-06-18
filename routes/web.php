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