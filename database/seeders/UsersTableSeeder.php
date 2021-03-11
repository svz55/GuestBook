<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userCount = (int)$this->command->ask('How many users do you need ?', 25);
        $this->command->info("Creating {$userCount} users.");
        User::factory()->count(25)->create();
        $this->command->info('Users created!');
    }
}
