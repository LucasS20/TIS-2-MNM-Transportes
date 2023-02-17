<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'transportadora_id',
        'cliente_id',
        'servico_id',
        'proposta',
        'feita_por',
        'aceita'
    ];
}
