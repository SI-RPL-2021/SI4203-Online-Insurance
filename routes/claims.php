<?php

use App\Http\Controllers\ClaimController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClaimController::class, 'home'])->name("claim.home");
Route::get('/{id}', [ClaimController::class, 'detail'])->name("claim.detail");
Route::post('/', [ClaimController::class, 'create'])->name("claim.create");
Route::delete('/{id}', [ClaimController::class, 'delete'])->name("claim.delete");
Route::put('/{id}', [ClaimController::class, 'update'])->name("claim.update");
