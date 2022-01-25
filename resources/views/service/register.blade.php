@extends('layouts.app')
@section('content')
<div class="jumbotron bg-white col-sm-11 mx-auto">
    <div class="container col-lg-10">
@if(count($errors) > 0 || session('errorservice'))
  <div class="alert alert-secondary" role="alert">
    <ul>  
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li> 
      @endforeach
      <li>{{ session('errorservice') }}</li>
    </ul>
  </div>
@endif




        <div class="box-icon-return text-muted">
            <a class="a" href="{{ action('VehicleController@getVehicle') }}">
                <ion-icon class="icon-return" src="/icones/arrow-back-circle.svg" size="large">
            </a>
            </ion-icon>Registrar serviço / manutenção
            
        </div>
        <form action="{{ action('ServiceController@addService', $v->id) }}" method="post">
            
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
            <input type="hidden" name="id" value="{{ $v->id }}">

                <div class="form-row">
                    <div class="form-group col-md-4"> 
                        <label>Prestador de serviço</label>
                        <input type="text" class="form-control" name="serviceprovider" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Data de entrada</label>
                        <input type="datetime-local" class="form-control" name="entry">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Data de saída</label>
                        <input type="datetime-local" class="form-control" name="departure">
                    </div> 
                </div>

                <div class="form-row">
                    <div class="form-group col-md-10"> 
                        <label>Diagnóstico</label>
                        <input type="text" class="form-control" name="diagnosis">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Km</label>
                        <input type="number" class="form-control" name="km">
                    </div>
                
                </div>
            
            <div id="formulario">
                <div class="form-row">
                    <div class="form-group col-md-9"> 
                        <label>Serviço 1</label>
                        <input type="text" class="form-control" name="activity[]">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Valor</label>
                        <input type="text" class="form-control" name="value[]">
                    </div>

                    <div class="form-group col-md-1">
                        <div class="btn-button">
                            <button type="button" class="btn btn-outline-primary btn-custom" id="add-campo1"> + </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="formulario2">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Peça 1</label>
                        <input type="text" class="form-control" name="part[]" >
                    </div>
                    <div class="form-group col-md-2">
                        <label>Código ref.</label>
                        <input type="text" class="form-control" name="refcode[]" >
                    </div>
                    <div class="form-group col-md-1">
                        <label>Qtde</label>
                        <input type="number" class="form-control" name="quantity[]">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Valor unit.</label>
                        <input type="text" class="form-control" name="unitvalue[]">
                    </div>
                    <div class="form-group col-md-1">
                        <div class="btn-button">
                            <button type="button" class="btn btn-outline-primary btn-custom" id="add-campo2"> + </button>
                        </div>
                    </div>
                </div>
            </div><br>
            
            <div class="form-group">
                <input type="submit" class="btn btn-sky btn-block" value="Cadastrar">
            </div> 
        </form>
    </div>
</div>


@stop