<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FuncionarioServico>
 */
class FuncionarioServicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'servico_id' => rand(1111, 9999),
            'funcionarios' => implode([
                $this->faker->name,
                $this->faker->name,
                $this->faker->name,
            ])
        ];
    }
}
