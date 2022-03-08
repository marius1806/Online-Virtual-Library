<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'sections.home')->name('index');

Route::view('aboutMe', 'sections.about')->name('about');

Route::view('news', 'sections.news')->name('news');

Route::middleware('auth')->prefix('search')->group(function () {

    Route::get('', [TagController::class, 'getSearchTags'])->name('search');

    Route::prefix('{name}')->group(function () {

        Route::get('', [TagController::class, 'accessCategoryOfBooks'])->name('getBooks');

        Route::get('{title}', [BookController::class, 'accessBook'])->name('accessBook');

        Route::post('_{title}', [BookController::class, 'borrowBook'])->name('borrowBook');

        Route::post('._{title}', [BookController::class, 'postComment'])->name('postComment');

        Route::post('{title}/{id}', [BookController::class, 'deleteComment'])->name('deleteComment');
    });
});

Route::middleware('auth')->prefix('borrowedBooks')->group(function () {

    Route::get('', [BookController::class, 'myBooks'])->name('borrowedBooks');

    Route::get('{title}', [BookController::class, 'readBook'])->name('readBook');

    Route::post('{title}', [BookController::class, 'returnBook'])->name('returnBook');
});

Auth::routes();