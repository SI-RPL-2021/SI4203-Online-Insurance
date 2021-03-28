<?php

use App\Http\Controllers\SubscriptionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SubscriptionsController::class, 'home'])->name("subscriptions.home");
Route::get('/{id}', [SubscriptionsController::class, 'detail'])->name("subscriptions.detail");
Route::post('/', [SubscriptionsController::class, 'create'])->name("subscriptions.create");
Route::delete('/{id}', [SubscriptionsController::class, 'delete'])->name("subscriptions.delete");
Route::put('/{id}', [SubscriptionsController::class, 'update'])->name("subscriptions.update");