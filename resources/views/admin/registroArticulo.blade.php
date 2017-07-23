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
<div>
<form action="{{url('/guardarArticulo')}}" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ csrf_field() }}
	<div class="container">
		<div class="form-horizontal">               
                <h3 class="text-center">REGISTRO DE ARTICULO <span class="glyphicon glyphicon-pencil"></span></h3>
                <hr />
                <div class="form-group">
                	<label for="name" class="col-md-2 control-label">NOMBRE</label>
	                    <div class="col-md-4">
                            <input type="text" name="name" class="form-control" style="text-transform: uppercase;" placeholder="Nombre articulo" title="Ingrese nombre del articulo" required="required"/>
	                    </div>
                </div>
                <div class="form-group">
                	<label for="descripcion" class="col-md-2 control-label">DESCRIPCIÓN</label>
                    <div class="col-md-3">
                    	<textarea name="descripcion" class="form-control" rows="3" cols="50" style="text-transform: uppercase;" placeholder="BREVE DESCRIPCIÓN DEL ARTÍCULO" title="Ingrese una breve descripción del artículo" required="required"></textarea>
                    </div>
                </div>
                <div class="form-group">
                	<label for="precio" class="col-md-2 control-label">PRECIO</label>
                            <div class="form-group">
                                <div class="input-group col-md-3">
                                    <div class="input-group-addon">$</div>
                                        <input type="number" name="precio" min="0" step="any" class="form-control" placeholder="PRECIO" required="required">
                                </div>
                            </div>
                </div>
                 <div class="form-group">
                 	<label for="genero" class="col-md-2 control-label">GENERO</label>
                    <div class="col-md-5">
                    	<select id="genero" name="genero" class="form-control" required="required">
	                    	<option value="" selected="disabled" disabled="select">-- Seleccione una opción --</option>
                    		<option value="FEMENINO">FEMENINO</option>
                            <option value="MASCULINO">MASCULINO</option>
                    	</select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="imagen" class="col-sm-2 control-label">IMAGEN</label>
                <div class="col-sm-5">
                    <input class="form-control form-control" type="file" id="imagen" name="imagen">
                    <input type="hidden" id="img" name="img" value="">
                </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-6">
                    <button type="submit" class="btn btn-success" name="Guardar">GUARDAR</button>
                    <button type="reset" class="btn btn-default"><a href="{{url('/registroArticulo')}}"></a>CANCELAR</button>
                    </div>
                </div>
            </div>           
        </div>
        <!-- Fin del formulario para rtegistrar productos-->
    </form>
</div>
</div>

@stop