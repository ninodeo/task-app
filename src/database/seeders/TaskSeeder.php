<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop through each existing user
        User::all()->each(function ($user) {
            // Create 10 tasks for each user
            Task::factory()->count(25)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
