<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Block;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->text(50),
            'isbn' => $this->faker->isbn10,
            'edition' => $this->faker->numberBetween(0, 100),
            'author_id' => Author::factory(),
            'publisher_id' => Publisher::factory(),
            'block_id' => Block::factory()
        ];
    }
}
