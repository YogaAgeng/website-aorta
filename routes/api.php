<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});

// Dashboard API routes (require authentication via web session)
Route::middleware(['web', 'auth'])->prefix('dashboard')->group(function () {
    Route::get('/stats', [DashboardController::class, 'stats']);
    Route::get('/projects', [DashboardController::class, 'projects']);
    Route::get('/articles', [DashboardController::class, 'articles']);
    Route::post('/projects', [DashboardController::class, 'storeProject']);
    Route::put('/projects/{id}', [DashboardController::class, 'updateProject']);
    Route::delete('/projects/{id}', [DashboardController::class, 'deleteProject']);
    Route::post('/articles', [DashboardController::class, 'storeArticle']);
    Route::put('/articles/{id}', [DashboardController::class, 'updateArticle']);
    Route::delete('/articles/{id}', [DashboardController::class, 'deleteArticle']);
});
