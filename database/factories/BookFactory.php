<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author_id' => function () {    
                $author = Author::inRandomOrder()->first();// Obtener un autor existente aleatoriamente
                return $author->id;
            },
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Book $book) {
            // Tener entre uno o dos generos libro
            $genres = Genre::inRandomOrder()->take(random_int(1, 2))->get();

            // Asignar los generos al libro
            $book->genres()->attach($genres);
        });
    }
}
