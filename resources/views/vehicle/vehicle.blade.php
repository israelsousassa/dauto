@extends('layouts.app')
@section('content')

@if(count($vehicle) == 0)
<div class="row col-12">
        <div class="alert alert-warning alert-dismissible col-10 fade show" role="alert">
            {{ Auth::user()->name }}, você não possui veículo registrado no sistema. Clique no botão <strong>novo</strong> para registrar veículo.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
        <div class="ml-auto">
            <a href="{{ action('VehicleController@registerVehicle') }}">
                <button type="button" class="btn btn-outline-secondary font-card">
                    <ion-icon name="add-circle-outline" size="large"></ion-icon><br> Novo 
                </button>
            </a>
        </div>
</div>
@else

<div class="row col-12">
    @if (session('msg'))
        <div class="alert alert-warning alert-dismissible col-10 fade show" role="alert">
        {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        <div class="ml-auto">
            <a href="{{ action('VehicleController@registerVehicle') }}">
                <button type="button" class="btn btn-outline-secondary font-card">
                    <ion-icon name="add-circle-outline" size="large"></ion-icon><br> Novo 
                </button>
            </a>
        </div>
</div>

<div class="row col-12">
    <div class="mr-auto">
        <h3><span class="badge badge-secondary font-badge shadow-sm">Cards</span></h3>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-3">
    @foreach ($vehicle as $v)

            <div class="col mb-4">
                <div class="card text-center text-white font-card shadow-sm">
                     <img src="../img/fundo.jpg" class="card-img">
                        
                    <div class="card-img-overlay">
                    @if($v->type == 'Automóvel' || $v->type == 'Caminhonete')
                        @switch($v->color)
                            @case('Branco')
                                 <div class="car"><img src="../img/car-sport-white.png" class="car-sport"></div>
                                @break
                            @case('Preto')
                                <div class="car"><img src="../img/car-sport-black.png" class="car-sport"></div>
                                @break
                            @case('Vermelho')
                                <div class="car"><img src="../img/car-sport-red.png" class="car-sport"></div>
                                @break
                            @case('Azul')
                                <div class="car"><img src="../img/car-sport-blue.png" class="car-sport"></div>
                                @break
                            @case('Cinza / prata')
                                <div class="car"><img src="../img/car-sport-gray.png" class="car-sport"></div>
                                @break
                            @case('Verde')
                                <div class="car"><img src="../img/car-sport-green.png" class="car-sport"></div>
                                @break
                            @case('Amarelo / dourado')
                                <div class="car"><img src="../img/car-sport-yellow.png" class="car-sport"></div>
                                @break
                            @case('Marrom / bege')
                                <div class="car"><img src="../img/car-sport-brown.png" class="car-sport"></div>
                                @break
                            @default
                                <div class="car"><img src="../img/car-sport-black.png" class="car-sport"></div>
                        @endswitch
                    @endif

                    @if($v->type == 'Motoneta' || $v->type == 'Motocicleta' || $v->type == 'Ticiclo' || $v->type == 'Quadriciclo' )
                        @switch($v->color)
                            @case('Branco')
                                 <div class="car"><img src="../img/motorbike-sport-white.png" class="motobike-sport"></div>
                                @break
                            @case('Preto')
                                <div class="car"><img src="../img/motorbike-sport-black.png" class="motobike-sport"></div>
                                @break
                            @case('Vermelho')
                                <div class="car"><img src="../img/motorbike-sport-red.png" class="motobike-sport"></div>
                                @break
                            @case('Azul')
                                <div class="car"><img src="../img/motorbike-sport-blue.png" class="motobike-sport"></div>
                                @break
                            @case('Cinza / prata')
                                <div class="car"><img src="../img/motorbike-sport-gray.png" class="motobike-sport"></div>
                                @break
                            @case('Verde')
                                <div class="car"><img src="../img/motorbike-sport-green.png" class="motobike-sport"></div>
                                @break
                            @case('Amarelo / dourado')
                                <div class="car"><img src="../img/motorbike-sport-yellow.png" class="motobike-sport"></div>
                                @break
                            @case('Marrom / bege')
                                <div class="car"><img src="../img/motorbike-sport-brown.png" class="motobike-sport"></div>
                                @break
                            @default
                                <div class="car"><img src="../img/motor
                                bike-sport-black.png" class="motobike-sport"></div>
                        @endswitch
                    @endif
                        <h5 class="card-title"> 
                            {{ $v->manufacturer }} {{ $v->model }} {{ $v->version }} 
                        </h5>
                        <h6 class="title-top">
                            {{ $v->plate }}-{{ $v->state }}
                        </h6>
                        <div class="icon-button">
                            <table>
                                <tr>
                                    <td class="td-space">
                                        <a href="{{ action('ServiceController@registerService', $v->id) }}">
                                            <ion-icon src="../icones/build.svg" class="icon-crud"></ion-icon>
                                        </a>
                                    </td>
                                    <td class="td-space">
                                        <a href="{{ action('ServiceController@getService', $v->id) }}">
                                            <ion-icon src="../icones/reader.svg" class="icon-crud"></ion-icon>
                                        </a>
                                    </td>
                                    
                                    <td class="td-space">
                                        <a href="{{ action('VehicleController@upVehicle', $v->id) }}">
                                            <ion-icon src="../icones/sync-circle.svg" class="icon-crud"></ion-icon>
                                        </a>
                                    </td>
                                    <td class="td-space">
                                        <a data-toggle="modal" data-target="#{{ $v->plate }}{{ $v->state }}">
                                            <ion-icon src="../icones/trash.svg" class="icon-crud"></ion-icon>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
            
</div>

@foreach ($vehicle as $v)
<!-- modal -->
    <div class="modal fade" id="{{ $v->plate }}{{ $v->state }}" tabindex="-1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" modal-dialog-centered>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-white bg-secondary font-badge">
                    REMOVER
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style ="font-size: 25px !important;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Todos os registros serão removidos. Tem certeza que deseja remover o veículo {{ $v->manufacturer }} {{ $v->model }} {{ $v->version }} ? 
                </div>
                <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light font-badge" data-dismiss="modal">CANCELAR</button>
                    <a href="{{ action('VehicleController@delVehicle', $v->id) }}">
                        <button type="button" class="btn btn-light font-badge">REMOVER</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endif
@stop