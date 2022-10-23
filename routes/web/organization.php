<?php

use App\Http\Controllers\Organization\Auth\LoginController;
use App\Http\Controllers\Organization\Auth\RegisterController;
use App\Http\Controllers\Organization\OrganizationController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [RegisterController::class, 'register'])->name('organization.register');

Route::get('/login',[LoginController::class,'showLoginForm'])->name('organization.login-view');
Route::post('/login',[LoginController::class,'login'])->name('organization.login');

Route::middleware(['auth:organization'])->group(function (){
    Route::delete('logout',[LoginController::class,'logout'])->name('organization.logout');

    Route::get('',[OrganizationController::class,'index'])->name('organization.login-view');
    Route::get('dashboard',[OrganizationController::class,'index'])->name('organization.login-view');
});
