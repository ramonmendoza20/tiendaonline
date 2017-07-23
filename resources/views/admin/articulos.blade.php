@extends('layouts.app')
@section('content')
<!-- <script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9 -]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script> -->
<div class="container">
<form action="{{url('/consultar')}}" method="GET" >
<input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
<table class="table table-striped">
<thead>
    <tr>
        <th>Sexo</th>
        <th>Opciones</th>
    </tr>
    <tr>
        <th> 
            <select name="sexo" class="form-control">
            <option value="" selected="disabled" disabled="select">-- Seleccione una opción --</option>
            <option value="FEMENINO">FEMENINO</option>
            <option value="MASCULINO">MASCULINO</option>
            </select>
        </th>
        <th>
            <button  name="btn" type="submit"  class="btn btn-primary">Buscar</button>
        </th>
    </tr>
</thead>
</table>
</form>
@isset($lista)
<form  action="{{url('/enviarPromociones')}}" method="POST">
<input id="token" type="hidden" name="_token" value="{{csrf_token() }}">
<table class="table table-striped"> 
<thead>
    <tr class="success">
        <th class="text-center">ID</th>
        <th class="text-center">NOMBRE</th>
        <th class="text-center">EMAIL</th>
        <th class="text-center">DOMICILIO</th>
        <th class="text-center">FECHA DE NAC</th>
        <th class="text-center">SEXO</th>
    </tr>
</thead>
<tbody>
@foreach($lista as $u)
<input type="hidden" name="id[]" value="{{$u->email}}">
    <tr class="active">
        <td style="text-transform: uppercase;">{{$u->id}}</td>
        <td style="text-transform: uppercase;">{{$u->name}}</td>
        <td>{{$u->email}}</td>
        <td style="text-transform: uppercase;">{{$u->domicilio}}</td>
        <td style="text-transform: uppercase;">{{$u->birthday}}</td>
        <td style="text-transform: uppercase;">{{$u->sexo}}</td>
    </tr>

@endforeach
</tbody>
@endisset

@empty($records)
@endempty
</table>
<div class="form-group">
    <label for="promo">Promocion</label>
        <select name="articulo" class="form-control">
                <option value="" selected="disabled" disabled="select">-- Seleccione una opción --</option>
            @foreach($articulo as $a)
                <option value="{{$a->id}}">{{$a->name}}</option>
            @endforeach
        </select>
    </div>
<div>
    <button  name="btn" type="submit"  class="btn btn-danger">Enviar</button>
</div>
</form>
</div>
@stop