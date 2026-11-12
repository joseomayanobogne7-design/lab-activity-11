<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

// Teachers routes
Route::get('/teachers/featured', [TeacherController::class, 'featured'])->name('teachers.featured');
Route::resource('/teachers', TeacherController::class);
// Books routes (Pinalitan na ang Subjects ng Books)
Route::get('/books/featured', [BookController::class, 'featured'])->name('books.featured');

// LA6 Part C: Redirect old filter route to new query string version
Route::get('/books/filter/{genre}', function ($genre) {
    return redirect()->route('books.index', ['genre' => $genre]);
})->name('books.filter');

// 🛠️ LAB ACTIVITY 11: Buong 7 routes para sa books (Walang ->only())
Route::resource('books', BookController::class);