<?php

use App\Http\Controllers\ClaimController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/delete/{id}', [ClaimController::class, 'delete'])->name("claim.delete");
	Route::post('/{id}', [ClaimController::class, 'update'])->name("claim.update");
});

Route::middleware(['auth'])->group(function () {
	Route::get('/', [ClaimController::class, 'home'])->name("claim.home");
	Route::get('/{id}', [ClaimController::class, 'detail'])->name("claim.detail");
	Route::post('/', [ClaimController::class, 'create'])->name("claim.create");
});
