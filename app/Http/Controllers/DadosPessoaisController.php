<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DadosPessoais;
use App\Http\Requests\DadosPessoaisRequest;
use Carbon\Carbon;

class DadosPessoaisController extends Controller
{
    public function listar()
    {
        $id = Auth::id();
        $dados = DadosPessoais::where('user_id', $id)->first();
        return view('form.dados')->with('dados', $dados);
    }

    public function gravar(DadosPessoaisRequest $request)
    {
        $id = Auth::id();
        try {
          DadosPessoais::updateOrCreate(['user_id' => $id],[
            'nome_completo' => $request['nome_completo'],
            'cpf' => $request['cpf'],
            'rg' => $request['rg'],
            'nascimento' => Carbon::createFromFormat('d-m-Y',$request['nascimento'])->toDateString(),
            'genero' => $request['genero'],
            'user_id' => $id,
          ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dados')
              ->withErrors(['exception'=>'So é permitido um cadastro']);
        }
        return redirect('/dados');
    }

    public function remover($id)
    {
        DadosPessoais::destroy($id);
        return redirect('/dados');
    }

}
