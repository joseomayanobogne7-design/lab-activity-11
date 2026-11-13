<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Genre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Gumawa muna ng mga genres kung wala pa
        $genres = ['Fiction', 'Science', 'History', 'Technology', 'Fantasy'];
        foreach ($genres as $genreName) {
            Genre::firstOrCreate(['name' => $genreName]);
        }

        // Mag-seed ng at least 20 books na nakakalat sa iba't ibang genres
        for ($i = 1; $i <= 20; $i++) {
            Book::create([
                'title' => 'Book Title ' . $i,
                'genre_id' => Genre::inRandomOrder()->first()->id,
                'published_year' => rand(2000, 2026), // Idinagdag para masagot ang required field
            ]);
        }
    }
}