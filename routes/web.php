<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/task', [TaskController::class, 'store']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::delete('/task/{task}', [TaskController::class, 'destroy']);
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// middleware//
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'create']);
});
