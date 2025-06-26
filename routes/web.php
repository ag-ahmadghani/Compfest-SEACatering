<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Admin Dashboard Routes
Route::prefix('dashboard')->middleware('auth')->group(function() {
    // Dashboard
    Route::get('/', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');

    
    // Subscriptions - Using SubscriptionController
    Route::prefix('subscriptions')->controller(SubscriptionController::class)->group(function() {
        Route::get('/', 'index')->name('dashboard.subscriptions.index');
        Route::patch('/{subscription}/cancel', 'cancel')->name('dashboard.subscriptions.cancel');
    });
    
    // Users
    Route::prefix('users')->controller(UserController::class)->group(function() {
        Route::get('/', 'index')->name('dashboard.users.index');
        Route::get('/{user}/edit', 'edit')->name('dashboard.users.edit');
        Route::put('/{user}', 'update')->name('dashboard.users.update');
        Route::patch('/{user}/toggle-status', 'toggleStatus')->name('dashboard.users.toggle-status');
    });
    
    Route::middleware('role:admin')->group(function () {
        Route::prefix('subscriptions')->controller(SubscriptionController::class)->group(function() {
            Route::get('/create', 'create')->name('dashboard.subscriptions.create');
            Route::post('/', 'store')->name('dashboard.subscriptions.store');
            Route::get('/{subscription}/edit', 'edit')->name('dashboard.subscriptions.edit');
            Route::put('/{subscription}', 'update')->name('dashboard.subscriptions.update');
        });
        // Meal Plans - Using MealPlanController
        Route::prefix('meal-plans')->controller(MealPlanController::class)->group(function() {
            Route::get('/', 'index')->name('dashboard.meal-plans.index');
            Route::get('/create', 'create')->name('dashboard.meal-plans.create');
            Route::post('/', 'store')->name('dashboard.meal-plans.store');
            Route::get('/{mealPlan}/edit', 'edit')->name('dashboard.meal-plans.edit');
            Route::put('/{mealPlan}', 'update')->name('dashboard.meal-plans.update');
            Route::delete('/{mealPlan}', 'destroy')->name('dashboard.meal-plans.destroy');
            Route::post('/{mealPlan}/toggle-status', 'toggleStatus')->name('dashboard.meal-plans.toggle-status');
        });
        
    });
});

// Frontend Routes
Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/menu', [MealPlanController::class, 'public_show'])->name('meal-plan.public');

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

// Authentication Routes
Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'showRegisterForm')->name('register');
        Route::post('/register', 'register');
        
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login');
    });

    Route::post('/logout', 'logout')->name('logout');
});