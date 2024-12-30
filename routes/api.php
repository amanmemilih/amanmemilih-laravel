<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\PresidentialCandidatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentications
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'index']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/recovery-key', [AuthController::class, 'generateRecoveryKey']);
    // Forgot Password
    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
});

Route::middleware('auth:sanctum', 'verified')->group(function () {
    /// Authentications
    Route::get('/check-credentials', [AuthController::class, 'credentials']);
    Route::get('/logout', [AuthController::class, 'logout']);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // President Candidat
    Route::get('/presidential-candidats', [PresidentialCandidatController::class, 'index']);

    // Document
    Route::get('/documents', [DocumentController::class, 'index']);
    Route::post('/documents', [DocumentController::class, 'store']);
    Route::get('/documents/{document}', [DocumentController::class, 'show']);
});

// Blogs
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{blog}', [BlogController::class, 'show']);
