@extends('layouts.app')

@section('content')

<h3 class="text-center">LISTADO DE USUARIOS REGISTRADOS <a href="{{url('#')}}" target="_blank"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></h3>
<hr>
<div class="container">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr class="success">
				<th class="text-center">ID</th>
				<th class="text-center">NOMBRE</th>
				<th class="text-center">EMAIL</th>
				<th class="text-center">DOMICILIO</th>
				<th class="text-center">FECHA DE NAC</th>
				<th class="text-center">SEXO</th>
				<th class="text-center">OPCIONES</th>

				
					<a href="{{url('/registrarUsuarios')}}" class="btn btn-primary btn-xs">Registrar <span class="glyphicon glyphicon-user"></span></a>
				
			</tr>
		</thead>
		<tbody>
				@foreach($user as $users)
				<tr class="active">
					<td style="text-transform: uppercase;">{{$users->id}}</td>
					<td style="text-transform: uppercase;">{{$users->name}}</td>
					<td>{{$users->email}}</td>
					<td style="text-transform: uppercase;">{{$users->domicilio}}</td>
					<td style="text-transform: uppercase;">{{$users->birthday}}</td>
					<td style="text-transform: uppercase;">{{$users->sexo}}</td>
					<td>
						<a href="{{url('/editarUsuarios')}}/{{$users->id}}" class="btn btn-xs btn-info">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
						</a>
						<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal{{$users->id}}">
						  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar
						</button>
					</td>
				</tr>
				<!-- Modal -->
				<div class="modal fade" id="modal{{$users->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h5 class="modal-title" id="myModalLabel">¿Deseas eliminar el Usuario?</h5>
				      </div>
				      <div class="modal-body">
				        ¡No se podrá recuperar el registro!
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				        <a href="{{url('/eliminarUsuario')}}/{{$users->id}}" class="btn btn-danger">Eliminar</a>
				      </div>
				    </div>
				  </div>
				</div>
				@endforeach
			</tbody>		
	</table>
	<div class="text-center">
		{!! $user->render() !!}
	</div>
</div>
</div>
@stop

