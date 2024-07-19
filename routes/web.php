<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\fraController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PreventBackHistory;

Route::get('/', [UserController::class, 'index']);
Route::post('/insertOrUpdate', [UserController::class, 'insertOrUpdate']);
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'logout']);
Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/upload', [homeController::class, 'upload']);
    Route::post('/tambahfra', [fraController::class, 'store']);
});
