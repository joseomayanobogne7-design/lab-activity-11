<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Genre;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Gumawa muna ng lookup rows (Genres)
        $novel = Genre::create(['name' => 'Novel']);
        $essay = Genre::create(['name' => 'Essay']);
        $poetry = Genre::create(['name' => 'Poetry']);

        // 2. Gumawa ng mga libro gamit ang $novel->id, $essay->id, etc.
        Book::create([
            'title' => 'Noli Me Tangere',
            'genre_id' => $novel->id,
            'published_year' => 1887,
        ]);

        Book::create([
            'title' => 'El Filibusterismo',
            'genre_id' => $novel->id,
            'published_year' => 1891,
        ]);

        Book::create([
            'title' => 'A La Juventud Filipina',
            'genre_id' => $poetry->id,
            'published_year' => 1879,
        ]);

        Book::create([
            'title' => 'The Philippines a Century Hence',
            'genre_id' => $essay->id,
            'published_year' => 1890,
        ]);

        Book::create([
            'title' => 'Mi Ultimo Adios',
            'genre_id' => $poetry->id,
            'published_year' => 1896,
        ]);
    }
}