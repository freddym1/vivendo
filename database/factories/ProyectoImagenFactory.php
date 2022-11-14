<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProyectoImagen>
 */
class ProyectoImagenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'proyecto_id' => Proyecto::all()->random()->id,
            'archivo' => fake()->imageUrl(40,40),
        ];
    }
}
