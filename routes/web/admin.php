<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;

Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login-view');
Route::post('/login',[LoginController::class,'login'])->name('admin.login');


Route::middleware(['auth:admin'])->group(function (){
    Route::delete('logout',[LoginController::class,'logout'])->name('admin.logout');
    Route::get('',[DashboardController::class,'index'])->name('admin.login-view');
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.login-view');
});
