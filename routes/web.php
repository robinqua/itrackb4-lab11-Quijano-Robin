<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BooksController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/teachers/featured', [TeacherController::class, 'featured'])
    ->name('teachers.featured');

Route::resource('teachers', TeacherController::class)
    ->only(['index', 'show']);

Route::get('/books/featured',        [BooksController::class, 'featured'])
    ->name('books.featured');

Route::get('/books/filter/{pages?}', function ($pages = null) {
    return redirect()->route('books.index', $pages === null ? [] : ['pages' => $pages]);
})->name('books.filter');

Route::resource('books', BooksController::class);