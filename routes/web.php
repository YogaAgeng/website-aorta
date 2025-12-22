<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

// Public Artikel Routes
Route::prefix('artikel')->name('artikel.')->group(function () {
    Route::get('/', [ArtikelController::class, 'publicIndex'])->name('index');
    Route::get('/{artikel:slug}', [ArtikelController::class, 'show'])->name('show');
});

// Public Project Routes
Route::prefix('proyek')->name('project.')->group(function () {
    Route::get('/', [ProjectController::class, 'publicIndex'])->name('index');
    Route::get('/{project:slug}', [ProjectController::class, 'show'])->name('show');
    Route::post('/{project}/donasi', [ProjectController::class, 'addDonation'])->name('donate');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])
                ->name('login');
    Route::post('login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);

    Route::get('register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
});

// Protected Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::middleware('can:manage_artikel')->prefix('admin/artikel')->name('admin.artikel.')->group(function () {
        Route::get('/', [ArtikelController::class, 'index'])->name('index');
        Route::get('/create', [ArtikelController::class, 'create'])->name('create');
        Route::post('/', [ArtikelController::class, 'store'])->name('store');
        Route::get('/{artikel}/edit', [ArtikelController::class, 'edit'])->name('edit');
        Route::put('/{artikel}', [ArtikelController::class, 'update'])->name('update');
        Route::delete('/{artikel}', [ArtikelController::class, 'destroy'])->name('destroy');
        Route::post('/{artikel}/toggle-draft', [ArtikelController::class, 'toggleDraft'])->name('toggle-draft');
    });

    Route::middleware('can:manage_project')->prefix('admin/project')->name('admin.project.')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/', [ProjectController::class, 'store'])->name('store');
        Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('edit');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
        Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');
        Route::post('/{project}/update-status', [ProjectController::class, 'updateStatus'])->name('update-status');
    });

    // Logout
    Route::post('logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});