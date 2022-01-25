@extends('layouts.app')

@section('content')

<div class="jumbotron bg-white col-sm-11 mx-auto">
<div class="form-group mx-auto col-lg-8">
  @if(count($errors) > 0)
    <div class="alert alert-secondary" role="alert">
      <ul>  
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li> 
        @endforeach
      </ul>
    </div>
  @endif
    <div class="box-icon-return text-muted">
    <a class="a" href="{{ action('VehicleController@getVehicle') }}">
      <ion-icon class="icon-return" src="/icones/arrow-back-circle.svg" size="large"></ion-icon>
    </a> Perfil
  </div>
<form action="{{ action('PersonController@updatePerfil',$p[0]->id) }}" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
       
        <label>Nome</label>
        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">

        <label>Sobrenome</label>

        <input type="text" class="form-control" name="lastname" value="{{ $p[0]->lastname }}">

        <label>Data de nascimento</label>
      
        <input type="date" class="form-control" name="datebirth" value="{{ $p[0]->datebirth }}">

        <label>E-mail</label>
        
        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
        
        <label>Celular</label>
        
        <input type="tel" class="form-control" name="cell" value="{{ $p[0]->cell }}">

        <br>
        <button type="submit" class="btn btn-sky btn-block">Salvar</button>
    </div>
</form>
</div>
</div>
@stop