<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BookStatusSeeder::class,
            AuthorSeeder::class,
            GenreSeeder::class,
            RoleSeeder::class,
            PermissionsSeeder::class,
            UserSeeder::class,
            BookSeeder::class,
            BookCopieSeeder::class,
            LibrarianSeeder::class,
            LoanSeeder::class
        ]);
    }
}
