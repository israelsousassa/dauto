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
    </a> Registrar veículo
  </div>
<form action="{{ action('VehicleController@addVehicle') }}" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
        
        <label>Placa</label>
        <input type="text" class="form-control" name="plate" value="{{ old('plate') }}">
        <small class="form-text text-muted">Informe a placa do seu veículo.</small>

        <label>Estado</label>
        <select class="form-control"  name='state' value="{{ old('state') }}">
            @foreach($states as $s)
            <option value="{{ $s->abbr }}">{{ $s->name }}</option>
            @endforeach
        </select>

        <label>Categoria</label>
        <select class="form-control"  name='category' value="{{ old('category') }}" >
          <option selected>Automotor</option>
          <option>Elétrico</option>
        </select>

        <label>Tipo</label>
        <select class="form-control"  name='type' value="{{ old('type') }}"  >
          <option selected>Automóvel</option>
          <option>Motoneta</option>
          <option>Motocicleta</option>
          <option>Triciclo</option>
          <option>Quadriciclo</option>
          <option>Microônibus</option>
          <option>Ônibus</option>
          <option>Caminhonete</option>
          <option>Caminhão</option>
        </select>

        <label>Fabricante</label>
        <select  class="form-control"  name='manufacturer' value="{{ old('manufacturer') }}" >
            @for($i = 0; $i < count($manufacturers); $i++)
            <option>{{ $manufacturers[$i]->name }}</option>
            @endfor
        </select>

        <label>Modelo</label>
        <input type="text" class="form-control" name="model" value="{{ old('model') }}">
        <small class="form-text text-muted">Informe o modelo do veículo.</small>

        <label>Versão</label>
        <input type="text" class="form-control" name="version" value="{{ old('version') }}">
        <small class="form-text text-muted">Informe a versão do veículo.</small>
    
        <label>Ano fabricação</label>
        <input type="number" class="form-control" name="yearmanufacturer" value="{{ old('yearmanufacturer') }}">
        <small class="form-text text-muted">Informe o ano de fabricação do veículo.</small>


        <label>Ano modelo</label>
        <input type="number" class="form-control" name="yearmodel" value="{{ old('yearmodel') }}" >
        <small class="form-text text-muted">Informe o ano do modelo do veículo.</small>

        <label>Potência</label>
        <input type="text" class="form-control" name="potency" value="{{ old('potency') }}">
        

        <label>Cilindrada</label>
        <input type="text" class="form-control" name="enginecapacity" value="{{ old('enginecapacity') }}">

        <label>Trasmissão</label>
        <select class="form-control"  name='transmission' value="{{ old('transmission') }}" >
          <option selected>Manual</option>
          <option>Automático</option>
           <option >Automátizada</option>
        </select>

        <label>Direção</label>
        <select class="form-control"  name='steering' value="{{ old('steering') }}">
          <option>Mecânica</option>
          <option selected>Hidráulica</option>
          <option >Elétrica</option>
           <option >Eletro-hidráulica</option>
        </select>

        <label>Portas</label>
        <select class="form-control"  name='doors' value="{{ old('doors') }}" >
          <option>0</option>
           <option selected>4</option>
          <option >5</option>
        </select><br>

        <div class="box-sky-row">
          <label>Ar condicionado?</label><br>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="air" class="custom-control-input" value="1" checked>
              <label class="custom-control-label" for="customRadioInline1">SIM</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="air" class="custom-control-input" value="0">
              <label class="custom-control-label" for="customRadioInline2">NÃO</label>
            </div>
        </div><br>
        <label>Combustivél</label>
        <select class="form-control"  name='fuel' value="{{ old('fuel') }}" >
          <option selected>Flex</option>
          <option>Gasolina</option>
          <option>Etanol</option>
          <option>Diesel</option>
        </select>

         <label>Cor</label>
        <select class="form-control"  name='color' value="{{ old('color') }}" >
          <option selected>Branco</option>
          <option>Preto</option>
          <option>Azul</option>
          <option>Vermelho</option>
          <option>Cinza / prata</option>
          <option>Marrom / bege</option>
          <option>Verde</option>
          <option>Amarelo / dourado</option>
          <option>Outros</option>
        </select>
        <br><br>

        <button type="submit" class="btn btn-sky btn-block">Registrar</button>
    </div>
    
</form>
</div>
@stop
