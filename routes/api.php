<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\DocumentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentications
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'index']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/recovery-key', [AuthController::class, 'generateRecoveryKey']);
});

Route::middleware('auth:sanctum', 'verified')->group(function () {
    /// Authentications
    Route::get('/check-credentials', [AuthController::class, 'credentials']);
    Route::get('/logout', [AuthController::class, 'logout']);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Document
    Route::post('/document', [DocumentController::class, 'store']);
});

// Blogs
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{blog}', [BlogController::class, 'show']);
