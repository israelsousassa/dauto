<!doctype html>
<html>
<head>
    <title>SERVICO_{{ date('dmY_His', strtotime($s->departure)) }}</title>
    <meta charset="utf-8">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Fugaz+One&family=Nunito:wght@200&family=Quicksand:wght@500&family=Roboto:wght@300&display=swap" rel="stylesheet">
 
</head>

<style>
    html{
        margin: 0 auto;
    }
    .title-info{
        text-align: center; 
    }
    .col-1{
        width: 10%;
    }
    .col-2{
        width: 20%;
    }
    .col-3{
        width: 30%
    }
    .col-3-5{
        width:35%;
    }
    .col-4{
        width: 40%;
    }
    .col-5{
        width:50%;
    }
    .col-6{
        width: 60%;
    }
    .col-7{
        width: 70%;
    }
    .col-8{
        width: 80%;
    }
    .col-8-3{
        width: 83%;
    }
    .col-9{
        width: 90%;
    }
    .col-10{
        width: 100%;
    }
    td{
        border: 1px #dee2e6;
        border-bottom-style: solid;
    }
    .th{
        color: #1b4b72 !important ;
        font-weight: bold;
        border-bottom-style: none;
    }
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 15px;
    }
    #customers td, #customers th {
        padding: 10px;
    }
    #customers tr:nth-child(even){background-color: while;}
    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #d6e9f8;
        color: #1b4b72;
        border-radius: 5px;
    }
    .logo-nav{
    font-family: 'Fugaz One', cursive !important;
    color: rgba(27,75,114, 0.7);

}
</style>

<body>
     
    <table>
        <tr>
            <th>
                <h1 class="logo-nav">{{ config('app.name', 'Laravel') }}</h1>
            </th>
        </tr>
    </table>
    <table id="customers">
        <tr>
            <th><div class="title-info">INFORMAÇÕES DO PROFISSIONAL</div></th>
        </tr>
    </table>
    <table id="customers">
        <tr>
            <td class="th">Prestador de serviços</td>
        </tr>
         <tr>
            <td>{{ $s->serviceprovider }}</td>
        </tr>
    </table>
    <table id="customers">
        <tr>
            <th><div class="title-info">INFORMAÇÕES DO USUÁRIO</div></th>
        </tr>
    </table>
    <table id="customers">
        <tr>
            <td class="th">Proprietário</td>
            <td class="th">Telefone</div></td>
            <td class="th">Email</td>
            <td class="th">CPF</td>
        </tr>
        <tr>
            <td>{{ Auth::user()->name }} {{ $p[0]->lastname }}</td>
            <td>{{ $p[0]->cell }}</td>
            <td>{{ Auth::user()->email }}</td>
            <td>{{ $p[0]->cpf }}</td>
        </tr>
    </table>    
        <table id="customers">
        <tr>
            <td class="th">Placa</td>
            <td class="th">Fábricante</td>
            <td class="th">Modelo / Versão</td>
            <td class="th">Ano</td>
            <td class="th">Portas</td>
            <td class="th">Combustível</td>
        </tr>
        <tr>
            <td class="col-3">{{ $v[0]->plate }} - {{ $v[0]->state }}</td>
            <td class="">{{ $v[0]->manufacturer }}</td>
            <td class="col-4">{{ $v[0]->model }} {{ $v[0]->version }}</td>
            <td class="col-3">{{ $v[0]->yearmanufacturer }} / {{ $v[0]->yearmodel }}</td>
            <td class="">{{ $v[0]->doors }}</td>
            <td class="">{{ $v[0]->fuel }}</td>
        </tr>
       
    </table>
    <table id="customers">
        <tr>
            <td class="th">KM</td>
            <td class="th">Direção</td>
            <td class="th ">Ar</td>
            <td class="th ">Cor</td>
            <td class="th">Data de entrada</td>
            <td class="th">Data de retirada</td>
        </tr>
        <tr>
            <td>{{ $s->km }}</td>
            <td>{{ $v[0]->steering }}</td>
            <td>{{ ($v[0]->air == 1) ? "SIM" : "NÃO" }}</td>
            <td>{{ $v[0]->color }}</td>
            <td>{{ $entrydate }} às {{ $entrytime }}</td>
            <td>{{ $departuredate }} às {{ $departuretime }}</td>
        </tr>
    </table>
    
     <table id="customers">
        <tr>
            <th><div class="title-info">INFORMAÇÕES DE DIAGNÓSTICOS</div></th>
        </tr>
    </table>
    <table id="customers">
        <tr>
            <td class="th">Diagnóstico</td>
        </tr>
         <tr>
            <td><b>D1</b> - {{ $s->diagnosis }}</td>
        </tr>
    </table>
    
     <table id="customers">
        <tr>
            <th><div class="title-info">INFORMAÇÕES DE SERVIÇOS</div></th>
        </tr>
    </table>
   <table id="customers">
         <tr>
            <td class="th col-8-3">Serviço</td>
            <td class="th">Total</td>
        </tr>
        @for($y = 1; $y <= count($atv); $y++)
            @foreach($atv as $a)
            <tr>
                <td class="col-8-3"><b>S{{ $y++ }}</b> - {{ $a->name }}</td>
                <td>R$ {{ number_format( $a->value  ,2,",",".") }}</td>
            </tr>
            @endforeach
        @endfor
    </table>
    <table id="customers">
        <tr>
            <th><div class="title-info">INFORMAÇÕES DE PEÇAS</div></th>
        </tr>
    </table>
      <table id="customers">
         <tr>
            <td class="th col-3-5">Peça</td>
            <td class="th">Código ref.</td>
            <td class="th">Qtde</td>
            <td class="th">Valor unit.</td>
            <td class="th">Total</td>
        </tr>
        @for($i = 1; $i <= count($pt); $i++)
            @foreach($pt as $p)
            <tr>
                <td class="col-3-5"><b>P{{ $i++ }}</b> - {{ $p->name }}</td>
                <td>{{ $p->refcode }}</td>
                <td>{{ $p->quantity }}</td>
                <td>R$ {{ number_format( $p->unitvalue  ,2,",",".") }}</td>
                <td>R$ {{ number_format( $p->quantity * $p->unitvalue  ,2,",",".") }}</td>
            </tr>
           @endforeach
        @endfor
    </table>
     <table id="customers">
        <tr>
            <td class="th col-4">MÃO DE OBRA : R$ {{ number_format( $atotal  ,2,",",".") }}</td>
            <td class="th">PEÇAS: R$ {{ number_format( $ptotal  ,2,",",".") }}</td>
            <td class="th">VALOR TOTAL: R$ {{ number_format( $atotal + $ptotal  ,2,",",".") }}</td>
        </tr>
    </table>
</body>
</html>

