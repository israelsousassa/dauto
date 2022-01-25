@extends('layouts.app')
@section('content')

<div class="form-group mx-auto col-lg-8">
  <div class="box-icon-return text-muted">
    <a class="a" href="{{ action('VehicleController@getVehicle') }}">
      <ion-icon class="icon-return" src="/icones/arrow-back-circle.svg" size="large"></ion-icon>
    </a> Timeline serviços / manutenção
  </div>
    <div class="jumbotron bg-white">
        <div class="col-md-12">
            <div class="card bg-transparent border-0">
                <div class="card-body">
                    
                    <div id="content">
                        <ul class="timeline">
                        @foreach($service as $s)
                            <li class="event text-color" data-date="{{ date('d/m/Y', strtotime($s->departure)) }}">
                                <h3>{{ $s->diagnosis }}</h3>
                                
                                <a href="{{ action('ServiceController@getServiceVehicle', $s->id) }}" target="_blank">    
                                    <button type="button" class="btn btn-warning btn-size">
                                            <b>PDF</b>
                                    </button>
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
@stop