<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Articulo;
use Mail;
use Validator;
use Auth;
use DB;
use PDF;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => 'createAdmin']);
    }
    private function isAdmin(){
        if (Auth::user()->role == 1) return true;
        else return false;
    }
    public function admin(){
        if ($this->isAdmin()){
            return View('admin.admin');
        } else{
            return redirect()->back();
        }
    }

 public function registroArticulo(){
        return view('admin.registroArticulo');
    }
 public function guardarArticulo(Request $datos){
         $articulo=new Articulo();
         $articulo->name=$datos->input('name');
         $articulo->descripcion=$datos->input('descripcion');
         $articulo->precio=$datos->input('precio');
         $articulo->genero=$datos->input('genero');
         $articulo->imagen=$datos->input('imagen');
         $articulo->save();

         return redirect('consultarArticulo');

    }
 public function consultarArticulo(){
        $articulo = DB::table('articulos')->paginate(8);
        return view('consultarArticulo', compact('articulo'));
    }

    public function actualizar($id){
        $articulo = articulo::find($id);
        return view('admin.actualizarArticulo', compact('articulo'));
    }

    public function actualizarArticulo($id, Request $datos){
        $articulo = articulo::find($id);
        $articulo->name=$datos->input('name');
        $articulo->descripcion=$datos->input('descripcion');
        $articulo->precio=$datos->input('precio');
        $articulo->genero=$datos->input('genero');
        $articulo->imagen=$datos->input('imagen');
        $articulo->save();

        return Redirect('/consultarArticulo');
    }

    // Eliminar articulos almacenados
    public function eliminar($id){
        articulo::find($id)->delete();
        return Redirect('/consultarArticulo');
    }


    //USUARIOS
 public function registrarUsuarios(){
        return view('admin.registrarUsuarios');
    }
 public function guardarUsuario(Request $datos){
        $user= new User();
        $user->name=$datos->input('name');
        $user->lastname=$datos->input('lastname');
        $user->email=$datos->input('email');
        $user->domicilio=$datos->input('domicilio');
        $user->birthday=$datos->input('birthday');
        $user->sexo=$datos->input('sexo');
        $user->password=bcrypt($datos->input('password'));
        $user->save();

    
    Mail::send('admin.emails', ['user' => $user] ,function($message) use ($user) {
        $message->from('rfmendozam@gmail.com','Luxury watches');
        $message->to($user->email,$user->name)
        ->subject('Bienvenido');
    });
       
        return redirect('registrarUsuarios');
        // return redirect('consultarUsuarios');

    }
public function consultarUsuarios(){
        $user = DB::table('users')->paginate(8);
        return view('admin.consultarUsuarios', compact('user'));
    }
public function eliminarUsuario($id){
        $user=User::find($id);
        $user->delete();

        return redirect('consultarUsuarios');
    }

public function editarUsuarios($id){
            $user=User::find($id);
            return view('admin.editarUsuarios', compact('user'));
    }

public function actualizarUsuario(Request $datos, $id){
        $user=User::find($id);
        $user->name=$datos->input('name');
        $user->lastname=$datos->input('lastname');
        $user->email=$datos->input('email');
        $user->domicilio=$datos->input('domicilio');
        $user->birthday=$datos->input('birthday');
        $user->sexo=$datos->input('sexo');
        $user->password=bcrypt($datos->input('password'));
        $user->save();

        return Redirect('/consultarUsuarios');
    }

// public function PDFUsuario(){
//         $user=User::all();
//         $vista=view('admin.UsuariosPDF', compact('user'));
//         $dompdf=\App::make('dompdf.wrapper');
//         $dompdf->loadHTML($vista);
//         return $dompdf->stream('ListaUsuarios.pdf');
//     }


}
