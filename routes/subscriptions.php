<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SubscriptionController::class, 'home'])->name("subscriptions.home");
Route::get('/{id}', [SubscriptionController::class, 'detail'])->name("subscriptions.detail");
Route::post('/', [SubscriptionController::class, 'create'])->name("subscriptions.create");
Route::delete('/{id}', [SubscriptionController::class, 'delete'])->name("subscriptions.delete");
Route::put('/{id}', [SubscriptionController::class, 'update'])->name("subscriptions.update");