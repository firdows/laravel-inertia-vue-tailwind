<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin',
            'password' => '1234',
            'is_admin'=>true,
        ]);

        User::factory()->create([
            'name' => 'Test test',
            'email' => 'test@test',
            'password' => '1234',
            'is_admin'=>false,
        ]);

        \App\Models\Listing::factory(20)->create([
            'by_user_id'=>1
        ]);
        \App\Models\Listing::factory(10)->create([
            'by_user_id'=>2
        ]);
        //php artisan db:seed
    }
}
