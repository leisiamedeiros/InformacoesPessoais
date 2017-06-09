<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

    protected $fillable = [
      'nome', 'tipo', 'numero', 'complemento', 'bairro', 'localidade',
      'uf', 'cep',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
