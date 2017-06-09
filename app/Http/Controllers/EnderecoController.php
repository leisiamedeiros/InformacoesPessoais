<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Endereco;
use App\Http\Requests\EnderecoRequest;

class EnderecoController extends Controller
{

    //listar todos os enderecos do usuario cadastrado
    public function listar()
    {
        $id = Auth::id();
        $enderecos = Endereco::where('user_id', $id)->get();
        return $enderecos;
    }

    //mostra formulario para cadastro
    public function criar()
    {
        return view('form.endereco');
    }

    //grava novo endereco
    public function gravar(EnderecoRequest $request)
    {
        $dados = $request->all();
        try {
          Endereco::create([
            'nome' => $dados['nome'],
            'tipo' => $dados['tipo'],
            'numero' => $dados['numero'],
            'complemento' => $dados['complemento'],
            'bairro' => $dados['bairro'],
            'localidade' => $dados['localidade'],
            'uf' => $dados['uf'],
            'cep' => $dados['cep'],
            'user_id' => Auth::id(),
          ]);
        } catch (\Exception $e) {
            return response()->json($e);
        }
        return redirect('/home');
    }

    //mostra o endereco a ser editado
    public function editar($id)
    {

    }

    //atualiza o endereco
    public function atualizar(EnderecoRequest $request, $id)
    {

    }

    //remove o endereco escolhido
    public function apagar($id)
    {

    }

}
