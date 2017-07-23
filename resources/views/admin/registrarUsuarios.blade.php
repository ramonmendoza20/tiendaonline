@extends('layouts.app')

@section('content')
<br>
	<div class="container">
		<h2 class="text-center">REGISTRO DE USUARIOS &nbsp;<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></h2>
		<hr>
		<div class="col-xs-8">
			<form action="{{url('/guardarUsuario')}}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="name">Nombre</label>
					<input name="name" type="text" placeholder="Teclea nombre" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="lastname">Apellidos</label>
					<input name="lastname" type="text" placeholder="Teclea apellidos" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input name="email" type="email" placeholder="Teclea correo electrónico" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="domicilio">Domicilio</label>
					<input name="domicilio" type="text"  placeholder="Teclea domicilio" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="birthday">Fecha de Nac</label>
					<input name="birthday" type="date" placeholder="Teclea fecha de nac" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="sexo">Sexo</label>
					<select name="sexo" class="form-control" required>
                        <option value="" selected="disabled" disabled="select">-- Seleccione una opción --</option>
						<option value="Masculino">Masculino</option>
						<option value="Femenino">Femenino</option>
					</select>
				</div>
				<div class="form-group">
					<label for="password">Contraseña</label>
					<input name="password" type="password" placeholder="Teclea contraseña" class="form-control" required>
				</div>

				<button type="submit" class="btn btn-primary">Registrar</button>
				<a href="{{url('/admin')}}" class="btn btn-danger">Cancelar</a><br><br><br>
			</form>
		</div>
	</div>
</div>
@stop
