<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportadora>
 */
class TransportadoraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cnpj'=>$this->faker->address,
            'nome_transportadora'=>$this->faker->company,
            'email_transportadora'=>$this->faker->unique()->safeEmail,
            'senha'=>Hash::make('123'),
            'telefone'=>$this->faker->phoneNumber
        ];
    }
}
