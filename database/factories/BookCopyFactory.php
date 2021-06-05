<?php

namespace Database\Factories;

use App\Models\BookCopy;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookCopyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookCopy::class;

    public function definition(): array
    {
        return [
            'edition' => $this->faker->numberBetween(0, 100),
        ];
    }
}
