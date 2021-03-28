<?php

use App\Http\Controllers\PolicyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PolicyController::class, 'home'])->name("policies.home");
Route::get('/{id}', [PolicyController::class, 'detail'])->name("policies.detail");
Route::post('/', [PolicyController::class, 'create'])->name("policies.create");
Route::delete('/{id}', [PolicyController::class, 'delete'])->name("policies.delete");
Route::put('/{id}', [PolicyController::class, 'update'])->name("policies.update");