<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Avaliacao;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Transportadora;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cliente::factory(6)->create();
        $transportadoras = Transportadora::factory(6)->create();

        $transportadoras->each(function (Transportadora $transportadora) {
            $servico = Servico::factory()->create([
                'transportadora_id' => $transportadora->id
            ]);

            Avaliacao::factory()->create([
                'servico_id' => $servico->id
            ]);
        });
    }
}
