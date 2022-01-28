<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Task;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sharmin Akter',
            'email' => 'sharmin.2304@gmail.com',
            'password' => bcrypt('123'),
            'thumbnail' => 'https://picsum.photos/2304'
        ]);

        Client::factory(10)->create();
        Task::factory(50)->create();
    }
}
