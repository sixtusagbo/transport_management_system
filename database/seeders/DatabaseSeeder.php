<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'first_name' => 'Sixtus',
            'last_name' => 'Agbo',
            'middle_name' => 'Miracle',
            'phone_number' => '07080854254',
            'type' => 1,
        ]);

        \App\Models\User::factory()->create([
            'first_name' => 'Joseph',
            'last_name' => 'Agbo',
            'middle_name' => 'Chetachi',
            'phone_number' => '+1-602-974-2248',
        ]);

        if (App::environment('local')) {
            \App\Models\User::factory(4)->create();
            \App\Models\Driver::factory(4)->create();
        }
    }
}
