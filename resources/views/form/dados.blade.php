@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><b>{{ Auth::user()->name }}</b>, complete o cadastro
           de seus dados pessoais.</div>

        <div class="panel-body">
          @if ($errors->has('exception'))
              <div class="alert alert-danger" role="alert">
                  <strong>{{ $errors->first('exception') }}</strong>
              </div>
          @endif

          <form id="dados" action="/dados/novo" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

            <div class="col-xs-12 form-group{{ $errors->has('nome_completo') ? ' has-error' : '' }}">
              <label>Nome Completo</label>
              <input type="text" name="nome_completo" class="form-control" value="{{ !empty($dados) ? $dados->nome_completo : '' }}" required=""/>
              @if ($errors->has('nome_completo'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nome_completo') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-xs-8 form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
              <label>CPF</label>
              <input type="text" name="cpf" class="form-control" value="{{ !empty($dados) ? $dados->cpf : '' }}" required=""/>
              @if ($errors->has('cpf'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cpf') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-xs-4 form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
              <label>RG</label>
              <input type="text" name="rg" class="form-control" value="{{ !empty($dados) ? $dados->rg : '' }}" required=""/>
              @if ($errors->has('rg'))
                  <span class="help-block">
                      <strong>{{ $errors->first('rg') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-xs-4 form-group{{ $errors->has('nascimento') ? ' has-error' : '' }}">
              <label>Nascimento</label>
              <input type="text" name="nascimento" class="form-control" placeholder="Ex: 25-01-1990" required=""/>
              @if ($errors->has('nascimento'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nascimento') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-xs-8 form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
              <label>Gênero</label>
              <input type="text" name="genero" class="form-control" value="{{ !empty($dados) ? $dados->genero : '' }}" required=""/>
              @if ($errors->has('genero'))
                  <span class="help-block">
                      <strong>{{ $errors->first('genero') }}</strong>
                  </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            @if(!empty($dados))
              <a href="{{ route('dados.apagar', ['id' => $dados->id ]) }}" class="btn btn-success btn-block">
                <span class="glyphicon glyphicon-trash"></span>
              </a>
            @endif
          </form>
        </div>
      </div>
    </div>
    <a href="{{ route('home') }}" class="btn btn-success">
      <span class="glyphicon glyphicon-menu-left"></span>
    </a>
  </div>
</div>
@endsection

@section('scripts')
<script>
  window.$(document).ready(function(){
    window.$('input[name="cpf"]').mask('000.000.000-00');
    window.$('input[name="nascimento"]').mask('00-00-0000');
    @if (!empty($dados))
      var data = window.moment('{{$dados->nascimento}}').format('DD-MM-YYYY');
      window.$('input[name="nascimento"]').val(data);
    @endif
  });
  //quando submeter formulario
  window.$('#dados').submit(function(){
    var campoCPF = window.$('input[name="cpf"]');
    var cpfLimpo = campoCPF.cleanVal();
    campoCPF.val(cpfLimpo);
    return true;
  });
</script>
@endsection
