<?php

use Laravel\Passport\Http\Controllers\AccessTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/oauth/token', [AccessTokenController::class, 'issueToken'])
    ->middleware(['throttle']);

Route::post('/login', [AuthController::class, 'Login']);
Route::post('/register', [AuthController::class, 'storeUser']);
Route::post('/logout', [AuthController::class, 'Logout']);

