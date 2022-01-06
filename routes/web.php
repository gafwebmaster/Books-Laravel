<?php

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



Auth::routes();
Route::get('/', [App\Http\Controllers\BooksController::class, 'index'])->name('home');
Route::post('/books/addBook', [App\Http\Controllers\BooksController::class, 'addABook'])->name('addABook');
Route::get('/books/list', [App\Http\Controllers\BooksController::class, 'bookList'])->name('bookList');
Route::get('/books/delete/{id}', [App\Http\Controllers\BooksController::class, 'deleteBook'])->name('deleteBook');