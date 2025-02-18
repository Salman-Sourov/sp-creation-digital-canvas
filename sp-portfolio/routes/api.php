<?php

use Laravel\Passport\Http\Controllers\AccessTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::post('/oauth/token', [AccessTokenController::class, 'issueToken'])
    ->middleware(['throttle']);


//Authentication

Route::post('/login', [AuthController::class, 'Login']);
Route::post('/register', [AuthController::class, 'storeUser']);
Route::post('/logout', [AuthController::class, 'Logout']);

//Home Section

Route::post('/store-home', [HomeController::class, 'storeHome']);

Route::get('/get-home', [HomeController::class, 'getHome']);




