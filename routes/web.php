<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\LoginVerify;

Route::middleware(LoginVerify::class)->group(function(){
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'home')->name('home');
        Route::post('/logout', 'logout')->name('logout');
    });
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/login', 'loginCreate')->name('login_create');
    Route::post('/login', 'loginStore')->name('login_store');
});
