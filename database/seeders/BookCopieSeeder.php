<?php

namespace Database\Seeders;

use App\Models\BookCopie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookCopieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookCopie::factory(20)->create();
    }
}
