<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Ciudad;
use App\Models\Constructora;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->sentence(1),
            'descripcion' => fake()->sentence(5),
            'ciudad_id' => Ciudad::all()->random()->id,
            'constructora_id' => Constructora::all()->random()->id,
            'categoria_id' => Categoria::all()->random()->id,
            'direccion' => fake()->address,
            'num_habitaciones' => fake()->numberBetween(1,5),
            'num_banos' => fake()->numberBetween(1,3),
            'precio' => fake()->randomFloat(0, 0, 10000000),
        ];
    }
}
