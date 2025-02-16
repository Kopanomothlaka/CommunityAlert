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

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    //call the welcome page
    Route::get('/pages/welcome', function () {
        return view('admin.pages.welcome');
    })->name('admin.pages.welcome');

    //call the charts page
    //call the users page
    Route::get('/pages/chats', function () {
        return view('admin.pages.chats');
    })->name('admin.pages.chats');

    //call the users page
    Route::get('/pages/users', function () {
        return view('admin.pages.users');
    })->name('admin.pages.users');

    //call the profile page
    Route::get('/pages/profile', function () {
        return view('admin.pages.profile');
    })->name('admin.pages.profile');



    // Protected routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard/pages/welcome', function () {
            return view('admin.pages.welcome');
        })->name('admin.dashboard');
    });
});
