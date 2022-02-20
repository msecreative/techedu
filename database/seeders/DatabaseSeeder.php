<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Invoice;
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
            'company' => 'MseCreative',
            'phone' => '01712345678',
            'country' => 'Bangladesh',
            'password' => bcrypt('123'),
            'thumbnail' => 'https://picsum.photos/2304'
        ]);

        User::create([
            'name' => 'Test User One',
            'email' => 'test1@gmail.com',
            'company' => 'Demo Company',
            'phone' => '09696 123456',
            'country' => 'Bangladesh',
            'password' => bcrypt('123'),
            'thumbnail' => 'https://picsum.photos/1400'
        ]);

        Client::factory(10)->create();
        Task::factory(50)->create();
        Invoice::factory(20)->create();

    }
}
