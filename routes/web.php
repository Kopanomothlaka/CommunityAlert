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


    //call the admin register
    Route::get('/pages/register', function () {
        return view('admin.pages.register');
    })->name('admin.pages.register');

    //call the alerts page
    Route::get('/pages/alerts', function () {
        return view('admin.pages.alerts');
    })->name('admin.pages.alerts');

    //call the meeting page
    Route::get('/pages/meeting', function () {
        return view('admin.pages.meeting');
    })->name('admin.pages.meeting');

    //call the jobs page
    Route::get('/pages/jobs', function () {
        return view('admin.pages.jobs');
    })->name('admin.pages.jobs');

    //call the reports page
    Route::get('/pages/reports', function () {
        return view('admin.pages.reports');
    })->name('admin.pages.reports');






    // Protected routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard/pages/welcome', function () {
            return view('admin.pages.welcome');
        })->name('admin.dashboard');
        //call the profile page
        Route::get('/pages/profile', [AdminController::class, 'adminProfile'])->name('admin.pages.profile');

        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/profile/update-password', [AdminController::class, 'updatePassword'])->name('admin.profile.update-password');

    });
});
