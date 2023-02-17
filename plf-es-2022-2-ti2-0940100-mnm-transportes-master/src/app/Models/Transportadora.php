<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Transportadora extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nome_transportadora',
        'cnpj',
        'telefone',
        'email_transportadora',
        'senha',
    ];

    protected $hidden = [
        'senha'
    ];

    public function entregadores(): HasMany
    {
        return $this->hasMany(Entregador::class, 'transportadora_id', 'id');
    }

    public function servicos(): HasMany
    {
        return $this->hasMany(Servico::class, 'transportadora_id', 'id');
    }

    public function avaliacoes()
    {
        $servicos = $this->servicos()->get();
        $avaliacoes = [];
        $servicos->each(function (Servico $servico) use (&$avaliacoes) {
            if(isset($servico->avaliacoes()->first()->nota)) {
                $avaliacao = $servico->avaliacoes()->first();
                $avaliacoes[] = (object) [
                    'servico_id' => $avaliacao->id,
                    'nota' => $avaliacao->nota,
                    'comentario' => $avaliacao->comentario
                ];
            }
        });
        return $avaliacoes;
    }

}
