<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookCopy;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()
            ->has(BookCopy::factory()->count(10), 'copies')
            ->count(30)->create();
    }
}
