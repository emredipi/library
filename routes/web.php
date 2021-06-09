<?php

use App\Http\Controllers\{AuthorController,
    BlockController,
    BookController,
    BookCopyController,
    BorrowBookController,
    CategoryController,
    MemberController,
    PublisherController
};
use Illuminate\Support\Facades\Route;

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
Route::redirect('', '/login');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::resource('member', MemberController::class);
    Route::get('member/{member}/books', [MemberController::class, 'books'])
        ->name('member.books');
    Route::resource('author', AuthorController::class);
    Route::resource('publisher', PublisherController::class);
    Route::resource('block', BlockController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('book', BookController::class);
    Route::resource('book.book_copy', BookCopyController::class);
    Route::resource('borrow', BorrowBookController::class);
});
