<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'home'])->name("dashboard.home");
Route::get('/claims', [DashboardController::class, 'claims'])->name("dashboard.claims");
Route::get('/policies', [DashboardController::class, 'policies'])->name("dashboard.policies");
Route::get('/subscriptions', [DashboardController::class, 'subscriptions'])->name("dashboard.subscriptions");


