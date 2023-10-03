<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id' ,
        'profissional_id',
        'data_hora',
        'serviço_id',
        'tipo_pagamento',
        'valor'
        
    ];
}
