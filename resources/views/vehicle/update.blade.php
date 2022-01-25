@extends('layouts.app')
@section('content')

@php 
    $transmission = 
    [
      "Manual",
      "Automático",
      "Automátizada"
    ];

    $steering = 
    [
      "Mecânica",
      "Hidráulica",
      "Elétrica",
      "Eletro-hidráulica"
    ];

    $fuel = 
    [
      "Flex",
      "Gasolina",
      "Etanol",
      "Diesel"
    ];

    $color = 
    [
      "Branco",
      "Preto",
      "Azul",
      "Vermelho",
      "Cinza / prata",
      "Marrom / bege",
      "Verde",
      "Amarelo / dourado",
      "Outros"
    ];

    $category = 
    [
      "Automotor",
      "Elétrico"
    ];

    $type = 
    [
      "Automóvel",
      "Motoneta",
      "Motocicleta",
      "Triciclo",
      "Quadriciclo",
      "Microônibus",
      "Ônibus",
      "Caminhonete",
      "Caminhão"
    ];

    $doors = [0,4,5];

@endphp

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
    </a> Atualizar veículo
  </div>

<form action="{{ action('VehicleController@update', $v->id) }}" method="post">
    
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

        <label>Categoria</label>
        <select class="form-control"  name='category' value="{{ old('category') }}">
          <option selected>{{ $v->category }}</option>
          @for($i = 0; $i < count($category); $i++)
            @if($category[$i] == $v->category)
              @continue
            @endif
          <option>{{ $category[$i] }}</option>
          @endfor
  
        </select>

        <label>Tipo</label>
        <select class="form-control"  name='type' value="{{ old('type') }}">
          <option selected>{{ $v->type }}</option>
          @for($i = 0; $i < count($type); $i++)
            @if($type[$i] == $v->type)
              @continue
            @endif
          <option>{{ $type[$i] }}</option>
          @endfor
        </select>

        <label>Fabricante</label>
        <select  class="form-control"  name='manufacturer'>
          <option selected>{{ $v->manufacturer }}</option>
            @for($i = 0; $i < count($manufacturers); $i++)
              @if($manufacturers[$i]->name == $v->manufacturer)
                @continue
              @endif
                <option>{{ $manufacturers[$i]->name }}</option>
            @endfor
        </select>

        <label>Modelo</label>
        <input type="text" class="form-control" name="model" value="{{ $v->model }}">
        <small class="form-text text-muted">Informe o modelo do veículo.</small>

        <label>Versão</label>
        <input type="text" class="form-control" name="version" value="{{ $v->version }}">
        <small class="form-text text-muted">Informe a versão do veículo.</small>
    
        <label>Ano fabricação</label>
        <input type="number" class="form-control" name="yearmanufacturer" value="{{ $v->yearmanufacturer }}">
        <small class="form-text text-muted">Informe o ano de fabricação do veículo.</small>


        <label>Ano modelo</label>
      
        <input type="number" class="form-control" name="yearmodel" value="{{ $v->yearmodel }}">
        <small class="form-text text-muted">Informe o ano do modelo do veículo.</small>

        <label>Potência</label>
        <input type="text" class="form-control" name="potency" value="{{ $v->potency }}">
        

        <label>Cilindrada</label>
        <input type="text" class="form-control" name="enginecapacity" value="{{ $v->enginecapacity }}">

        
        <label>Trasmissão</label>
        <select class="form-control" name="transmission">
          <option selected>{{ $v->transmission }}</option>
          @for($i = 0; $i < count($transmission); $i++)
            @if($transmission[$i] == $v->transmission)
              @continue
            @endif
          <option>{{ $transmission[$i] }}</option>
          @endfor
        </select>

        <label>Direção</label>
        <select class="form-control"  name="steering">
          <option selected>{{ $v->steering }}</option>
          @for($i = 0; $i < count($steering); $i++)
            @if($steering[$i] == $v->steering)
              @continue
            @endif
          <option>{{ $steering[$i] }}</option>
          @endfor
        </select>

        <label>Portas</label>
        <select class="form-control"  name="doors">
          <option selected>{{ $v->doors }}</option>
          @for($i = 0; $i < count($doors); $i++)
            @if($doors[$i] == $v->doors)
              @continue
            @endif
          <option>{{ $doors[$i] }}</option>
          @endfor
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
        <select class="form-control"  name="fuel">
          <option selected>{{ $v->fuel }}</option>
            @for($i = 0; $i < count($fuel); $i++)
            @if($fuel[$i] == $v->fuel)
              @continue
            @endif
          <option>{{ $fuel[$i] }}</option>
          @endfor
        </select>

         <label>Cor</label>
        <select class="form-control"  name='color' value="{{ old('color') }}">
          <option selected>{{ $v->color }}</option>
          @for($i = 0; $i < count($color); $i++)
            @if($color[$i] == $v->color)
              @continue
            @endif
          <option>{{ $color[$i] }}</option>
          @endfor
          
        </select>

      <br><br>

        <button type="submit" class="btn btn-sky btn-block">Alterar</button>
    </div>
    
</form>
</div>
@stop