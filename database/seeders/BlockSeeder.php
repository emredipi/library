<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Block::factory()->count(30)->create();
    }
}
