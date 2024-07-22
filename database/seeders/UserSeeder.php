<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->admin()->count(5)->create();
        User::factory()->user()->count(10)->create();
    }
}
