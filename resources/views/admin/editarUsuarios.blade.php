@extends('layouts.app')
@section('content')
<div style="background-image: url('img/fondoblanco.jpg'); background-size: cover; margin-top: -100px;">
<br><br><br><br><br><br><br>
<form action="{{url('/actualizarUsuario')}}/{{$user->id}}" method="POST">
                    <!-- <input type="hidden" value="{{URL::previous()}}" name="redirect"> -->
<input type="hidden" name="_token" value="{{csrf_token() }}">
	<div class="container">               
                <h3 class="text-center">MODIFICAR USUARIO <span class="glyphicon glyphicon-pencil"></span></h3>
                <hr />
                <div class="col-xs-12">
	               
					<div class="form-group">
						<label for="name">Nombre</label>
						<input name="name" type="text" style="text-transform: uppercase;" placeholder="Teclea nombre" class="form-control" value="{{$user->name}}" required>
					</div>
					<div class="form-group">
						<label for="email">Correo Electrónico</label>
						<input name="email" type="text" placeholder="Teclea correo electronico" class="form-control" value="{{$user->email}}" required>
					</div>
					<div class="form-group">
						<label for="password">Contraseña</label>
						<input name="password" type="password" placeholder="Teclea contraseña" class="form-control" value="{{$user->password}}" required>
					</div>
				

		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{url('/consultarUsuarios')}}" class="btn btn-success">Cancelar</a>
		</div>
	</div>
</form>
</div>
@stop