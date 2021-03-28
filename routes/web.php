<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('claims')->group(__DIR__ . '/claims.php');
    Route::prefix('policies')->group(__DIR__ . '/policies.php');
    Route::prefix('subscriptions')->group(__DIR__ . '/subscriptions.php');
    Route::prefix('transactions')->group(__DIR__ . '/transactions.php');
});

Route::get('/', [HomeController::class, 'home'])->name('home');


Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/register', function () {
    return view('register');
})->name("register");

Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
