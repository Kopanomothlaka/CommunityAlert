<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('admin.login');
});

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Protected admin routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    // Logout (POST only for security)
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('/admins', [AdminController::class, 'store'])->name('admin.admins.store');



    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.pages.welcome');
    })->name('admin.dashboard');



    // Admin pages
    Route::prefix('/pages')->group(function () {
        Route::get('/welcome', function () {
            return view('admin.pages.welcome');
        })->name('admin.pages.welcome');

        Route::get('/chats', function () {
            return view('admin.pages.chats');
        })->name('admin.pages.chats');



        Route::get('/alerts', function () {
            return view('admin.pages.alerts');
        })->name('admin.pages.alerts');



        Route::get('/jobs', function () {
            return view('admin.pages.jobs');
        })->name('admin.pages.jobs');

        Route::get('/reports', function () {
            return view('admin.pages.reports');
        })->name('admin.pages.reports');


        // Profile routes
        Route::get('/profile', [AdminController::class, 'adminProfile'])->name('admin.pages.profile');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/profile/update-password', [AdminController::class, 'updatePassword'])->name('admin.profile.update-password');

        // Admin management routes
        Route::get('/register', [AdminController::class, 'index'])->name('admin.admins.index');
        Route::post('/register', [AdminController::class, 'store'])->name('admin.admins.store');
        Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admin.admins.update');
        Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admin.admins.destroy');

        Route::get('/register', [AdminController::class, 'index'])->name('admin.pages.register');

        // User management routes

        Route::get('/users', [UserController::class, 'index'])->name('admin.pages.users');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        //Admin create meeting routes
        // Meeting management routes
        Route::get('/meeting', [MeetingController::class, 'index'])->name('admin.pages.meeting');
        Route::post('/meeting', [MeetingController::class, 'store'])->name('admin.meetings.store');
        Route::put('/meeting/{meeting}', [MeetingController::class, 'update'])->name('admin.meetings.update');
        Route::delete('/meeting/{meeting}', [MeetingController::class, 'destroy'])->name('admin.meetings.destroy');
    });




});
