<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/delete/{id}', [SubscriptionController::class, 'delete'])->name("subscription.delete");
	Route::post('/{id}', [SubscriptionController::class, 'update'])->name("subscription.update");
});

Route::middleware(['auth'])->group(function () {
	Route::get('/', [SubscriptionController::class, 'home'])->name("subscription.home");
	Route::get('/{id}', [SubscriptionController::class, 'detail'])->name("subscription.detail");
	Route::post('/', [SubscriptionController::class, 'create'])->name("subscription.create");
});
