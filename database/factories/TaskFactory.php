<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;
use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Generate 50 fake tasks
        foreach (range(1, 50) as $index) {
            $admin = User::where('role', 'admin')->inRandomOrder()->first();
            $user = User::where('role', 'user')->inRandomOrder()->first();

            Task::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'assigned_by_id' => $admin ? $admin->id : null,
                'assigned_to_id' => $user ? $user->id : null,
            ]);
        }
    }
}
