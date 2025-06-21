<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MockupsController;
use App\Http\Controllers\ArticleController;

// Ruta principal del proyecto
Route::get('/', [MockupsController::class, 'index'])->name('mockups.home');

// Rutas adicionales para las secciones del mockup
Route::get('/design', [MockupsController::class, 'design'])->name('design');
Route::get('/resources', [MockupsController::class, 'resources'])->name('resources');
Route::get('/prototyping', [MockupsController::class, 'prototyping'])->name('prototyping');
Route::get('/code', [MockupsController::class, 'code'])->name('code');
Route::get('/ux', [MockupsController::class, 'ux'])->name('ux');

Route::get('/search', [MockupsController::class, 'search'])->name('search');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    // CRUD de artículos
    Route::resource('articles', ArticleController::class);
});

Route::get('/welcome', function () {
    return view('welcome');
});