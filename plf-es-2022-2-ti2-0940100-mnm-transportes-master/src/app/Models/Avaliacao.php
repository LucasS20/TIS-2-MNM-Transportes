<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacao';

    protected $fillable = [
        'servico_id',
        'cliente_id',
        'nota',
        'comentario'
    ];
}
