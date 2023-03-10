<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregador extends Model
{
    use HasFactory;

    protected $table = "entregadores";

    protected $fillable = [
        'transportadora_id',
        'nome',
    ];
}
