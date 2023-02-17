<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'transportadora_id',
        'endereco_retirada',
        'endereco_entrega',
        'data',
        'valor_proposta',
        'valor_final',
        'quantidade_itens',
        'servico_completo',
        'status_pagamento',
        'data_servico_pago',
        'data_servico_finalizado'
    ];

    public function avaliacoes()
    {
        return $this->hasOne(Avaliacao::class, 'servico_id', 'id');
    }

    public function transportadora()
    {
        return $this->hasOne(Transportadora::class, 'id', 'transportadora_id')->first();
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id')->first();
    }

    public function orcamentos()
    {
        return $this->hasMany(Orcamento::class, 'servico_id', 'id');
    }

    public function entregadores()
    {
        $funcionariosServico = $this->hasOne(FuncionarioServico::class, 'servico_id', 'id')
            ->latest()->first();

        if ($funcionariosServico) {
            $funcionariosIds = explode(',', $funcionariosServico->funcionarios);

            $nomes = [];
            foreach ($funcionariosIds as $id) {
                $nomes[] = Entregador::where('id', $id)->first()->nome;
            }

            return $nomes;
        }

        return [];
    }
}
