<?php

namespace Database\Seeders;

use App\Models\BookStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'Disponible'],
            ['name' => 'Prestado'],
            ['name' => 'Reservado']
        ];

        foreach($statuses as $status){

            BookStatus::create([
                'name'=> $status['name'],               
            ]);

        }

    }
}
