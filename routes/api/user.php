<?php

use App\Http\Controllers\Api\User\Auth\AuthController;
use App\Http\Controllers\Api\User\UserController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:user-api'])->group(function (){
    Route::get('/profile', [UserController::class, 'profile']);
});
