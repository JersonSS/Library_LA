<?php

namespace Database\Factories;

use App\Models\BookCopie;
use App\Models\Librarian;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $availableCopies = BookCopie::where('status_id', 1)->pluck('id')->toArray(); //Agarrar lo id 1 disponibles de abla
        
        return [
            'book_copies_id' => function () use ($availableCopies) {
                $copieId = $this->faker->unique()->randomElement($availableCopies);
                
                // Cambio de estado para la copia
                $bookCopie = BookCopie::find($copieId);
                $bookCopie->status_id = random_int(2,3); // 2 o 3 para "Prestado" o "Reservado"
                $bookCopie->save();
                
                return $copieId;
            },
            'user_id' => function () {    
                $user = User::inRandomOrder()->first();// Obtener un usuario aleatoriamente
                return $user->id;
            },
            'librarian_id' => function () {    
                $librarian = Librarian::inRandomOrder()->first();// Obtener un Rol aleatoriamente
                return $librarian->id;
            },
            'loan_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
            'return_at' =>$this->faker->dateTimeBetween('now', '+5 months'),
        ];
    }
}
