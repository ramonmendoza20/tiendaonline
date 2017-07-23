@extends('layouts.app')
@section('content')
<script>
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
</script>
<form action="{{url('/actualizar')}}/{{$articulo->id}}" method="POST">{{ csrf_field() }}
                    <!-- <input type="hidden" value="{{URL::previous()}}" name="redirect"> -->
<input type="hidden" name="_token" value="{{csrf_token() }}">
	<div class="container">
		<div class="form-horizontal">               
                <h3 class="text-center">MODIFICAR ARTICULO <span class="glyphicon glyphicon-pencil"></span></h3>
                <hr />
                
                <div class="form-group">
                    <label for="name" class="col-md-2 control-label">NOMBRE</label>
                    <div class="col-md-4">
                        <input type="text" name="name" class="form-control" style="text-transform: uppercase;" value="{{$articulo->name}}" placeholder="NOMBRE" required>
                    </div>
                </div>
                <div class="form-group">
                	<label for="descripcion" class="col-md-2 control-label">DESCRIPCIÓN</label>
                    <div class="col-md-4">
                    	<textarea name="descripcion" class="form-control" rows="3" cols="50" style="text-transform: uppercase;" placeholder="BREVE DESCRIPCIÓN DEL ARTÍCULO" required>{{$articulo->descripcion}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                	<label for="precio" class="col-md-2 control-label">PRECIO</label>
                    <div class="form-group">
                        <div class="input-group col-md-4">
                            <div class="input-group-addon">$</div>
                                <input type="number" name="precio" value="{{$articulo->precio}}" step="any" class="form-control" placeholder="PRECIO" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                	<label for="genero" class="col-md-2 control-label">GENERO</label>
                    <div class="col-md-4">
						<select name="genero" class="form-control" required="required">
                            <option value="{{$articulo->genero}}" selected>{{$articulo->genero}}</option>
							<option value="FEMENINO">FEMENINO</option>
                            <option value="MASCULINO">MASCULINO</option>
						</select>                    	
                    </div>
                </div>
                 <div class="form-group">
                 	<label for="imagen" class="col-md-2 control-label">IMAGEN</label>
                    <div class="col-md-4">
                    	<input type="file" name="imagen" value="{{$articulo->imagen}}" class="form-control form-control" type="file" id="imagen" required>
                        <input type="hidden" id="img" name="img" value="{{$articulo->imagen}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-6">
                        <input type="submit" value="Actualizar" class="btn btn-primary">

                        <a href="{{url('PDFVale')}}/{{$articulo->id}}" class="btn btn-success" target="_blank">GENERAR PDF</a>
                        <a href="{{url('consultarArticulo')}}" class="btn btn-default">CANCELAR</a>
                    </div>
                </div>
            </div>           
        </div>
        <!-- Fin del formulario para rtegistrar productos-->
    </form>
    </div>
</div>

@stop