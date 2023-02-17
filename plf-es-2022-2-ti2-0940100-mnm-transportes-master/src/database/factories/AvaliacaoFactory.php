<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avaliacao>
 */
class AvaliacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'servico_id' => $this->faker->randomNumber(4),
            'cliente_id' => $this->faker->randomNumber(4),
            'nota' => $this->faker->numberBetween(0, 5),
            'comentario' => $this->faker->text(120)
        ];
    }
}
