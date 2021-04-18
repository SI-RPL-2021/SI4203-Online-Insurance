<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth'])->group(function () {
Route::get('/', [TransactionController::class, 'home'])->name("transaction.home");
Route::get('/{id}', [TransactionController::class, 'detail'])->name("transaction.detail");
Route::post('/', [TransactionController::class, 'create'])->name("transaction.create");
// });
// Route::delete('/{id}', [TransactionController::class, 'delete'])->name("transaction.delete");
// Route::put('/{id}', [TransactionController::class, 'update'])->name("transaction.update");
