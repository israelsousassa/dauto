var cont = 1;
//https://api.jquery.com/click/
$('#add-campo1').click(function () {
    cont++;
    //https://api.jquery.com/append/
    $('#formulario').append('<div id="campo1' + cont + '"> <div class="form-row"> <div class="form-group col-md-9"><label>Serviço ' + cont + '</label><input type="text" class="form-control" name="activity[]" required></div><div class="form-group col-md-2"><label>Valor</label> <input type="text" class="form-control" name="value[]" required></div><div class="form-group col-md-1"><div class="btn-button"><button type="button" id="' + cont + '" class="btn-apagar btn btn-outline-secondary btn-custom"> - </button></div></div></div>');
});

$('form').on('click', '.btn-apagar', function () {
    var button_id = $(this).attr("id");
    $('#campo1' + button_id + '').remove();
});
var count = 1;
//https://api.jquery.com/click/
$('#add-campo2').click(function () {
    count++;
    //https://api.jquery.com/append/
    $('#formulario2').append('<div id="campo2' + count + '"> <div class="form-row"><div class="form-group col-md-6"><label>Peça ' + count + '</label><input type="text" class="form-control" name="part[]"></div><div class="form-group col-md-2"><label>Código ref.</label><input type="text" class="form-control" name="refcode[]"></div> <div class="form-group col-md-1"><label>Qtde</label><input type="text" class="form-control" name="quantity[]"></div> <div class="form-group col-md-2"><label>Valor unit.</label><input type="text" class="form-control" name="unitvalue[]"></div> <div class="form-group col-md-1"><div class="btn-button"><button type="button" id="' + count + '" class="btn-apagar2 btn btn-outline-secondary btn-custom"> - </button></div></div></div></div>');
});

$('form').on('click', '.btn-apagar2', function () {
    var button_id = $(this).attr("id");
    $('#campo2' + button_id + '').remove();
});