<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SAController;
use App\Http\Middleware\LoginVerify;
use App\Http\Controllers\RegisterController;

 

Route::middleware(LoginVerify::class)->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'home')->name('home');
        Route::post('/logout', 'logout')->name('logout');
    });
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/login', 'loginCreate')->name('login_create');
    Route::post('/login', 'loginStore')->name('login_store');
});

Route::controller(SAController::class)->group(function () {
    Route::get('/booksearch', 'booksearch')->name('book_search');
});

Route::controller(SAController::class)->group(function () {
    Route::post('/searchlist', 'searchlist')->name('search_list');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/bookregister', 'register')->name('book_register');

});

Route::controller(RegisterController::class)->group(function () {
    Route::post('/bookcheck', 'check')->name('book_check');
});

