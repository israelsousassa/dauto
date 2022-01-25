@extends('layouts.app')
@section('content')

<h1>Adicionar atividades</h1>

<form action="/enviar" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

    <div id="formulario">
        <div class="form-row">
           @php
             $x = 1;      
           @endphp
            <div class="form-group col-md-10"> 
                <label>Atividade</label>
                <input type="text" class="form-control" name="atividade[nome1]">
            </div>
            <div class="form-group col-md-1">
                <label>Preço</label>
                <input type="text" class="form-control" name="atividade[preco1]">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label>Peça</label>
                <input type="text" class="form-control" name="peca[nome1]">
            </div>
            <div class="form-group col-md-2">
                <label>Referência</label>
                <input type="text" class="form-control" name="peca[ref1]">
            </div>
            <div class="form-group col-md-1">
                <label>Qtde</label>
                <input type="text" class="form-control" name="peca[qtde1]">
            </div>
            <div class="form-group col-md-1">
                <label>Preço (un)</label>
                <input type="text" class="form-control" name="peca[preco_un1]">
            </div>
            
            
            
            <div class="form-group col-md-1">
                <div class="btn-button"><button type="button" class="btn btn-success" id="add-campo2"> <ion-icon src="../icones/add-circle-sharp.svg"></ion-icon> Peça</button></div>
            </div>
        </div>
    </div>

    <div class="form-group">
        
        <button type="button" class="btn btn-success" id="add-campo1"> <div class="form-row"><div class="btn-icon"><ion-icon src="../icones/add-circle-sharp.svg"></ion-icon></div> Atividade </div></button>
        <input type="submit" class=" btn btn-primary" value="Cadastrar">
    </div>
   
  
</form>

        <script>
            var cont = 1;
            //https://api.jquery.com/click/
            $('#add-campo1').click(function () {
                cont++;
                //https://api.jquery.com/append/
                $('#formulario').append('<div class="form-group" id="campo1' + cont + '"> <div class="form-row"> <div class="form-group col-md-10"><label>Atividade</label><input type="text" class="form-control" name="atividade[nome' + cont + ' ]"></div><div class="form-group col-md-1"><label>Preço</label> <input type="text" class="form-control" name="atividade[preco' + cont + ']"></div><div class="form-group col-md-1"><div class="btn-button"><button type="button" id="' + cont + '" class="btn-apagar btn btn-secondary"> <ion-icon src="../icones/trash-sharp.svg"></ion-icon> Exclui</button></div></div></div>  <div class="form-row"><div class="form-group col-md-7"><label>Peça </label><input type="text"  class="form-control" name="peca[nome' + cont + ']"></div><div class="form-group col-md-2"><label>Referência</label><input type="text" class="form-control" name="peca[ref' + cont + ']"></div><div class="form-group col-md-1"><label>Qtde</label><input type="text" class="form-control" name="peca[qtde' + cont + ']"></div><div class="form-group col-md-1"><label>Preço (un)</label><input type="text" class="form-control" name="peca[preco_un' + cont + ']"></div><div class="form-group col-md-1"><div class="btn-button"><button type="button" class="btn-add btn btn-success"> <ion-icon src="../icones/add-circle-sharp.svg"></ion-icon> Peça</button></div></div></div></div>');
            });

             //https://api.jquery.com/click/
            $('#add-campo2').click(function () {
                cont++;
                //https://api.jquery.com/append/
                $('#formulario').append('<div class="form-group" id="campo2' + cont + '"> <div class="form-row"><div class="form-group col-md-7"><label>Peça</label><input type="text" class="form-control" name="peca[nome' + cont + ']"></div><div class="form-group col-md-2"><label>Referência</label><input type="text" class="form-control" name="peca[ref' + cont + ']"></div> <div class="form-group col-md-1"><label>Qtde</label><input type="text" class="form-control" name="peca[qtde' + cont + ']"></div> <div class="form-group col-md-1"><label>Preço (un)</label><input type="text" class="form-control" name="peca[preco_un' + cont + ']"></div> <div class="form-group col-md-1"><div class="btn-button"><button type="button" id="' + cont + '" class="btn-apagar2 btn btn-danger"> <ion-icon src="../icones/trash-sharp.svg" class="icon-button"></ion-icon> Peça </button></div></div></div></div>');
            });

            $('form').on('click', '.btn-add', function () {
                cont++;
                $('#formulario').append('<div class="form-group" id="campo2' + cont + '"> <div class="form-row"><div class="form-group col-md-7"><label>Peça</label><input type="text" class="form-control" name="peca[nome' + cont + ']"></div><div class="form-group col-md-2"><label>Referência</label><input type="text" class="form-control" name="peca[ref' + cont + ']"></div><div class="form-group col-md-1"><label>Qtde</label><input type="text" class="form-control" name="peca[qtde' + cont + ']"></div><div class="form-group col-md-1"><label>Preço</label><input type="text" class="form-control" name="peca[preco_un' + cont + ']"></div> <div class="form-group col-md-1"><div class="btn-button"><button type="button" id="' + cont + '" class="btn-apagar2 btn btn-danger"> <ion-icon src="../icones/trash-sharp.svg"></ion-icon> Peça</button></div></div></div></div>');
            });

            $('form').on('click', '.btn-apagar', function () {
                var button_id = $(this).attr("id");
                $('#campo1' + button_id + '').remove();
            });

            $('form').on('click', '.btn-apagar2', function () {
                var button_id = $(this).attr("id");
                $('#campo2' + button_id + '').remove();
            });
        </script>


@stop