<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servico>
 */
class ServicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = ['pending', 'paid'];

        return [
            'cliente_id' => $this->faker->randomNumber(4),
            'transportadora_id' => $this->faker->randomNumber(4),
            'endereco_retirada' => $this->faker->address,
            'endereco_entrega' => $this->faker->address,
            'data' => Carbon::now(),
            'valor_proposta' => number_format((float) $this->faker->randomFloat(), 2, ',', '.'),
            'valor_final' => number_format((float) $this->faker->randomFloat(), 2, ',', '.'),
            'quantidade_itens' => $this->faker->randomNumber(2),
            'data_servico_pago' => Carbon::create($this->faker->year, rand(1, 6), rand(1, 15), rand(1, 24), rand(1, 60), rand(1, 60)),
            'data_servico_finalizado' => Carbon::create($this->faker->year, rand(6, 12), rand(15, 30), rand(1, 24), rand(1, 60), rand(1, 60)),
            'status_pagamento' => $status[array_rand($status)],
            'servico_completo' => $this->faker->boolean,
        ];
    }
}
