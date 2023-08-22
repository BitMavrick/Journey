<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()
            ->count(30)
            ->hasJournals(50)
            ->create();

        User::factory()
            ->count(40)
            ->hasJournals(20)
            ->create();

        User::factory()
            ->count(20)
            ->hasJournals(1)
            ->create();

        User::factory()
            ->count(10)
            ->create();
    }
}
