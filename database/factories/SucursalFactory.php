<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sucursal>
 */
class SucursalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sucursal' => $this->faker->randomElement(['Puente Piedra I', 'Puente Piedra II', 'Lima Centro', 'Lima Norte']),
            'departamento' => '2',
            'provincia' => '24',
            'distrito' => '213'
        ];
    }
}
