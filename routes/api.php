<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryThreadsController;
use App\Http\Controllers\ThreadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Categories
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{category}', [CategoryController::class, 'show']);
Route::post('categories', [CategoryController::class, 'store']);
Route::put('categories/{category}', [CategoryController::class, 'update']);
Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

// Category Threads
Route::get('categories/{category}/threads', [CategoryThreadsController::class, 'index']);
Route::post('categories/{category}/threads', [CategoryThreadsController::class, 'store']);

// Threads
Route::get('threads', [ThreadController::class, 'index']);
