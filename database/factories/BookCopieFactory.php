<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\BookStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookCopie>
 */
class BookCopieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //$bookIds = Book::pluck('id')->toArray(); //pluck para obtener todos los valores de una columna de una tabla
        //'book_id' => $this->faker->unique()->randomElement($bookIds), //$this para acceder a los metodos y propiedades
        return [
            'book_id' => function () {    //Codigo modificado no Probado
                $book = Book::inRandomOrder()->first();// Obtener un autor existente aleatoriamente
                return $book->id;
            },
            'status_id' => 1 ,

        ];
    }
}
