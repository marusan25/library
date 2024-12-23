<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SAController;
use App\Http\Middleware\LoginVerify;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ReviewController;



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
    Route::post('/searchlist', 'searchlist')->name('search_list');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/bookregister', 'register')->name('book_register');
    Route::get('/bookcheck', 'check')->name('book_check');
    Route::get('/bookresult', 'show')->name('show_result');
    Route::post('/bookresult', 'result')->name('book_result');
});

// 書籍一覧
Route::get('/list', [ListController::class, 'list']);

// 書籍詳細（レビュー）
Route::post('/bookdetail', [ReviewController::class, 'show'])->name('books.show');
Route::get('/bookdetail', [ReviewController::class, 'show'])->name('books.show');
Route::post('/reviewresult', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('/deletecheck', [ReviewController::class, 'destroycheck'])->name('reviews.destroycheck');
Route::post('/deleteresult', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::post('/reviewedit',[ReviewController::class,"updatecheck"])->name("reviews.updatecheck");
Route::post('/editresult',[ReviewController::class,"update"]);
Route::put('/bookdetail/{book}/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
