<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('dashboard')->group(__DIR__ . '/dashboard.php');
    Route::prefix('claims')->group(__DIR__ . '/dashboard.php');
    Route::prefix('policies')->group(__DIR__ . '/dashboard.php');
    Route::prefix('subscriptions')->group(__DIR__ . '/dashboard.php');
    Route::prefix('dashboard')->group(__DIR__ . '/dashboard.php');
});

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/register', function () {
    return view('register');
})->name("register");

Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
