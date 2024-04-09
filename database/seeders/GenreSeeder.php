<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'Novela'],
            ['name' => 'Poesía'],
            ['name' => 'Cuento'],
            ['name' => 'Ensayo'],
            ['name' => 'Historia'],
            ['name' => 'Ciencia Ficción'],
            ['name' => 'Drama'],
            ['name' => 'Biografia'],
        ];

        foreach($genres as $genre){

            Genre::create([
                'name'=> $genre['name'],               
            ]);

        }
    }
}
