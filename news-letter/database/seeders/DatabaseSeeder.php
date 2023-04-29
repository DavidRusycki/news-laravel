<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$XkJPZGfJZ2B0F8JIHgGYz.8TJjUCQf/Ds.P2uYeRe9aOIk2RQiNcW',
            'admin' => true
        ]);
    }
}
