<?php

namespace Database\Factories;

use App\Models\Block;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Block::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->word()
        ];
    }
}
