<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('auth.login');
})->name('login');

// Authenticate with API token
Route::get('/auth/token/{token}', function ($token) {
    $personalToken = PersonalAccessToken::findToken($token);
    
    if ($personalToken && $personalToken->user) {
        Auth::login($personalToken->user);
        return redirect('/dashboard');
    }
    
    return redirect('/login')->with('error', 'Token tidak valid');
})->name('auth.token');

// Protected Routes (Authenticated Users Only)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
});
