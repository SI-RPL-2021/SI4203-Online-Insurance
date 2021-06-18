<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

// Admin Facing Routes
Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/',[DashboardController::class, 'index'])->name('index');

    // Excluding customer-facing routes
    Route::resource('claims', ClaimController::class)->except(['store', 'show']);
    Route::resource('policies', PolicyController::class)->except(['show']);
    Route::resource('hospitals', HospitalController::class)->except(['show']);
    Route::resource('issues', IssueController::class)->except(['show', 'create']);

    Route::resources([
        'subscriptions' => SubscriptionController::class,
        'transactions' => TransactionController::class,
        'kantor' => KantorController::class,
        'agents' => AgentController::class
    ]);
});


// Public Facing Routes
Route::name('pages.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::get('/policies', [PolicyController::class, 'list'])->name('policies.list');
    Route::get('/kantor', [KantorController::class, 'list'])->name('kantor.list');
    Route::get('/hospitals', [HospitalController::class, 'list'])->name('hospitals.list');

    Route::resource('hospitals', HospitalController::class)->only(['show']);
    Route::resource('kantor', KantorController::class)->only(['show']);
    Route::resource('policies', PolicyController::class)->only(['show']);

    Route::get('/login', function () {
        return view('pages.login');
    })->name("login");

    Route::get('/register', function () {
        return view('pages.register');
    })->name("register");
});



Route::prefix('auth')->name('auth.')->group(function() {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Customer Facing Routes
Route::name('pages.')->middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    // Route::get('/claims', [ClaimController::class, 'list'])->name('claims.list');
    // Route::get('/subscriptions', [SubscriptionController::class, 'list'])->name('subscriptions.list');
    Route::get('/issues', [IssueController::class, 'list'])->name('issues.list');

    Route::resource('subscriptions', SubscriptionController::class)->only(['show', 'store']);
    Route::resource('claims', ClaimController::class)->only(['show', 'create', 'store']);

    Route::resource('transactions', TransactionController::class)->only(['show', 'store', 'update']);
    Route::resource('issues', IssueController::class)->only(['show', 'store', 'create']);
});

