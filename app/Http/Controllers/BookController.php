<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('genre');

        // Optional: Filter by genre if provided
        if ($request->has('genre') && !empty($request->genre)) {
            $query->where('genre_id', $request->genre);
        }

        // Paginate results to 5 items per page
        $books = $query->paginate(5);

        return view('books.index', compact('books'));
    }

    public function featured()
    {
        $books = Book::all();
        return view('books.featured', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required',
        ]);

        Book::create($request->all());

        // Flash success message after creating a book
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $genres = Genre::all();
        return view('books.edit', compact('book', 'genres'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());

        // Flash success message after updating a book
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        // Flash success message after deleting a book
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}