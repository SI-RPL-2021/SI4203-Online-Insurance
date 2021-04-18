<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'home'])->name("dashboard.home");
Route::get('/claims', [DashboardController::class, 'claims'])->name("dashboard.claims");
Route::get('/policies', [DashboardController::class, 'policies'])->name("dashboard.policies");
Route::get('/subscriptions', [DashboardController::class, 'subscriptions'])->name("dashboard.subscriptions");
Route::get('/transactions', [DashboardController::class, 'transactions'])->name("dashboard.transactions");

Route::get('/claims/{id}', [DashboardController::class, 'claimsDetail'])->name("dashboard.claims.detail");
Route::get('/policies/{id}', [DashboardController::class, 'policiesDetail'])->name("dashboard.policies.detail");
Route::get('/subscriptions/{id}', [DashboardController::class, 'subscriptionsDetail'])->name("dashboard.subscriptions.detail");
Route::get('/transactions/{id}', [DashboardController::class, 'transactionsDetail'])->name("dashboard.transactions.detail");
