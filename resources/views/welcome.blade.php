@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Aplicação para cadastro de Dados Pessoais</div>
                <div class="panel-body">
                  @if(Auth::guest())
                    <p>Bem vindo! <a href="{{ route('register') }}">Registre-se</a>
                       ou faça <a href="{{ route('login') }}">Login</a> para continuar.</p>
                  @else
                  <a href="{{ route('home') }}" class="btn btn-success">
                    Lista de Enderecos
                  </a>
                  @endif
                    <h4>O código dessa aplicação está disponivel no
                      <a href="https://github.com/leisiamedeiros/InformacoesPessoais">GitHub</a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
