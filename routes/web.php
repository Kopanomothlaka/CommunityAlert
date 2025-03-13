<?php

use App\Http\Controllers\AdminController;
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

        Route::get('/users', function () {
            return view('admin.pages.users');
        })->name('admin.pages.users');

        Route::get('/alerts', function () {
            return view('admin.pages.alerts');
        })->name('admin.pages.alerts');

        Route::get('/meeting', function () {
            return view('admin.pages.meeting');
        })->name('admin.pages.meeting');

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

    });

    // Registration route (if needed)
    Route::get('/register', function () {
        return view('admin.pages.register');
    })->name('admin.pages.register');
});
