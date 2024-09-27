<?php


namespace App\Http\Controllers;
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

use App\Models\User;
use App\Models\inversionistanatural;
use App\Models\redessocialesdelegado;
use App\Models\RedesSocialesempresa;
use App\Models\datosempresa;



class Inversionista extends Controller
{
    public function Login(Request $request)
    {
        //$comparar = DB::table('users')->where('email',$request->correo )->first();
       
        $credentials = $request->only('correo', 'contrasena');
    
    $user = User::where('email', $request->correo)->first();
    //dd($user->password);
  
    if($user && password_verify($request->contrasena, $user->password)) {
        session()->put('usuario', $user);
        if(session('usuario')->role==9 || session('usuario')->role==2)
        {
            return view('dashboard');
        }
        else
        return view('search');
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


    public function dashboard()
    {
       if(session('usuario') && session('usuario')->role==9 || session('usuario') && session('usuario')->role==2 ){
            return view('dashboard');
        }
        else
        return view('search');
    }

    public function search()
    {
        if(session('usuario')){
            return view('search');
        }
        else
        return view('index');
    }

    public function users()
    {
        if(session('usuario')){
        $usuarios=db::table('users')->get();
        
            return view('users')->with(compact('usuarios'));
        }
        else
        return view('index');
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
        //dd($request->file("foto"));
        
        $user = User::findOrFail($id);
        //dd($user->contrasena);
        if($user->status==1)
        {
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
        if($request->file("foto") != $user->file && $request->file("foto") != "" || $request->file("foto") != $user->file && $request->file("foto") != null)
        {
                //dd("f");
                $imagen = $request->file("foto");                        
                        $nombreimagen = $request->correo;
                        $ruta = "images/usuario/fotos/";            
                        $imagen->move($ruta,$nombreimagen);   
                        
                $user->update(['file' => $ruta.$nombreimagen]);
        }
    }
    else
    {
        $user->update(['status' => '1']);
    }
        
        

  
        
            return redirect()->to('users')->with('status','Usuario Modificado');
        
    }

    public function suspend_users($id)
    {
        //dd($request->file("foto"));
        
        $user = User::findOrFail($id);
        //dd($user->contrasena);
        if($user->status==1)
        {
            $user->update(['status' => '0']);
    }
    else
    {
        
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
        if(session('usuario') && session('usuario')->role==9 || session('usuario') && session('usuario')->role==2 ){
       $delegados=db::table('inversionista_naturals')->get();
            return view('delegates')->with(compact('delegados'));
        }
        else
        return view('index');

    }

    public function delegates_register(request $request)
    {
                //dd($request);
                $busqueda=db::table('users')->where('email',$request->correo)->select('id')->first();
                //dd($busqueda);
                $registry = new inversionistanatural;
                $registry -> user_id = $busqueda->id;
                $registry -> nombre = $request -> nombre;
                $registry -> apellido = $request -> apellido;
                $registry -> doc_identidad = $request -> cedula;
                $registry -> nacionalidad = $request -> nacionalidad;
                $registry -> fecha_nacimiento = $request-> fecha;
                $fechaNacimiento = $request->fecha;
$fechaNacimientoCarbon = Carbon::parse($fechaNacimiento);
$edad = $fechaNacimientoCarbon->age;

// Asignando la edad a un nuevo campo
$registry->edad = $edad;
                $registry -> estado_civil = $request -> estado;
                $registry -> sexo = $request -> genero;
                $registry -> direccion = $request -> direccion;
                $registry -> telefono = $request -> telefono;
                $registry -> email = $request -> correo;
                //dd($registry);
                $registry  -> save();
            return back();
        
    }

    public function edit_delegates($id)
    {
        $delegado = inversionistanatural::findorfail($id);
        
        //dd($delegado);
            return view('edit_delegates',['delegado' => $delegado]);
        
    }

    public function update_delegates(request $request, $id)
    {
       
        
        $delegados = inversionistanatural::findOrFail($id);
        $users = user::findorfail($id);
        //dd($delegados);
        if($request->nombre != $delegados->nombre && $request->nombre!="" ||  $request->nombre != $delegados->nombre && $request->nombre!=" " ||  $request->nombre != $delegados->nombre && $request->nombre!=null)
        {  
                //dd("a");
                $delegados->update(['nombre' => $request->nombre]);
            }
        if($request->apellido != $delegados->apellido && $request->apellido != "" || $request->apellido != $delegados->apellido && $request->apellido!=" "|| $request->apellido != $delegados->apellido && $request->apellido!=null)
        {
                //dd("b");
                $delegados->update(['apellido' => $request->apellido]);
        }
        if($request->cedula != $delegados->doc_identidad && $request->cedula!="" || $request->cedula != $delegados->doc_identidad && $request->cedula!=" " || $request->cedula != $delegados->doc_identidad && $request->cedula!=null)
        {
                //dd("c");
                $delegados->update(['doc_identidad' => $request->cedula]);
        }
        if($request->nacionalidad != $delegados->nacionalidad)
        {
                //dd("d");
                $delegados->update(['nacionalidad' => $request->nacionalidad]);
        }
        if($request->fecha != $delegados->fecha_nacimiento)
        {
                //dd("e");
                $delegados->update(['fecha_nacimiento' => $request->fecha]);
        }
        $fechaNacimiento = $request->fecha;
$fechaNacimientoCarbon = Carbon::parse($fechaNacimiento);
$edad = $fechaNacimientoCarbon->age;
        if($edad != $delegados->edad)
        {
                //dd("f");
                $delegados->update(['edad' => $edad]);
        }

        if($request->estado != $delegados->estado_civil)
        {
                //dd("g");
                $delegados->update(['estado_civil' => $request->estado]);
        }

        if($request->genero != $delegados->sexo)
        {
                //dd("h");
                $delegados->update(['sexo' => $request->genero]);
        }
        
        if($request->direccion != $delegados->direccion && $request->direccion != "" || $request->direccion != $delegados->direccion && $request->direccion != " " && $request->direccion != null || $request->direccion != $delegados->direccion && $request->direccion != null)
        {
                //dd("i");
                $delegados->update(['direccion' => $request->direccion]);
        }

        if($request->telefono != $delegados->telefono && $request->telefono != "" || $request->telefono != $delegados->telefono && $request->telefono != " " && $request->telefono != null || $request->telefono != $delegados->telefono && $request->telefono != null)
        {
                //dd("j");
                $delegados->update(['telefono' => $request->telefono]);
        }
        if($request->correo != $delegados->email && $request->correo != "" || $request->correo != $delegados->email && $request->correo != " " && $request->correo != null || $request->correo != $delegados->email && $request->correo != null)
        {
                //dd("k");
                $delegados->update(['email' => $request->correo]);
                $users->update(['email' => $request->correo]);
        }
        
        
       
       
        
        
        

  
        
            return redirect()->to('delegates')->with('status','Datos Modificado');
        
    }


    public function delete_delegates(request $request, $id)
    {
        $user = inversionistanatural::findOrFail($id);

    // Update the id_status column
    $user->delete();

        
            return back()->with('status','Usuario Suspendido');
        
    }

    public function add_socialweb($id)
    {
        $delegado = inversionistanatural::findorfail($id);

        $redes=db::table('redes_sociales_delegados')->join('rrss', 'rrss.id', '=' ,'redes_sociales_delegados.site')->select(
            'redes_sociales_delegados.id as id',
             'redes_sociales_delegados.site as site',
              'redes_sociales_delegados.username as username',
              'rrss.red as red',

    )->where('delegate_id',$id)->get();
        
        //dd($red);
            return view('add_socialweb',['delegado' => $delegado],['redes' => $redes]);
        
    }
    public function web_register(request $request)
    {

                
                $registry = new redessocialesdelegado;
                
                $registry -> site = $request->red;
                $registry -> username = $request->usuario;
                $registry -> delegate_id = $request->id;
                //dd($registry);
                $registry -> save();
                
        
        //dd($request);
            return back()->with('status','funciona');
        
    }

    public function edit_web($id)
    {
        $delegado = redessocialesdelegado::findorfail($id);
        //dd($delegado);
            return view('edit_web',['delegado' => $delegado]);
        
    }

       public function update_web_inner(request $request,$id)
    {
        $delegados = redessocialesdelegado::findorfail($id);

         $delegado = redessocialesdelegado::findorfail($id);
            $peticion=$delegado->delegate_id;
            //dd($request);

        if($request->usuario != $delegados->username && $request->usuario!="" ||  $request->usuario != $delegados->username && $request->usuario!=" " ||  $request->usuario != $delegados->username && $request->usuario!=null)
        {  
                //dd("a");
                $delegados->update(['username' => $request->usuario]);
            }

             if($request->red != $delegados->site && $request->red!="" ||  $request->red != $delegados->site && $request->red!=" " ||  $request->red != $delegados->site && $request->red!=null)
        {  
                //dd("B");
                $delegados->update(['site' => $request->red]);
            }
        //dd($delegado);

            return $this->add_socialweb($peticion)->with('status','Red Social Modificada');
        
    }


    public function delete_web_register( $id)
    {

                
               $red = redessocialesdelegado::findOrFail($id);

    // Update the id_status column
    $red->delete();

        
            return back()->with('status','Red Social Eliminada');
        
    }

    public function configurations()
    {
        if(session('usuario')){
            return view('configurations');
        }
        else
        return $this->index();

    }
    public function enterprises()
    {
        if(session('usuario') && session('usuario')->role==9 || session('usuario') && session('usuario')->role==2 ){

            $empresas=db::table('datos_empresas')->get();
            return view('enterprises',['empresas'=>$empresas]);
        }
        else
        return $this->dashboard();
    }

    public function enterprises_register(request $request)
    {
        
        $registry = new datosempresa;
        if($request->File("foto")){

                        $imagen = $request->file("foto");                        
                        $nombreimagen = $request->rif;
                        $ruta = "images/usuario/fotos/";            
                        $imagen->move($ruta,$nombreimagen);   
                        $registry-> foto = $ruta.$nombreimagen;
                        
                    }
        $registry -> razonsocial = $request->razon;
        $registry -> rif = $request->rif;
        $registry -> identificador = $request->identificador;
        $registry -> pais_origen = $request->lorigen;
        $registry -> lregistro = $request->lregistro;
        $registry -> direccion = $request->direccion;
        $registry ->save();
        //dd($registry);
        return back()->with('status','Empresa Registrada');
    }

    public function delete_enterprises($id)
    {
        
         
               $empresa = datosempresa::findOrFail($id);

    // Update the id_status column
    $empresa->update(['status' => 0]);

        
            return back()->with('status','Empresa Eliminada');
    }

    public function edit_enterprises($id)
    {
        $empresa = datosempresa::findorfail($id);

        
        //dd($red);
            return view('edit_enterprises',['empresa' => $empresa]);
        
    }

     public function update_enterprises(request $request,$id)
    {
        $empresas = datosempresa::findorfail($id);

            //dd($request);
             //dd($peticion);
if($empresas->status==1)
{
        if($request->razon != $empresas->razonsocial && $request->razon!="" ||  $request->razon != $empresas->razonsocial && $request->razon!=" " ||  $request->razon != $empresas->razonsocial && $request->razon!=null)
        {  
                //dd("a");
                $empresas->update(['razonsocial' => $request->razon]);
            }


        if($request->identificador != $empresas->identificador && $request->identificador!="" ||  $request->identificador != $empresas->identificador && $request->identificador!=" " ||  $request->identificador != $empresas->identificador && $request->identificador!=null)
        {  
               // dd("b");
                $empresas->update(['identificador' => $request->identificador]);
            }


        if($request->rif != $empresas->rif && $request->rif!="" ||  $request->rif != $empresas->rif && $request->rif!=" " ||  $request->rif != $empresas->rif && $request->rif!=null)
        {  
                //dd("c");
                $empresas->update(['rif' => $request->rif]);
            }


        if($request->lorigen != $empresas->pais_origen && $request->lorigen!="" ||  $request->lorigen != $empresas->pais_origen && $request->lorigen!=" " ||  $request->lorigen != $empresas->pais_origen && $request->lorigen!=null)
        {  
               // dd("d");
                $empresas->update(['pais_origen' => $request->lorigen]);
            }


        if($request->lregistro != $empresas->lregistro && $request->lregistro!="" ||  $request->lregistro != $empresas->lregistro && $request->lregistro!=" " ||  $request->lregistro != $empresas->lregistro && $request->lregistro!=null)
        {  
               // dd("e");
                $empresas->update(['lregistro' => $request->lregistro]);
            }


        if($request->direccion != $empresas->direccion && $request->direccion!="" ||  $request->direccion != $empresas->direccion && $request->direccion!=" " ||  $request->direccion != $empresas->direccion && $request->direccion!=null)
        {  
               // dd("f");
                $empresas->update(['direccion' => $request->direccion]);
            }

             if($request->file("foto") != $empresas->foto && $request->file("foto") != "" || $request->file("foto") != $empresas->foto && $request->file("foto") != null)
        {
              //  dd("g");
                $imagen = $request->file("foto");                        
                        $nombreimagen = $request->rif;
                        $ruta = "images/usuario/fotos/";            
                        $imagen->move($ruta,$nombreimagen);   
                        
                $empresas->update(['foto' => $ruta.$nombreimagen]);
        }
    }
    else
    {
        $empresas->update(['status' => '1']);

    }
        //dd($empresa);

            return $this->enterprises()->with('status','Empresa Modificada');
    
        
    }

public function suspend_enterprises($id)
    {
        $empresas = datosempresa::findorfail($id);

            //dd($request);
             //dd($peticion);
if($empresas->status==1)
{
         $empresas->update(['status' => '0']);
    }
    
        //dd($empresa);

            return $this->enterprises()->with('status','Empresa Modificada');
    
        
    }


public function add_web($id)
    {
        $empresa = datosempresa::findorfail($id);

        $redes=db::table('redes_sociales_empresas')->join('rrss', 'rrss.id', '=' ,'redes_sociales_empresas.site')->select(
            'redes_sociales_empresas.id as id',
             'redes_sociales_empresas.site as site',
              'redes_sociales_empresas.username as username',
              'rrss.red as red',

    )->where('enterprise_id',$id)->get();
        
        //dd($red);
            return view('add_social_enterprises',['empresa' => $empresa],['redes' => $redes]);
        
    }

    public function web_register_enterprise(request $request)
    {

                
                $registry = new redessocialesempresa;
                
                $registry -> site = $request->red;
                $registry -> username = $request->usuario;
                $registry -> enterprise_id = $request->id;
                //dd($registry);
                $registry -> save();
                
        
        //dd($request);
            return back()->with('status','funciona');
        
    }


    public function edit_web_enterprise($id)
    {
        $delegado = redessocialesempresa::findorfail($id);
        //dd($delegado);
            return view('edit_web_enterprise',['delegado' => $delegado]);
        
    }


    public function update_web_enterprise_inner(request $request,$id)
    {
        $empresas = redessocialesempresa::findorfail($id);

         $empresa = redessocialesempresa::findorfail($id);

            $peticion=$empresa->enterprise_id;
            //dd($request);
             //dd($peticion);

        if($request->usuario != $empresas->username && $request->usuario!="" ||  $request->usuario != $empresas->username && $request->usuario!=" " ||  $request->usuario != $empresas->username && $request->usuario!=null)
        {  
                //dd("a");
                $empresas->update(['username' => $request->usuario]);
            }

             if($request->red != $empresas->site && $request->red!="" ||  $request->red != $empresas->site && $request->red!=" " ||  $request->red != $empresas->site && $request->red!=null)
        {  
                //dd("B");
                $empresas->update(['site' => $request->red]);
            }
        //dd($empresa);

            return $this->add_web($peticion)->with('status','Red Social Modificada');
        
    }


    public function delete_web_enterprise_register( $id)
    {

                
               $red = redessocialesempresa::findorFail($id);
               $peticion=$red->enterprise_id;
               //dd($red);
    // Update the id_status column
    $red->delete();

        
            return $this->add_web($peticion)->with('status','Red Social Eliminada');
        
    }




    public function previews($id)
    {
        if(session('usuario')){

            $previa=datosempresa::findorFail($id);

            $twitter=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')->where('datos_empresas.id',$id)->where('red','twitter')
            ->select('redes_sociales_empresas.username as twitter')->first();

           

             $facebook=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')
            ->select('redes_sociales_empresas.username as facebook')->where('datos_empresas.id',$id)->where('red','facebook')->first();

             $instagram=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')
            ->select('redes_sociales_empresas.username as instagram')->where('datos_empresas.id',$id)->where('red','instagram')->first();

             $linkedin=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')
            ->select('redes_sociales_empresas.username as linkedin')->where('datos_empresas.id',$id)->where('red','linkedin')->first();

             $telefono=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')
            ->select('redes_sociales_empresas.username as telefono')->where('datos_empresas.id',$id)->where('red','telefono')->first();

              $correo=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')
            ->select('redes_sociales_empresas.username as correo')->where('datos_empresas.id',$id)->where('red','correo')->first();

        

            if($twitter==null)
            {
                $twitter=0;
            }
            if($instagram==null)
            {
                $instagram= 0;
            }
            if($linkedin==null)
            {
                $linkedin=0;
            }
            if($telefono==null)
            {
                $telefono=0;
            }
            if($correo==null)
            {
                $correo=0;
            }
            if($facebook==null)
            {
                $facebook=0;
            }



  //dd($twitter);




            return view('previews' ,['instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
        }
        else
        return $this->index();
    }

    public function results()
    {
        if(session('usuario')){
            return view('results');
        }
        else
        return $this->index();
    }
    public function stadistics()
    {
        if(session('usuario') && session('usuario')->role==9 || session('usuario') && session('usuario')->role==2){
            return view('stadistics');
        }
        else
        return $this->index();

    }
    public function userpanel()
    {
        if(session('usuario')){
            return view('Userpanel');
        }
        else
        return $this->index();
    }
    public function logout()
    {
       
        session()->forget('usuario');
        return $this->index();
        
    }


}