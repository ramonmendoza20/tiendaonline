@extends('layouts.app')
@section('encabezado')
@stop
@section('content')
<h2 class="text-center">ARTICULOS DISPONIBLES <a href="{{url('/generarPDF')}}" target="_blank"></a></h2>
<hr>
<div class="container">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr class="success">
					<th class="text-center">ID</th>
					<th class="text-center">NOMBRE</th>
					<th class="text-center">DESCRIPCIÓN</th>
					<th class="text-center">PRECIO</th>
					<th class="text-center">GENERO</th>
					<th class="text-center">IMAGEN</th>
					<th class="text-center">OPCIONES</th>
				</tr>
			</thead>
			<tbody>
				@foreach($articulo as $art)
				<tr class="active">
					<td>{{$art->id}}</td>
					<td>{{$art->name}}</td>
					<td style="text-align: justify-all; text-transform: uppercase;">{{$art->descripcion}}</td>
					<td class="text-center">${{number_format($art->precio, 2)}}</td>
					<td style="text-align: justify-all; text-transform: uppercase;">{{$art->genero}}</td>
					<td class="text-center"><img src="{{asset('img/articulos/ $art->imagen')}}" alt="" style="max-width: 100px;">
						<input type="hidden" id="img" name="img" value="{{$art->imagen}}">
					</td>

				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $articulo->render() !!}
		</div>
	</div>
</div>
@stop