<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    protected $fillable = [
        'user_id', 'empresa_id', 'data', 'primeira_entrada', 'primeira_saida', 'segunda_entrada',
        'segunda_saida', 'horas_trabalhadas', 'status'
    ];

    protected $dates = ['data', 'primeira_entrada', 'primeira_saida', 'segunda_entrada',
        'segunda_saida'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
