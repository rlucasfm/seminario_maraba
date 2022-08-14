<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricoes';
    protected $fillable = [
        'nome',
        'sexo',
        'cpf',
        'nascimento',
        'igreja',
        'nome_pastor',
        'pago',
        'checkin'
    ];
    use HasFactory;
}
