<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\User;
use PDF;
use DB;
use Mail;

class ArticulosController extends Controller
{

 public function mostarArticulo(){
        $articulo = DB::table('articulos')->paginate(8);
        return view('mostarArticulo', compact('articulo'));
    }

 public function consultar(Request $datos){
  $users= new User();
	// $email=$users->email=$datos->input('email');
	$sexo=$users->sexo=$datos->input('sexo');

	$lista=DB::table('users')
	->select('users.*')
	->where('sexo', 'like', $sexo)
	->get();
	$articulo=Articulo::all();     

	   return view('admin.articulos',compact('lista','articulo'));
}
public function enviar(){
      $articulo=Articulo::all();
      return view('admin.articulos',compact('articulo'));

    }
public function enviarPromociones(Request $datos){
      $articulo=Articulo::all();
     	$CorreoBienvenido=$datos->input('id');

for ($i=0; $i < count($CorreoBienvenido); $i++) {  
  
Mail::send('admin.correoPromociones', ['CorreoBienvenido' => $CorreoBienvenido[$i]] ,function($message) use ($CorreoBienvenido,$i) {
        $message->from('rfmendozam@gmail.com','Luxury watches');
        $message->to($CorreoBienvenido[$i])->subject('Tenemos nuevas ofertas para ti');
  });

}
return view('admin.articulos', compact('articulo'));

   } 
}
