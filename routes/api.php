<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PublicController;
use App\Http\Controllers\API\Publisher\PostController;
use App\Http\Controllers\API\Publisher\CategoryController;

// Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public Routes
Route::get('/posts', [PublicController::class, 'posts']);
Route::get('/posts/{slug}', [PublicController::class, 'post']);
Route::get('/categories', [PublicController::class, 'categories']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Publisher Routes
    Route::middleware('role:publisher')->prefix('publisher')->group(function () {
        Route::apiResource('posts', PostController::class);
        Route::apiResource('categories', CategoryController::class);
    });
});
