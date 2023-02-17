<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'senha',
    ];

    protected $hidden = [
        'senha'
    ];

    public function servicos(): HasMany
    {
        return $this->hasMany(Servico::class, 'cliente_id', 'id');
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class, 'cliente_id', 'id');
    }
}
