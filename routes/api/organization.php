<?php

use App\Http\Controllers\Api\Organization\Auth\AuthController;
use App\Http\Controllers\Api\Organization\UserController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:organization-api'])->group(function (){
    Route::get('/profile', [UserController::class, 'profile']);
});
