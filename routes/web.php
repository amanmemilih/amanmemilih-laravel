<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.store');

Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/blogs', BlogController::class);
});

// Route::resource('/admins', AdminController::class)->middleware('can:admin');
// Route::resource('/permissions', PermissionController::class);
// Route::resource('/roles', RoleController::class);
