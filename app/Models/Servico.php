<?php

namespace App\Models;

use App\Http\Requests\ServicoFormRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

       protected $fillable = [
            'nome' ,
            'descricao',
            'duracao',
            'preco' 
           
        ];
}
