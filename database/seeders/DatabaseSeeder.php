<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Admin::factory()->create([
             'first_name' => 'Rani',
             'last_name' => 'Manna',
             'email' => 'ranimanna96@gmail.com',
             'password' => Hash::make("12345678r"),
             'is_active' => 1,
         ]);
    }
}
