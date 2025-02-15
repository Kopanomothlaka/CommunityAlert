<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlertController;

Route::get('/', function () {
    return view('admin.login');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    //call the welcome page
    Route::get('/pages/welcome', function () {
        return view('admin.pages.welcome');
    })->name('admin.pages.welcome');


    // Protected routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard/pages/welcome', function () {
            return view('admin.pages.welcome');
        })->name('admin.dashboard');
    });
});
