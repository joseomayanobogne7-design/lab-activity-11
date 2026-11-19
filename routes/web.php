<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// =========================================================================
// 1. HOME ROUTE
// =========================================================================
// Route for the main front page and /home alias
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

// =========================================================================
// 2. AUTHENTICATION ROUTES (REGISTER, LOGIN, LOGOUT)
// =========================================================================
// Display registration form and store a new user account
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Display login form, authenticate user, and handle logout
// Note: The GET login route must be named exactly 'login' for auth middleware
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// =========================================================================
// 3. TEACHERS ROUTES
// =========================================================================
// Custom route for featured teachers placed before the resource route
Route::get('/teachers/featured', [TeacherController::class, 'featured'])->name('teachers.featured');
Route::resource('/teachers', TeacherController::class);

// =========================================================================
// 4. BOOKS ROUTES
// =========================================================================
// Custom route for featured books placed before the resource route
Route::get('/books/featured', [BookController::class, 'featured'])->name('books.featured');

// Redirect legacy genre filter URL to the query string index route
Route::get('/books/filter/{genre}', function ($genre) {
    return redirect()->route('books.index', ['genre' => $genre]);
})->name('books.filter');

// Resource route for standard Book CRUD operations (index, create, store, show, edit, update, destroy)
Route::resource('books', BookController::class);