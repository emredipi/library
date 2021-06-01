<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Emre',
            'surname' => 'Dipi',
            'email' => 'mail@emredipi.com',
            'password' => Hash::make('12345678a'),
        ]);

        $member = Member::create([
            'id' => $user->id,
            'birth_date' => "1997.09.06",
            'tc' => "11122233344",
        ]);

        for ($i = 0; $i < 30; $i++) {
            Member::factory()
                ->for(User::factory())
                ->create();
        }
    }
}
