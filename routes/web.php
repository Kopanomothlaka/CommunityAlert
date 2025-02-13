<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AlertController;

Route::get('/', function () {
    return view('login');
});
Route::get('/dashboard', function () {
    return view('alerts.create');
});
Route::post('/alerts', [AlertController::class, 'store']);
Route::apiResource('alerts', AlertController::class);
