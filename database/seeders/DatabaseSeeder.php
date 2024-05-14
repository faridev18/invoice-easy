<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    // \App\Models\User::factory(10)->create();

    public function run(): void
    {
        User::factory()->create([
            'type_user' => 1,
        ]);

        User::factory()->create([
            'type_user' => 2,
        ]);

        User::factory()->create([
            'type_user' => 3,
        ]);

        User::factory()->create([
            'type_user' => 4,
        ]);
    }

}
