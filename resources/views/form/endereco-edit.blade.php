@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Editar Endereco</div>
        <div class="panel-body">
          @if ($errors->has('exception'))
              <div class="alert alert-danger" role="alert">
                  <strong>{{ $errors->first('exception') }}</strong>
              </div>
          @endif
          <form id="endereco" enctype="multipart/form-data" action="/endereco/{{ $endereco->id }}/editar" method="post">
            {!! csrf_field() !!}
            <input name="_method" type="hidden" value="PUT">

            <div class="col-xs-8 form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
              <label>CEP</label>
              <input type="text" name="cep" class="form-control" value="{{ $endereco->cep }}" required=""/>
              @if ($errors->has('cep'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cep') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-xs-4 form-group{{ $errors->has('uf') ? ' has-error' : '' }}">
              <label>UF</label>
              <input type="text" name="uf" class="form-control" value="{{ $endereco->uf }}" required=""/>
              @if ($errors->has('uf'))
                  <span class="help-block">
                      <strong>{{ $errors->first('uf') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-xs-12 form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
              <label>Nome</label>
              <input type="text" name="nome" class="form-control" value="{{ $endereco->nome }}" required=""/>
              @if ($errors->has('nome'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nome') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-xs-8 form-group{{ $errors->has('complemento') ? ' has-error' : '' }}">
              <label>Complemento</label>
              <input type="text" name="complemento" class="form-control" value="{{ $endereco->complemento }}" />
              @if ($errors->has('complemento'))
              <span class="help-block">
                <strong>{{ $errors->first('complemento') }}</strong>
              </span>
              @endif
            </div>

            <div class="col-xs-4 form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
              <label>Numero</label>
              <input type="text" name="numero" class="form-control" value="{{ $endereco->numero }}" required=""/>
              @if ($errors->has('numero'))
                  <span class="help-block">
                      <strong>{{ $errors->first('numero') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-xs-4 form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
              <label>Tipo</label>
              <input type="text" name="tipo" class="form-control" value="{{ $endereco->tipo }}" />
              @if ($errors->has('tipo'))
                  <span class="help-block">
                      <strong>{{ $errors->first('tipo') }}</strong>
                  </span>
              @endif
            </div>


            <div class="col-xs-8 form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
              <label>Bairro</label>
              <input type="text" name="bairro" class="form-control" value="{{ $endereco->bairro }}" required=""/>
              @if ($errors->has('bairro'))
                  <span class="help-block">
                      <strong>{{ $errors->first('bairro') }}</strong>
                  </span>
              @endif
            </div>

            <div class="col-xs-12 form-group{{ $errors->has('localidade') ? ' has-error' : '' }}">
              <label>Localidade</label>
              <input type="text" name="localidade" class="form-control" value="{{ $endereco->localidade }}" required=""/>
              @if ($errors->has('localidade'))
                  <span class="help-block">
                      <strong>{{ $errors->first('localidade') }}</strong>
                  </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
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
  //apenas traz o cep do viacep se ele existir e replace os dados
  function checarCep(cep, e, field, options){
      if(cep.length == 9){
        var ncep = cep.replace('-', '');
        window.axios.defaults.headers.common = {
          'X-Requested-With': 'XMLHttpRequest'
        }
        window.axios.get('https://viacep.com.br/ws/'+ncep+'/json/').then(
          function(response){
            window.$('input[name="nome"]').val(response.data.logradouro);
            window.$('input[name="uf"]').val(response.data.uf);
            window.$('input[name="complemento"]').val(response.data.complemento);
            window.$('input[name="bairro"]').val(response.data.bairro);
            window.$('input[name="localidade"]').val(response.data.localidade);
          });
      }
  }
  //colocar o traco no cep mask e chamar a funçao do via cep
  window.$(document).ready(function(){
    window.$('input[name="cep"]').mask('00000-000', { onKeyPress: checarCep, headers: {} });
  });
  //remover o traco antes de chamar o submit do form
  window.$('#endereco').submit(function(){
    var cep = window.$('input[name="cep"]').val();
    var ncep = cep.replace('-', '');
    window.$('input[name="cep"]').val(ncep);
    return true;
  });
</script>
@endsection
