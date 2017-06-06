<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DadosPessoais extends Model
{
    //especificar tabela associada ao modelo
    protected $table = 'dados_pessoais';

    //permitir atributos atrobuidos em massa create
    protected $fillable = [
        'nome_completo', 'cpf', 'rg', 'nascimento', 'genero',
    ];

    //relacionamento pertence a usuario
    public function user()
    {
        $this->belongsTo('App\User');
    }

}
