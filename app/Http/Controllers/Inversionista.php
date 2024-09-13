<?php


namespace App\Http\Controllers;



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

use App\Models\User;



class Inversionista extends Controller
{
    public function Login(Request $request)
    {
        //$comparar = DB::table('users')->where('email',$request->correo )->first();
       
        $credentials = $request->only('correo', 'contrasena');
    
    $user = User::where('email', $request->correo)->first();
    //dd($user->password);
  
    if($user && password_verify($request->contrasena, $user->password)) {
        return view('dashboard');
    }
    else
    {
        return back()->with('status','Inicio de sesion Errado, Vuelva a intentar Nuevamente');
    }

        
    }

    public function index()
    {
       
            return view('index');
        
    }

    public function search()
    {
       
            return view('search');
        
    }

    public function users()
    {
        $usuarios=db::table('users')->where('status','1')->get();
        
            return view('users')->with(compact('usuarios'));
        
    }

    public function delete_users(request $request, $id)
    {
        $user = User::findOrFail($id);

    // Update the id_status column
    $user->update(['status' => '0']);

        
            return back()->with('status','Usuario Suspendido');
        
    }

    public function edit_users($id)
    {
        $usuario = user::findorfail($id);
        //dd($usuario);
            return view('edit_users',['usuario' => $usuario]);
        
    }

    public function update_users(request $request, $id)
    {
        
        $user = User::findOrFail($id);
        //dd($user->contrasena);
        if($request->nombre != $user->name && $request->nombre!="" ||  $request->nombre != $user->name && $request->nombre!=" " ||  $request->nombre != $user->name && $request->nombre!=null)
        {  
                //dd($request->nombre!="");
                $user->update(['name' => $request->nombre]);
            }
        if($request->apellido != $user->surname && $request->apellido != "" || $request->apellido != $user->surname && $request->apellido!=" "|| $request->apellido != $user->surname && $request->apellido!=null)
        {
                //dd("b");
                $user->update(['surname' => $request->apellido]);
        }
        if($request->correo != $user->email && $request->correo!="" || $request->correo != $user->email && $request->correo!=" " || $request->correo != $user->email && $request->correo!=null)
        {
                //dd("c");
                $user->update(['email' => $request->correo]);
        }
        if($request->rol != $user->role)
        {
                //dd("d");
                $user->update(['role' => $request->rol]);
        }
        if($request->contrasena != $user->password && $request->contrasena != "" || $request->contrasena != $user->password && $request->contrasena != " " && $request->contrasena != null || $request->contrasena != $user->password && $request->contrasena != null)
        {
                //dd($request->contrasena != $user->password && $request->contrasena != null);
                $user->update(['password' => $request->contrasena]);
        }
        if($request->file != $user->file && $request->file != "" || $request->file != $user->file && $request->file != null)
        {
                //dd("f");
                $imagen = $request->file("foto");                        
                        $nombreimagen = $request->correo;
                        $ruta = "images/usuario/fotos/";            
                        $imagen->move($ruta,$nombreimagen);   
                        
                $user->update(['file' => $ruta.$nombreimagen]);
        }
        
        

  
        
            return redirect()->to('users')->with('status','Usuario Modificado');
        
    }

    public function users_register(Request $request)
    {
        
        $validar=strtolower($request->correo);
       // dd($request);
        $comparar = DB::table('users')->where('email',$validar )->first();
       
      
        if($comparar)
        {
            return back()->with('status','Este Usuario Ya Se Encuentra Registrado, Por Favor Verificar');
        }
        
        else
        {
                $registry = new User;
                if($request->File("foto")){

                        $imagen = $request->file("foto");                        
                        $nombreimagen = $request->correo;
                        $ruta = "images/usuario/fotos/";            
                        $imagen->move($ruta,$nombreimagen);   
                        $registry-> file = $ruta.$nombreimagen;
                        
                    }
                    if($request -> nombre && $request -> apellido && $request -> correo && $request -> contrasena && $request -> rol)
                    {
                    $registry -> name = $request -> nombre;
                    $registry -> surname = $request -> apellido;
                    $registry -> email  = $request -> correo;
                    $registry -> password  = $request -> contrasena;
                    $registry -> role  = $request -> rol;
                    
                    $registry  -> save();

            return back()->with('status','Usuario Registrado de Manera Exitosa');
                    }
                    else
                    {
                        return back()->with('status','Registro Incompleto,Faltan Datos Necesarios');
                    }
        }
       /* $request->user()->fill([
            'token' => Crypt::encryptString($request->token),
        ])->save();
        dd($request);
        return view(login);
*/
    }

    
    /*try {
        $decrypted = Crypt::decryptString($encryptedValue);
    } catch (DecryptException $e) {
        // ...
    }*/

    public function delegates()
    {
       
            return view('delegates');
        
    }
    public function configurations()
    {
       
            return view('configurations');
        
    }
    public function enterprises()
    {
       
            return view('enterprises');
        
    }
    public function previews()
    {
       
            return view('previews');
        
    }

    public function results()
    {
       
            return view('results');
        
    }
    public function stadistics()
    {
       
            return view('stadistics');
        
    }
    public function userpanel()
    {
       
            return view('Userpanel');
        
    }
    public function logout()
    {
       
            return view('logout');
        
    }


}
