<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Librarian>
 */
class LibrarianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'role_id' => function () {    
                $role = Role::inRandomOrder()->first();// Obtener un Rol existente aleatoriamente
                return $role->id;
            },
        ];
    }
}
