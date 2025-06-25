<?php

use Illuminate\Support\Facades\Route;

// Admin Dashboard Routes
Route::prefix('admin')->group(function() {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Meal Plans
    Route::prefix('meal-plans')->group(function() {
        Route::get('/', function () {
            return view('admin.meal-plans.index');
        })->name('admin.meal-plans.index');
        
        Route::get('/create', function () {
            return view('admin.meal-plans.create');
        })->name('admin.meal-plans.create');
        
        Route::post('/', function () {
            // In a real app, this would handle form submission
            return redirect()->route('admin.meal-plans.index')
                ->with('success', 'Meal plan created successfully!');
        })->name('admin.meal-plans.store');
        
        Route::get('/{id}/edit', function ($id) {
            return view('admin.meal-plans.edit', ['id' => $id]);
        })->name('admin.meal-plans.edit');
        
        Route::put('/{id}', function ($id) {
            // In a real app, this would handle form submission
            return redirect()->route('admin.meal-plans.index')
                ->with('success', 'Meal plan updated successfully!');
        })->name('admin.meal-plans.update');
        
        Route::delete('/{id}', function ($id) {
            // In a real app, this would delete the record
            return redirect()->route('admin.meal-plans.index')
                ->with('success', 'Meal plan deleted successfully!');
        })->name('admin.meal-plans.destroy');
    });

    // Subscriptions
    Route::prefix('subscriptions')->group(function() {
        Route::get('/', function () {
            return view('admin.subscriptions.index');
        })->name('admin.subscriptions.index');
        
        Route::get('/create', function () {
            return view('admin.subscriptions.create');
        })->name('admin.subscriptions.create');
        
        Route::post('/', function () {
            return redirect()->route('admin.subscriptions.index')
                ->with('success', 'Subscription created successfully!');
        })->name('admin.subscriptions.store');
        
        Route::get('/{id}/edit', function ($id) {
            return view('admin.subscriptions.edit', ['id' => $id]);
        })->name('admin.subscriptions.edit');
        
        Route::put('/{id}', function ($id) {
            return redirect()->route('admin.subscriptions.index')
                ->with('success', 'Subscription updated successfully!');
        })->name('admin.subscriptions.update');
        
        Route::delete('/{id}', function ($id) {
            return redirect()->route('admin.subscriptions.index')
                ->with('success', 'Subscription deleted successfully!');
        })->name('admin.subscriptions.destroy');
    });

    // Users
    Route::prefix('users')->group(function() {
        Route::get('/', function () {
            return view('admin.users.index');
        })->name('admin.users.index');
        
        Route::get('/{id}/edit', function ($id) {
            return view('admin.users.edit', ['id' => $id]);
        })->name('admin.users.edit');
        
        Route::put('/{id}', function ($id) {
            return redirect()->route('admin.users.index')
                ->with('success', 'User updated successfully!');
        })->name('admin.users.update');
    });
});

// Frontend Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/subscription', function () {
    return view('subscription');
})->name('subscription');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');