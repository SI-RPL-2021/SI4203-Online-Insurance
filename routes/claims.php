<?php

use App\Http\Controllers\ClaimController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClaimController::class, 'list'])->name("claim.list");
