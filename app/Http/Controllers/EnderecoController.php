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
        return view('home')->with('enderecos', $enderecos);
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
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/endereco/novo')
              ->withErrors(['exception'=>'O endereco informado ja existe.']);
        }
        return redirect('/home');
    }

    //mostra o endereco a ser editado
    public function editar($id)
    {
        $endereco = Endereco::find($id);
        return view('form.endereco-edit')->with('endereco', $endereco);
    }

    //atualiza o endereco
    public function atualizar(EnderecoRequest $request, $id)
    {
        $data = $request->all();
        try {
          Endereco::find($id)->update($data);
        } catch (\Illuminate\Database\QueryException $e) {
          return redirect()->route('editar', ['id' => $id])
            ->withErrors(['exception'=>'O endereco informado ja existe.']);
        }
        return redirect('/home');
    }

    //remove o endereco escolhido
    public function apagar($id)
    {
        Endereco::destroy($id);
        return redirect('/home');
    }

}
