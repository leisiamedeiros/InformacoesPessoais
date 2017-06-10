@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ route('endereco.novo') }}" class="btn btn-primary">
     Novo Endereco
  </a>

  @if(empty($enderecos))
    <div class="alert alert-danger">
      Não existe endereco cadastrado.
    </div>
  @else
    <h1>Listagem de endereços cadastrados</h1>
    <table class="table table-striped table-bordered table-hover">
      <tr>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Numero</th>
        <th>Complemento</th>
        <th>Bairro</th>
        <th>Localidade</th>
        <th>UF</th>
        <th>CEP</th>
        <th>Ação</th>
      </tr>
      @foreach ($enderecos as $e )
        <tr>
          <td> {{ $e->nome }} </td>
          <td> {{ $e->tipo }} </td>
          <td> {{ $e->numero }} </td>
          <td> {{ $e->complemento }} </td>
          <td> {{ $e->bairro }} </td>
          <td> {{ $e->localidade }} </td>
          <td> {{ $e->uf }} </td>
          <td> {{ $e->cep }} </td>
          <td>
            <a href="{{ route('editar', ['id'=>$e->id]) }}"
              class="btn-sm btn-success"><span class="glyphicon glyphicon-edit"></span></a>
            <a href="{{ route('apagar', ['id'=>$e->id]) }}"
              class="btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
          </td>
        </tr>
      @endforeach
    </table>
  @endif

</div>
@endsection
