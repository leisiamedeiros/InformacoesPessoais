<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DadosPessoais;
use App\Http\Requests\DadosPessoaisRequest;

class DadosPessoaisController extends Controller
{
    public function listar()
    {
        $id = Auth::id();
        $dadosp = DadosPessoais::where('user_id', $id)->get();
        return view('form.dados')->with('dados', $dadosp);
    }

    public function gravar(DadosPessoaisRequest $request)
    {
        $id = Auth::id();
        try {
          DadosPessoais::updateOrCreate(['user_id' => $id],[
            'nome_completo' => $request['nome_completo'],
            'cpf' => $request['cpf'],
            'rg' => $request['rg'],
            'nascimento' => $request['nascimento'],
            'genero' => $request['genero'],
            'user_id' => $id,
          ]);
        } catch (\Exception $e) {
            return response()->json($e);
        }
        return redirect('/home');
    }

    public function remover($id)
    {
        DadosPessoais::destroy($id);
        return redirect('/home');
    }

}
