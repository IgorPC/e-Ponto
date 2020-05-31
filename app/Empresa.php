<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome',	'email', 'status', 'celular', 'rua', 'numero', 'bairro', 'cidade', 'pais', 'user_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
