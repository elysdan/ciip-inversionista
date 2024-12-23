<?php

namespace App\Http\Controllers;
use App\Http\Controllers\inversionista;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\bcrypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
Use PDF;
use Yajra\DataTables\Facades\DataTables;

use App\Models\User;
use App\Models\inversionistanatural;
use App\Models\redessocialesdelegado;
use App\Models\RedesSocialesempresa;
use App\Models\datosempresa;
use App\Models\nacionalidad;
use App\Models\pais;
use App\Models\contenidoempresa;
use App\Models\contenidorepresentante;
use App\Models\asociadorxempresasxrepresentante;
use App\Models\datosembajada;
use App\Models\sectors;
use App\Models\sector_empresa;
use App\Models\sector_fase;
use App\Models\logs;

class Sessions extends Controller
{
    public function Login(Request $request)
    {
        //$comparar = DB::table('users')->where('email',$request->correo )->first();
       
        $credentials = $request->only('correo', 'contrasena');
    
    $user = User::where('email', $request->correo)->first();
    //dd($user->password);
  
    if($user && password_verify($request->contrasena, $user->password)) {
        session()->put('usuario', $user);
        $this->logs(session('usuario')->id,'inicio de sesion','Login'); 
        if(session('usuario')->role==9 || session('usuario')->role > 3)
        {
            return view('dashboard')->with('status','Bienvenido');
        }
        else
        return view('search')->with('status','Bienvenido');
    }
    else
    {
       // $this->logs(session('usuario')->id,'Fallo inicio de sesion','login'); 
        return back()->with('status','Inicio de sesion Errado, Vuelva a intentar Nuevamente');
    }

        
    }

    public function index()
    {
           // $this->logs(session('usuario')->id,'Ingreso al Sistema','index'); 
            return view('index');
        
    }


    public function dashboard()
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','dashboard'); 
       if(session('usuario') && session('usuario')->role==9 || session('usuario') && session('usuario')->role > 3 ){
            return view('dashboard');
        }
        else
           // $this->logs(session('usuario')->id,'Redireccionamiento','dashboard'); 
        return view('search');
    }

     public function logout()
    {
      // $this->logs(session('usuario')->id,'Salida','logout');
        session()->forget('usuario');
        return $this->index();
        
    }
}

