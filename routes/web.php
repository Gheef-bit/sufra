<?php

use App\Exports\UsersExport;
use App\Http\Controllers\homeController;
use App\Http\Controllers\fraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ExportExcelController;
use App\Http\Controllers\rrController;

Route::get('/', [UserController::class, 'index']);
Route::post('/insertOrUpdate', [UserController::class, 'insertOrUpdate']);
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/tabel', [DashboardController::class, 'tabel']);
Route::get('/dwnld_tabel', [DashboardController::class, 'dwnld_tabel']);
Route::get('/export-excel', [ExportExcelController::class, 'export']);
Route::get('/users', [rrController::class, 'index']);
Route::get('/fraa', [DashboardController::class, 'fraa']);
Route::get('/document/{user:tim}', [DocumentController::class, 'index']);
Route::get('/create-document/{user:tim}', [DocumentController::class, 'createDocument']);
Route::get('/logout', [loginController::class, 'logout']);
Route::middleware(['auth', PreventBackHistory::class])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/upload', [homeController::class, 'upload']);
    Route::post('/tambahfra', [fraController::class, 'store']);
});


