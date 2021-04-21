<?php

use App\Http\Controllers\PolicyController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
	Route::post('/', [PolicyController::class, 'create'])->name("policy.create");
	Route::get('/delete/{id}', [PolicyController::class, 'delete'])->name("policy.delete");
	Route::post('/{id}', [PolicyController::class, 'update'])->name("policy.update");
});

Route::get('/', [PolicyController::class, 'home'])->name("policy.home");
Route::get('/{id}', [PolicyController::class, 'detail'])->name("policy.detail");
