<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

