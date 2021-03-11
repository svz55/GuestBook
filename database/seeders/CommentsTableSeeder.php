<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userCount = (int)$this->command->ask('How many comments do you need ?', 500);
        $this->command->info("Creating {$userCount} comments.");
        Comment::factory()->count(500)->create();
        $this->command->info('Comments created!');
    }
}
