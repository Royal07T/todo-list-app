<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task; // Add Task model
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test123@gmail.com',
        ]);

        // Create tasks for the user
        Task::factory()->count(5)->create([
            'user_id' => $user->id, // Assign tasks to the created user
        ]);

        Task::create([
            'user_id' => 1,
            'title' => 'Sample Task',
            'description' => 'This is a seeded task description.',
            'completed' => false,
        ]);
    }
}
