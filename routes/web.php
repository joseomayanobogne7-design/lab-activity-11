<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;

// 1. Root address papunta sa HomeController (Front Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Teachers routes
Route::get('/teachers/featured', [TeacherController::class, 'featured'])->name('teachers.featured');
Route::resource('/teachers', TeacherController::class);

// 2. BOOKS ROUTES: ILAGAY MUNA ANG MGA CUSTOM ROUTES BAGO ANG RESOURCE ROUTE
Route::get('/books/featured', [BookController::class, 'featured'])->name('books.featured');

// LA6 Part C: Redirect old filter route to new query string version
Route::get('/books/filter/{genre}', function ($genre) {
    return redirect()->route('books.index', ['genre' => $genre]);
})->name('books.filter');

// 3. Resource Route para sa Books (Huli itong ilagay para hindi maunahan ang 'featured')
Route::resource('books', BookController::class);