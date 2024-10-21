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
Use PDF;

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
        if(session('usuario')->role==9 || session('usuario')->role > 3)
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
       if(session('usuario') && session('usuario')->role==9 || session('usuario') && session('usuario')->role > 3 ){
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


      public function result(request $request)
    {// dd(db::table('inversionista_naturals')->where('email',$request->busqueda)->first() == null);
        if(db::table('inversionista_naturals')->where('email',$request->busqueda)->first()!=null)

{
    
             $resultado=db::table('inversionista_naturals')
             ->where('inversionista_naturals.email',$request->busqueda)
            ->join('nacionalidad','nacionalidad.id','=','inversionista_naturals.nacionalidad')
            ->join('contenido_representantes','contenido_representantes.delegate_id','=','inversionista_naturals.id')
           ->join('users as elaborado','elaborado.id','=','contenido_representantes.elaborado')
           ->leftjoin('users as revisado','revisado.id','=','contenido_representantes.revisado')
           ->leftjoin('users as certificado','certificado.id','=','contenido_representantes.certificado')
           ->leftjoin('users as aprobado','aprobado.id','=','contenido_representantes.aprobado')
             
             ->select(
            'inversionista_naturals.*',
            'nacionalidad.GENTILICIO_NAC as GENTILICIO_NAC',
             'inversionista_naturals.*',
            'contenido_representantes.*',
            'contenido_representantes.id as ide',
              'contenido_representantes.status as estatuscontent',
            'elaborado.name as name',
            'elaborado.surname as surname',
            'revisado.name as namerev',
            'revisado.surname as surnamerev',
            'certificado.name as namecert',
            'certificado.surname as surnamecert',
            'aprobado.name as nameapro',
            'aprobado.surname as surnameapro',
            'contenido_representantes.updated_at as fecha'
        )
             
           ->OrderBy('contenido_representantes.created_at','desc')
             ->first();
            //dd($previa);

             $versiones=db::table('inversionista_naturals')
              ->join('contenido_representantes','contenido_representantes.delegate_id','=','inversionista_naturals.id')
             ->where('inversionista_naturals.doc_identidad',$request->busqueda)->get();


$twitter=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')->where('inversionista_naturals.email',$request->busqueda)->where('red','twitter')
            ->select('redes_sociales_delegados.username as twitter')->first();

           

             $facebook=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as facebook')->where('inversionista_naturals.email',$request->busqueda)->where('red','facebook')->first();

             $instagram=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as instagram')->where('inversionista_naturals.email',$request->busqueda)->where('red','instagram')->first();

             $linkedin=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as linkedin')->where('inversionista_naturals.email',$request->busqueda)->where('red','linkedin')->first();

             $telefono=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as telefono')->where('inversionista_naturals.email',$request->busqueda)->where('red','telefono')->first();

              $correo=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as correo')->where('inversionista_naturals.email',$request->busqueda)->where('red','correo')->first();

        

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



        //dd($resultado);
        return view('elaborador_delegados',['versiones'=> $versiones,'previa'=> $resultado,'instagram' =>$instagram,'twitter' =>$twitter,'facebook' =>$facebook ,'linkedin' =>$linkedin,'correo' =>$correo,'telefono' =>$telefono]);
}       
elseif (db::table('inversionista_naturals')->where('doc_identidad',$request->busqueda)->first()!=null) {
  $resultado=db::table('inversionista_naturals')
             ->where('inversionista_naturals.doc_identidad',$request->busqueda)
            ->join('nacionalidad','nacionalidad.id','=','inversionista_naturals.nacionalidad')
            ->join('contenido_representantes','contenido_representantes.delegate_id','=','inversionista_naturals.id')
           ->join('users as elaborado','elaborado.id','=','contenido_representantes.elaborado')
           ->leftjoin('users as revisado','revisado.id','=','contenido_representantes.revisado')
           ->leftjoin('users as certificado','certificado.id','=','contenido_representantes.certificado')
           ->leftjoin('users as aprobado','aprobado.id','=','contenido_representantes.aprobado')
             
             ->select(
            'inversionista_naturals.*',
            'nacionalidad.GENTILICIO_NAC as GENTILICIO_NAC',
             'inversionista_naturals.*',
            'contenido_representantes.*',
            'contenido_representantes.id as ide',
              'contenido_representantes.status as estatuscontent',
            'elaborado.name as name',
            'elaborado.surname as surname',
            'revisado.name as namerev',
            'revisado.surname as surnamerev',
            'certificado.name as namecert',
            'certificado.surname as surnamecert',
            'aprobado.name as nameapro',
            'aprobado.surname as surnameapro',
            'contenido_representantes.updated_at as fecha'
        )
             
           ->OrderBy('contenido_representantes.created_at','desc')
             ->first();
            //dd($previa);

             $versiones=db::table('inversionista_naturals')
              ->join('contenido_representantes','contenido_representantes.delegate_id','=','inversionista_naturals.id')
             ->where('inversionista_naturals.doc_identidad',$request->busqueda)->get();
$twitter=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')->where('inversionista_naturals.doc_identidad',$request->busqueda)->where('red','twitter')
            ->select('redes_sociales_delegados.username as twitter')->first();

           

             $facebook=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as facebook')->where('inversionista_naturals.doc_identidad',$request->busqueda)->where('red','facebook')->first();

             $instagram=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as instagram')->where('inversionista_naturals.doc_identidad',$request->busqueda)->where('red','instagram')->first();

             $linkedin=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as linkedin')->where('inversionista_naturals.doc_identidad',$request->busqueda)->where('red','linkedin')->first();

             $telefono=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as telefono')->where('inversionista_naturals.doc_identidad',$request->busqueda)->where('red','telefono')->first();

              $correo=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as correo')->where('inversionista_naturals.doc_identidad',$request->busqueda)->where('red','correo')->first();

        

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



        //dd($resultado);
        return view('elaborador_delegados',['versiones'=> $versiones,'previa'=> $resultado,'instagram' =>$instagram,'twitter' =>$twitter,'facebook' =>$facebook ,'linkedin' =>$linkedin,'correo' =>$correo,'telefono' =>$telefono]);
}
elseif(db::table('datos_empresas')->where('rif',$request->busqueda)->first()!=null)
{
   
            $previa=DB::table('datos_empresas') ->where('datos_empresas.rif',$request->busqueda)
            ->leftjoin('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->leftjoin('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->leftjoin('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->LEFTjoin('users as elaborado','elaborado.id','=','contenido_empresas.elaborado')
            ->leftjoin('users as revisado','revisado.id','=','contenido_empresas.revisado')
            ->leftjoin('users as certificado','certificado.id','=','contenido_empresas.certificado')
            ->leftjoin('users as aprobado','aprobado.id','=','contenido_empresas.aprobado')

            ->select(
            'datos_empresas.*',
            'contenido_empresas.*',
            'contenido_empresas.id as ide',
              'contenido_empresas.status as estatuscontent',
            'elaborado.name as name',
            'elaborado.surname as surname',
            'revisado.name as namerev',
            'revisado.surname as surnamerev',
            'certificado.name as namecert',
            'certificado.surname as surnamecert',
            'aprobado.name as nameapro',
            'aprobado.surname as surnameapro',
            'contenido_empresas.updated_at as fecha',
            'origen.paisnombre as pais_origen',
            'registro.paisnombre as lregistro')
           ->OrderBy('contenido_empresas.created_at','desc')->first();


           $versiones=db::table('datos_empresas')
              ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
             ->where('datos_empresas.rif',$request->busqueda)->get();
            //dd($previa);
            $twitter=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')->where('datos_empresas.rif',$request->busqueda)->where('red','twitter')
            ->select('redes_sociales_empresas.username as twitter')->first();

           

             $facebook=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')
            ->select('redes_sociales_empresas.username as facebook')->where('datos_empresas.rif',$request->busqueda)->where('red','facebook')->first();

             $instagram=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')
            ->select('redes_sociales_empresas.username as instagram')->where('datos_empresas.rif',$request->busqueda)->where('red','instagram')->first();

             $linkedin=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')
            ->select('redes_sociales_empresas.username as linkedin')->where('datos_empresas.rif',$request->busqueda)->where('red','linkedin')->first();

             $telefono=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')
            ->select('redes_sociales_empresas.username as telefono')->where('datos_empresas.rif',$request->busqueda)->where('red','telefono')->first();

              $correo=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')
            ->select('redes_sociales_empresas.username as correo')->where('datos_empresas.rif',$request->busqueda)->where('red','correo')->first();

        

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




            return view('elaborador' ,['versiones' => $versiones,'instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
}
else
    return back()->with('status','Dato no encontrado');
    }

    public function users()
    {
        if(session('usuario') ){
            if(session('usuario')->role >= 8)
        {

            $usuarios=db::table('users')->OrderBy('role','desc')->OrderBy('id','asc')->get();}
    else
      {

        $usuarios=db::table('users')->where('role', '!=', 8)->where('role', '!=', 9)->where('status', '!=', 0)->OrderBy('role','desc')->OrderBy('id','asc')->get();
           //dd(session('usuario')->role );
}
        $uc=db::table('users')->count();
        $nacionalidad=db::table('nacionalidad')->get();

        
            return view('users',['usuarios' => $usuarios,'nacionalidad' => $nacionalidad,'uc' => $uc]);
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
        
        

  
        
            return back()->with('status','Usuario Modificado');
        
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
        if(session('usuario')){
           
         // dd(session('usuario')->role);

        if(session('usuario')->role >= 8)
        {
       $delegados=db::table('inversionista_naturals')
       ->join('nacionalidad','inversionista_naturals.nacionalidad','=','nacionalidad.id')
       ->join('generos','inversionista_naturals.sexo','=','generos.id')
       ->join('estados_civiles','inversionista_naturals.estado_civil','=','estados_civiles.id')
       ->leftjoin('contenido_representantes','inversionista_naturals.id','=','contenido_representantes.delegate_id')
       
       ->select(
            'inversionista_naturals.*',
            'nacionalidad.GENTILICIO_NAC as GENTILICIO_NAC',
            'generos.genero as sexo',
           DB::raw('count(case when contenido_representantes.status <> 0 then 1 else null end) as visualizar'),
            'estados_civiles.estado as estado_civil')
       ->groupBy(
        'inversionista_naturals.id',
        'nacionalidad.GENTILICIO_NAC',
        'generos.genero',
        'estados_civiles.estado')->get();
        $dc=db::table('inversionista_naturals')->count();

   }
       else
       {
        $delegados=db::table('inversionista_naturals')->join('nacionalidad','inversionista_naturals.nacionalidad','=','nacionalidad.id')
       ->join('generos','inversionista_naturals.sexo','=','generos.id')
       ->join('estados_civiles','inversionista_naturals.estado_civil','=','estados_civiles.id')
       ->leftjoin('contenido_representantes','inversionista_naturals.id','=','contenido_representantes.delegate_id')
       
       ->select(
            'inversionista_naturals.*',
            'nacionalidad.GENTILICIO_NAC as GENTILICIO_NAC',
            'generos.genero as sexo',
           DB::raw('count(case when contenido_representantes.status <> 0 then 1 else null end) as visualizar'),
            'estados_civiles.estado as estado_civil')->where('inversionista_naturals.status', 1)->groupBy(
        'inversionista_naturals.id',
        'nacionalidad.GENTILICIO_NAC',
        'generos.genero',
        'estados_civiles.estado')->get();
        $dc=db::table('inversionista_naturals')->where('inversionista_naturals.status', 1)->count();
       }

     // dd($delegados);
       $generador=DB::table('inversionista_naturals')
            ->join('contenido_representantes','contenido_representantes.delegate_id','=','inversionista_naturals.id')
            
            
            ->count()
           ;

   
       
       $nacionalidad=db::table('nacionalidad')->get();
       $estados_civiles=db::table('estados_civiles')->get();
       $generos=db::table('generos')->get();
        //dd($delegados);
            return view('delegates',['delegados' => $delegados,'nacionalidad' => $nacionalidad,'generador' => $generador,'estados_civiles' => $estados_civiles,'generos' => $generos,'dc' => $dc]);
        }
        else
        return view('index');

    }

    public function delegates_register(request $request)
    {
                //dd($request->hasfile("foto"));

              //  $busqueda=db::table('users')->where('email',$request->correo)->select('id')->first();
                //dd($busqueda);
                $registry = new inversionistanatural;

                if($request->File("foto")){

                        $imagen = $request->file("foto");                        
                        $nombreimagen = $request->cedula;
                        $ruta = "images/usuario/fotos/";            
                        $imagen->move($ruta,$nombreimagen);   
                        $registry-> foto = $ruta.$nombreimagen;
                        
                    }
               
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
        $nacionalidad=db::table('nacionalidad')->get();

       $estados_civiles=db::table('estados_civiles')->get();
       $generos=db::table('generos')->get();
        
        //dd($delegado);
            return view('edit_delegates',['delegado' => $delegado,'nacionalidad' => $nacionalidad,'estados_civiles'=>$estados_civiles,'generos'=>$generos]);
        
    }

    public function suspend_delegates($id)
    {
        $delegados = inversionistanatural::findorfail($id);

            //dd($request);
             //dd($peticion);
if($delegados->status==1)
{
         $delegados->update(['status' => '0']);
        
    }
    elseif($delegados->status==0)
{
         $delegados->update(['status' => '1']);
        
    }
    
        //dd($empresa);

             return back()->with('status','Representante Modificado');
    
        
    }

    public function update_delegates(request $request, $id)
    {
       
        
        $delegados = inversionistanatural::findOrFail($id);

        $users = user::find($id);
        //dd($users);
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
        
        
       if($request->file("foto") != $delegados->foto && $request->file("foto") != "" || $request->file("foto") != $delegados->foto && $request->file("foto") != null)
        {
              //  dd("g");
                $imagen = $request->file("foto");                        
                        $nombreimagen = $request->cedula;
                        $ruta = "images/usuario/fotos/";            
                        $imagen->move($ruta,$nombreimagen);   
                        
                $delegados->update(['foto' => $ruta.$nombreimagen]);
        }
       
        
        
        

  
        
            return redirect()->route('delegates')->with('status','Datos Modificado');
        
    }


    public function delete_delegates(request $request, $id)
    {
        $user = inversionistanatural::findOrFail($id);

    // Update the id_status column
    $user->update(['status' => '0']);

        
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
        $sitios=db::table('rrss')->get();
        
      //  dd($sitios);
            return view('add_socialweb',['delegado' => $delegado,'redes' => $redes,'sitios' => $sitios]);
        
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
            return back()->with('status','Sitio Web Registrado');
        
    }

    public function edit_web($id)
    {
        $delegado = redessocialesdelegado::findorfail($id);
        //dd($delegado);
         $sitios=db::table('rrss')->get();
            return view('edit_web',['delegado' => $delegado,'sitios' =>$sitios]);
        
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

            return redirect()->route('add_socialweb', $peticion)->with('status','Red Social Modificada');
        
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
        if(session('usuario')){
            $dc=db::table('datos_empresas')->count();
            if(session('usuario')->role >= 8){

                $empresas=DB::table('datos_empresas')
            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->join('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->leftjoin('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->leftjoin('datos_embajadas','datos_embajadas.enterprise_id','=','datos_empresas.id')
            
            ->select(
            'datos_empresas.*',
            'origen.paisnombre as pais_origen',
            DB::raw('count(case when contenido_empresas.status <> 0 then 1 else null end) as visualizar'),
            DB::raw('count(datos_embajadas) as visualizare'),
            'registro.paisnombre as lregistro')
            ->groupBy('datos_empresas.id','origen.paisnombre','registro.paisnombre')
            ->OrderBy('id')
           ->get();
           //dd($empresas);

           $generador=DB::table('datos_empresas')
            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            
            
            ->count()
           ;
           //dd($empresas);

            }
            else
            {
                     $empresas=DB::table('datos_empresas')
            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->join('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->leftjoin('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->leftjoin('datos_embajadas','datos_embajadas.enterprise_id','=','datos_empresas.id')
            
            ->select(
            'datos_empresas.*',
            'origen.paisnombre as pais_origen',
            DB::raw('count(case when contenido_empresas.status <> 0 then 1 else null end) as visualizar'),
            DB::raw('count(datos_embajadas) as visualizare'),
            'registro.paisnombre as lregistro')
             ->where('datos_empresas.status',1)
            ->groupBy('datos_empresas.id','origen.paisnombre','registro.paisnombre')
            ->OrderBy('id')
           
           
            
           ->get();

           $generador=DB::table('datos_empresas')
            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->where('datos_empresas.status',1)
            
            
            ->count()
           ;
            }
            
            $pais=db::table('pais')->OrderBy('paisnombre')->get();
            //dd($generador);
            return view('enterprises',['empresas'=>$empresas,'pais'=>$pais,'generador'=>$generador,'dc' => $dc]);
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
         $registry -> correo = $request->correo;
          $registry -> telefono = $request->telefono;
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
        $pais=db::table('pais')->OrderBy('paisnombre')->get();
        
        //dd($red);
            return view('edit_enterprises',['empresa' => $empresa],['pais' => $pais]);
        
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

             if($request->correo != $empresas->correo && $request->correo!="" ||  $request->correo != $empresas->correo && $request->correo!=" " ||  $request->correo != $empresas->correo && $request->correo!=null)
        {  
               // dd("f");
                $empresas->update(['correo' => $request->correo]);
            }

             if($request->telefono != $empresas->telefono && $request->telefono!="" ||  $request->telefono != $empresas->telefono && $request->telefono!=" " ||  $request->telefono != $empresas->telefono && $request->telefono!=null)
        {  
               // dd("f");
                $empresas->update(['telefono' => $request->telefono]);
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

            return redirect()->route('enterprises')->with('status','Empresa Modificada');
    
        
    }

public function suspend_enterprises($id)
    {
        $empresas = datosempresa::findorfail($id);

            //dd($request);
             //dd($peticion);
        if($empresas->status==0)
{
         $empresas->update(['status' => '1']);
    }
elseif($empresas->status==1)
{
         $empresas->update(['status' => '0']);
    }
    
    
        //dd($empresa);

            return back()->with('status','Empresa Modificada');
    
        
    }

 public function asociador_eliminar( $id)
    {

                
               $delegados = asociadorxempresasxrepresentante::findorFail($id);
               $peticion=$delegados->enterprise_id;
               //dd($red);
    // Update the id_status column
    $delegados->delete();

        
            return redirect()->route('asociador', $peticion)->with('status','Delegado Eliminado');
        
    }


    public function asociador_modificar($id)
    {

       // dd();
        $empresa = asociadorxempresasxrepresentante::findorfail($id);
        //dd($delegado);
          $delegados=db::table('inversionista_naturals')->get();
            return view('asociador_modificar',['delegados' => $delegados,'empresa' =>$empresa]);
        
    }

       public function asociador_modificador(request $request,$id)
    {
        $empresas = asociadorxempresasxrepresentante::findorfail($id);

         
 $peticion=$empresas->enterprise_id;
          

        if($request->delegate_id != $empresas->delegate_id && $request->delegate_id!="" ||  $request->delegate_id != $empresas->delegate_id && $request->delegate_id!=" " ||  $request->delegate_id != $empresas->delegate_id && $request->delegate_id!=null)
        {  
                //dd("a");
                $empresas->update(['delegate_id' => $request->delegate_id]);
            }

             if($request->type != $empresas->type && $request->type!="" ||  $request->type != $empresas->type && $request->type!=" " ||  $request->type != $empresas->type && $request->type!=null)
        {  
                //dd("B");
                $empresas->update(['type' => $request->type]);
            }
        //dd($empresa);

            return redirect()->route('asociador', $peticion)->with('status','Red Social Modificada');
        
    }

public function asociador($id)
    {
        $empresa = datosempresa::findorfail($id);
       // dD($empresa);

        $representantes=db::table('asociador_empresas_representantes')
    ->join('inversionista_naturals', 'inversionista_naturals.id', '=' ,'asociador_empresas_representantes.delegate_id')
    ->select('asociador_empresas_representantes.*',
        'inversionista_naturals.*','asociador_empresas_representantes.id as id')
    ->where('enterprise_id',$id)->OrderBy('type','asc')->OrderBy('nombre','asc')
    ->get();
         $delegados=db::table('inversionista_naturals')->get();
        //dd($red);
    //dd($delegados);
            return view('asociador',['representantes' => $representantes,'delegados' => $delegados,'empresa' => $empresa]);
        
    }

    public function asociador_registrado(request $request)
    {

                //dd($request);
                $registry = new asociadorxempresasxrepresentante;
                $condicion=db::table('asociador_empresas_representantes')->where('enterprise_id',$request->enterprise_id)->where('delegate_id',$request->delegate_id)->first();
                //dd($condicion);
                if($condicion)
                {
                    return back()->with('status','El Delegado Ya Esta Registrado');
                }
                else
                {
                $registry -> delegate_id = $request->delegate_id;
                $registry -> enterprise_id = $request->enterprise_id;
                $registry -> type = $request->type;
                //dd($registry);
                $registry -> save();
                
        
        //dd($request);
            return back()->with('status','Delegado Asociado');
        }
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
         $sitios=db::table('rrss')->get();
        //dd($red);
            return view('add_social_enterprises',['empresa' => $empresa,'redes' => $redes,'sitios' => $sitios]);
        
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
            return back()->with('status','Pagina Web Registrada');
        
    }


    public function edit_web_enterprise($id)
    {
        $delegado = redessocialesempresa::findorfail($id);
        //dd($delegado);
          $sitios=db::table('rrss')->get();
            return view('edit_web_enterprise',['delegado' => $delegado,'sitios' =>$sitios]);
        
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

            return redirect()->route('add_web', $peticion)->with('status','Red Social Modificada');
        
    }


    public function delete_web_enterprise_register( $id)
    {

                
               $red = redessocialesempresa::findorFail($id);
               $peticion=$red->enterprise_id;
               //dd($red);
    // Update the id_status column
    $red->delete();

        
            return redirect()->route('add_web', $peticion)->with('status','Red Social Eliminada');
        
    }




    public function previews($id)
    {
        if(session('usuario')){

            $previa=DB::table('datos_empresas') ->where('datos_empresas.id',$id)
            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->join('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->select(
            'datos_empresas.*',
            'origen.paisnombre as pais_origen',
            'registro.paisnombre as lregistro')
           ->first();
            //dd($previa);
            $twitter=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')->where('datos_empresas.id',$id)->where('red','twitter')
            ->select('redes_sociales_empresas.username as twitter')->first();

           $delegados=db::table('inversionista_naturals')->join('asociador_empresas_representantes as asociador','asociador.delegate_id','=','inversionista_naturals.id')->where('inversionista_naturals.status','!=',0)->where('asociador.enterprise_id','=',$id)->OrderBy('asociador.type','asc')->OrderBy('inversionista_naturals.nombre','ASC')->get();

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




            return view('previews' ,['instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo,'delegados' => $delegados]);
   
        }
        else
        return $this->index();
    }

    public function prueba_pdf($id)
    {//dd($ide);
         $previa=DB::table('datos_empresas') 
            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->join('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->join('users as elaborado','elaborado.id','=','contenido_empresas.elaborado')
            ->leftjoin('users as revisado','revisado.id','=','contenido_empresas.revisado')
            ->leftjoin('users as certificado','certificado.id','=','contenido_empresas.certificado')
            ->leftjoin('users as aprobado','aprobado.id','=','contenido_empresas.aprobado')
->leftjoin('inversionista_naturals as delegado','delegado.id','=','contenido_empresas.delegate_id')

            
            ->where('contenido_empresas.id',$id)
            ->select(
            'datos_empresas.*',
            'contenido_empresas.*',
            'contenido_empresas.id as ide',
              'contenido_empresas.status as estatuscontent',
            'elaborado.name as name',
            'elaborado.surname as surname',
'delegado.nombre as delegado_nombre',
            'delegado.apellido as delegado_apellido',


            'revisado.name as namerev',
            'revisado.surname as surnamerev',
            'certificado.name as namecert',
            'certificado.surname as surnamecert',
            'aprobado.name as nameapro',
            'aprobado.surname as surnameapro',
            'contenido_empresas.updated_at as fecha',
            'origen.paisnombre as pais_origen',
            'registro.paisnombre as lregistro')
           ->OrderBy('ide')->first();
            //dd($previa);
            $twitter=db::table('datos_empresas')
            ->join('redes_sociales_empresas','redes_sociales_empresas.enterprise_id','=','datos_empresas.id')
            ->join('rrss','rrss.id','=','redes_sociales_empresas.site')->where('datos_empresas.id',$id)->where('red','twitter')
            ->select('redes_sociales_empresas.username as twitter')->first();

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

  /*  $data = ['title' => 'domPDF in Laravel 10',
             'twitter' => $twitter,
             'facebook' => $facebook,
             'instagram' => $instagram,
             'linkedin' => $linkedin,
             'telefono' => $telefono,
             'correo' => $correo,
             'previa' => $previa
];*/
       // $pdf = PDF::loadView('prueba_pdf', $data)->setOptions(['defaultFont' => 'arial','defaultPaperSize' => 'letter']);
       // return $pdf->download('prueba_pdf.pdf');
     return view('prueba_pdf' ,['instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
    }


public function previews_delegates($id)
    {
        if(session('usuario')){

            $previa=db::table('inversionista_naturals')->join('nacionalidad','nacionalidad.id','=','inversionista_naturals.nacionalidad')->where('inversionista_naturals.id',$id)->select(
            'inversionista_naturals.*',
            'nacionalidad.GENTILICIO_NAC as GENTILICIO_NAC')->first();
            //DD($previa);

            $twitter=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')->where('inversionista_naturals.id',$id)->where('red','twitter')
            ->select('redes_sociales_delegados.username as twitter')->first();

           

             $facebook=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as facebook')->where('inversionista_naturals.id',$id)->where('red','facebook')->first();

             $instagram=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as instagram')->where('inversionista_naturals.id',$id)->where('red','instagram')->first();

             $linkedin=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as linkedin')->where('inversionista_naturals.id',$id)->where('red','linkedin')->first();

             $telefono=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as telefono')->where('inversionista_naturals.id',$id)->where('red','telefono')->first();

              $correo=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as correo')->where('inversionista_naturals.id',$id)->where('red','correo')->first();

        

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




            return view('previews_delegates' ,['previa' => $previa,'instagram' => $instagram,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
   
        }
        else
        return $this->index();
    }

    public function prueba_delegates_pdf($id)
    {
        if(session('usuario')){

             $previa=db::table('inversionista_naturals')
             
            ->join('nacionalidad','nacionalidad.id','=','inversionista_naturals.nacionalidad')
            ->join('contenido_representantes','contenido_representantes.delegate_id','=','inversionista_naturals.id')
           ->join('users as elaborado','elaborado.id','=','contenido_representantes.elaborado')
           ->leftjoin('users as revisado','revisado.id','=','contenido_representantes.revisado')
           ->leftjoin('users as certificado','certificado.id','=','contenido_representantes.certificado')
           ->leftjoin('users as aprobado','aprobado.id','=','contenido_representantes.aprobado')
             ->where('contenido_representantes.id',$id)
             ->select(
            'inversionista_naturals.*',
            'nacionalidad.GENTILICIO_NAC as GENTILICIO_NAC',
             'inversionista_naturals.*',
            'contenido_representantes.*',
            'contenido_representantes.id as ide',
              'contenido_representantes.status as estatuscontent',
            'elaborado.name as name',
            'elaborado.surname as surname',
            'revisado.name as namerev',
            'revisado.surname as surnamerev',
            'certificado.name as namecert',
            'certificado.surname as surnamecert',
            'aprobado.name as nameapro',
            'aprobado.surname as surnameapro',
            'contenido_representantes.updated_at as fecha'
        )
             
           ->OrderBy('contenido_representantes.created_at','desc')
             ->first();

            $twitter=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')->where('inversionista_naturals.id',$id)->where('red','twitter')
            ->select('redes_sociales_delegados.username as twitter')->first();

           

             $facebook=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as facebook')->where('inversionista_naturals.id',$id)->where('red','facebook')->first();

             $instagram=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as instagram')->where('inversionista_naturals.id',$id)->where('red','instagram')->first();

             $linkedin=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as linkedin')->where('inversionista_naturals.id',$id)->where('red','linkedin')->first();

             $telefono=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as telefono')->where('inversionista_naturals.id',$id)->where('red','telefono')->first();

              $correo=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as correo')->where('inversionista_naturals.id',$id)->where('red','correo')->first();

        

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




            return view('prueba_delegates_pdf' ,['instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
   
        }
        else
        return $this->index();
    }

    public function elaborar(request $request)
    {

           
                $registry = new contenidoempresa;
                
                $registry -> enterprise_id = $request->enterprise_id;
                $registry -> delegate_id = $request->delegate_id;
                $registry -> elaborado = $request->elaborado;
                $registry -> oci = $request->oci;
                $registry -> fbi = $request->fbi;
                $registry -> ofac = $request->ofac;
                $registry -> ue = $request->ue;
                $registry -> cso = $request->cso;
                $registry -> ip = $request->ip;
                $registry -> icij = $request->icij;
                $registry -> tsj = $request->tsj;
                $registry -> rnc = $request->rnc;
                $registry -> ef = $request->ef;
                $registry -> ex = $request->ex;
                //dd($registry);
                $registry -> save();
                
        
        //dd($request);
            return redirect()->route('enterprises')->with('status','Documento Elaborado');
        
    }

     public function elaborar_delegates(request $request)
    {

                //dd($request);
                $registry = new contenidorepresentante;
                
                $registry -> delegate_id = $request->delegate_id;
                $registry -> elaborado = $request->elaborado;
                $registry -> ipol = $request->ipol;
                $registry -> oci = $request->oci;
                $registry -> fbi = $request->fbi;
                $registry -> ofac = $request->ofac;
                $registry -> ue = $request->ue;
                $registry -> cso = $request->cso;
                $registry -> ip = $request->ip;
                $registry -> icij = $request->icij;
                $registry -> tsj = $request->tsj;
                $registry -> rnc = $request->rnc;
                $registry -> ef = $request->ef;
                $registry -> ex = $request->ex;
                
                $registry -> save();
                
        
        //dd($request);
            return redirect()->route('delegates')->with('status','Documento Elaborado');
        
    }

     public function revisar($id)
    {

                
                 $empresas = contenidoempresa::findorfail($id);
                 //dD($empresas);
                if($empresas->status==2)
                {
                    //dd($empresas->status);
                    $empresas->update(['status' => '3']);
                $empresas->update(['certificado' => session('usuario')->id]);
                 return redirect()->route('enterprises')->with('status','Documento Certificado');
                }
                
                elseif($empresas->status==1)
                {    //dd(session('usuario')->id);
                    $empresas->update(['status' => '2']);
                    $empresas->update(['revisado' => session('usuario')->id]);
                     return redirect()->route('enterprises')->with('status','Documento Revisado');
        } 
                elseif($empresas->status==3)
                {    //dd(session('usuario')->id);
                    $empresas->update(['status' => '4']);
                    $empresas->update(['aprobado' => session('usuario')->id]);
                     return redirect()->route('prueba_pdf', $empresas->id)->with('status','Documento Aprobado');
        }
        elseif($empresas->status==4)
                {    //dd(session('usuario')->id);
                 
                     return redirect()->route('prueba_pdf', $empresas->id)->with('status','Impreso');
        }

                
        
        //dd($request);
         
        
    }

     public function revisar_delegados($id)
    {

                
                 $empresas = contenidorepresentante::findorfail($id);
                 //dD($empresas);
                if($empresas->status==2)
                {
                    //dd($empresas->status);
                    $empresas->update(['status' => '3']);
                $empresas->update(['certificado' => session('usuario')->id]);
                 return redirect()->route('delegates')->with('status','Documento Certificado');
                }
                
                elseif($empresas->status==1)
                {    //dd(session('usuario')->id);
                    $empresas->update(['status' => '2']);
                    $empresas->update(['revisado' => session('usuario')->id]);
                     return redirect()->route('delegates')->with('status','Documento Revisado');
        } 
                elseif($empresas->status==3)
                {    //dd(session('usuario')->id);
                    $empresas->update(['status' => '4']);
                    $empresas->update(['aprobado' => session('usuario')->id]);
                     return redirect()->route('prueba_delegates_pdf', $empresas->id)->with('status','Documento Aprobado');
        }
        elseif($empresas->status==4)
                {    //dd(session('usuario')->id);
                 
                     return redirect()->route('prueba_delegates_pdf', $empresas->id)->with('status','Impreso');
        }

                
        
        //dd($request);
         
        
    }


public function elaborador($id)
    {
        if(session('usuario')){
Carbon::setlocale('es');

            $previa=DB::table('datos_empresas') ->where('datos_empresas.id',$id)
            ->leftjoin('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->leftjoin('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->leftjoin('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->LEFTjoin('users as elaborado','elaborado.id','=','contenido_empresas.elaborado')
            ->leftjoin('users as revisado','revisado.id','=','contenido_empresas.revisado')
            ->leftjoin('users as certificado','certificado.id','=','contenido_empresas.certificado')
            ->leftjoin('users as aprobado','aprobado.id','=','contenido_empresas.aprobado')
            ->leftjoin('inversionista_naturals as delegado','delegado.id','=','contenido_empresas.delegate_id')
            ->where('contenido_empresas.status', '!=', 0)
            ->select(
            'datos_empresas.*',
            'contenido_empresas.*',
            'contenido_empresas.id as ide',
              'contenido_empresas.status as estatuscontent',
            'elaborado.name as name',
            'elaborado.surname as surname',
            'revisado.name as namerev',
            'revisado.surname as surnamerev',
            'certificado.name as namecert',
            'certificado.surname as surnamecert',
            'delegado.nombre as delegado_nombre',
            'delegado.apellido as delegado_apellido',
            'aprobado.name as nameapro',
            'aprobado.surname as surnameapro',
            'contenido_empresas.updated_at as fecha',
            'origen.paisnombre as pais_origen',
            'registro.paisnombre as lregistro')
            ->OrderBy('contenido_empresas.status','asc')
           ->OrderBy('contenido_empresas.created_at','desc')->first();
           // dd($previa);
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

 if(session('usuario')->role >= 8)
{
             $versiones=db::table('contenido_empresas')
             ->where('contenido_empresas.enterprise_id',$id)->get();
}
else
{
     $versiones=db::table('contenido_empresas')->where('contenido_empresas.enterprise_id',$id)->where('contenido_empresas.status','!=','0')->get();
}
  //dd($twitter);




            return view('elaborador' ,['versiones' => $versiones,'instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
   
        }
        else
        return $this->index();
    }

public function elaborador_delegados($id)
    {   
        if(session('usuario')){

             $previa=db::table('inversionista_naturals')
             ->where('inversionista_naturals.id',$id)
            ->join('nacionalidad','nacionalidad.id','=','inversionista_naturals.nacionalidad')
            ->join('contenido_representantes','contenido_representantes.delegate_id','=','inversionista_naturals.id')
           ->join('users as elaborado','elaborado.id','=','contenido_representantes.elaborado')
           ->leftjoin('users as revisado','revisado.id','=','contenido_representantes.revisado')
           ->leftjoin('users as certificado','certificado.id','=','contenido_representantes.certificado')
           ->leftjoin('users as aprobado','aprobado.id','=','contenido_representantes.aprobado')
             ->where('contenido_representantes.status', '!=', 0)
             ->select(
            'inversionista_naturals.*',
            'nacionalidad.GENTILICIO_NAC as GENTILICIO_NAC',
             'inversionista_naturals.*',
            'contenido_representantes.*',
            'contenido_representantes.id as ide',
              'contenido_representantes.status as estatuscontent',
            'elaborado.name as name',
            'elaborado.surname as surname',
            'revisado.name as namerev',
            'revisado.surname as surnamerev',
            'certificado.name as namecert',
            'certificado.surname as surnamecert',
            'aprobado.name as nameapro',
            'aprobado.surname as surnameapro',
            'contenido_representantes.updated_at as fecha'
        )
            ->OrderBy('contenido_representantes.status','Asc')
           ->OrderBy('contenido_representantes.created_at','desc')
           
             ->first();
            //dd($previa);

            if(session('usuario')->role >= 8)
{
             $versiones=db::table('contenido_representantes')
             ->where('contenido_representantes.delegate_id',$id)->get();
}
else
{
     $versiones=db::table('contenido_representantes')->where('contenido_representantes.delegate_id',$id)->where('contenido_representantes.status','!=',0)->get();
}

            $twitter=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')->where('inversionista_naturals.id',$id)->where('red','twitter')
            ->select('redes_sociales_delegados.username as twitter')->first();

           

             $facebook=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as facebook')->where('inversionista_naturals.id',$id)->where('red','facebook')->first();

             $instagram=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as instagram')->where('inversionista_naturals.id',$id)->where('red','instagram')->first();

             $linkedin=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as linkedin')->where('inversionista_naturals.id',$id)->where('red','linkedin')->first();

             $telefono=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as telefono')->where('inversionista_naturals.id',$id)->where('red','telefono')->first();

              $correo=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as correo')->where('inversionista_naturals.id',$id)->where('red','correo')->first();

        

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




            return view('elaborador_delegados' ,['versiones' => $versiones,'instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
   
        }
        else
        return $this->index();
    }

public function suspender_pdf($id){

     $previa = contenidoempresa::find($id);
     if($previa->status != 0)
     {
        $previa->update(['status' => '0']);
        return redirect()->route('enterprises')->with('status','Documento Eliminado');
}
elseif($previa->status == 0)
{
    $previa->update(['status' => '1']);
        return redirect()->route('enterprises')->with('status','Documento Restaurando');
}
     
     
}

public function suspender_pdf_delegados($id){

     $previa = contenidorepresentante::find($id);
      if($previa->status != 0)
     {
        $previa->update(['status' => '0']);
        return redirect()->route('enterprises')->with('status','Documento Eliminado');
}
elseif($previa->status == 0)
{
    $previa->update(['status' => '1']);
        return redirect()->route('enterprises')->with('status','Documento Restaurando');
}
}

    public function modificar_elaborador_delegados($id)
    {   
        if(session('usuario')){

             $previa=db::table('inversionista_naturals')
            
            ->join('nacionalidad','nacionalidad.id','=','inversionista_naturals.nacionalidad')
            ->join('contenido_representantes','contenido_representantes.delegate_id','=','inversionista_naturals.id')
           ->join('users as elaborado','elaborado.id','=','contenido_representantes.elaborado')
           ->leftjoin('users as revisado','revisado.id','=','contenido_representantes.revisado')
           ->leftjoin('users as certificado','certificado.id','=','contenido_representantes.certificado')
           ->leftjoin('users as aprobado','aprobado.id','=','contenido_representantes.aprobado')
             ->where('contenido_representantes.id',$id) 
             ->select(
            'inversionista_naturals.*',
            'nacionalidad.GENTILICIO_NAC as GENTILICIO_NAC',
             'inversionista_naturals.*',
            'contenido_representantes.*',
            'contenido_representantes.id as ide',
              'contenido_representantes.status as estatuscontent',
            'elaborado.name as name',
            'elaborado.surname as surname',
            'revisado.name as namerev',
            'revisado.surname as surnamerev',
            'certificado.name as namecert',
            'certificado.surname as surnamecert',
            'aprobado.name as nameapro',
            'aprobado.surname as surnameapro',
            'contenido_representantes.updated_at as fecha'
        )
             
           ->OrderBy('ide')
             ->first();
            //dd($previa);

if(session('usuario')->role >= 8)
{
             $versiones=db::table('contenido_representantes')
             ->where('contenido_representantes.delegate_id',$id)->get();
}
else
{
     $versiones=db::table('contenido_representantes')
             ->where('contenido_representantes.delegate_id',$id)->get();
}

            $twitter=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')->where('inversionista_naturals.id',$id)->where('red','twitter')
            ->select('redes_sociales_delegados.username as twitter')->first();

           

             $facebook=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as facebook')->where('inversionista_naturals.id',$id)->where('red','facebook')->first();

             $instagram=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as instagram')->where('inversionista_naturals.id',$id)->where('red','instagram')->first();

             $linkedin=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as linkedin')->where('inversionista_naturals.id',$id)->where('red','linkedin')->first();

             $telefono=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as telefono')->where('inversionista_naturals.id',$id)->where('red','telefono')->first();

              $correo=db::table('inversionista_naturals')
            ->join('redes_sociales_delegados','redes_sociales_delegados.delegate_id','=','inversionista_naturals.id')
            ->join('rrss','rrss.id','=','redes_sociales_delegados.site')
            ->select('redes_sociales_delegados.username as correo')->where('inversionista_naturals.id',$id)->where('red','correo')->first();

        

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




            return view('modificar_elaborador_delegados' ,['versiones' => $versiones,'instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
   
        }
        else
        return $this->index();
    }

    public function modificar_elaborador_empresas($id)
    {
        if(session('usuario')){

            $previa=DB::table('datos_empresas') 
            ->leftjoin('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->leftjoin('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->leftjoin('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->LEFTjoin('users as elaborado','elaborado.id','=','contenido_empresas.elaborado')
            ->leftjoin('users as revisado','revisado.id','=','contenido_empresas.revisado')
            ->leftjoin('users as certificado','certificado.id','=','contenido_empresas.certificado')
            ->leftjoin('users as aprobado','aprobado.id','=','contenido_empresas.aprobado')
            ->leftjoin('inversionista_naturals as delegado','delegado.id','=','contenido_empresas.delegate_id')

       
            ->where('contenido_empresas.id',$id)
            ->select(
            'datos_empresas.*',
            'contenido_empresas.*',
            'contenido_empresas.id as ide',
              'contenido_empresas.status as estatuscontent',
            'elaborado.name as name',
            'elaborado.surname as surname',
            'revisado.name as namerev',
            'revisado.surname as surnamerev',
            'certificado.name as namecert',
            'certificado.surname as surnamecert',
                 'delegado.nombre as delegado_nombre',
            'delegado.apellido as delegado_apellido',
            'aprobado.name as nameapro',
            'aprobado.surname as surnameapro',
            'contenido_empresas.updated_at as fecha',
            'origen.paisnombre as pais_origen',
            'registro.paisnombre as lregistro')
           ->OrderBy('ide')->first();
           // dd($previa);


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

 $versiones=db::table('contenido_empresas')
             ->where('contenido_empresas.enterprise_id',$id)->get();

  //dd($twitter);




            return view('modificar_elaborador_empresas' ,['versiones' => $versiones,'instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
   
        }
        else
        return $this->index();
    }

    public function modificar_elaborar_delegados(request $request)
    {   
        //dd($request);

         $empresas = contenidorepresentante::find($request->ide);
//dd($request);
 if($request->oci != $empresas->oci && $request->oci!="" ||  $request->oci != $empresas->oci && $request->oci!=" " ||  $request->oci != $empresas->oci && $request->oci!=null)
        {  
               // dd("a");
                $empresas->update(['oci' => $request->oci]);
            }

 if($request->ipol != $empresas->ipol && $request->ipol!="" ||  $request->ipol != $empresas->ipol && $request->ipol!=" " ||  $request->ipol != $empresas->ipol && $request->ipol!=null)
        {  
              //  dd("B");
                $empresas->update(['ipol' => $request->ipol]);
            }


 if($request->fbi != $empresas->fbi && $request->fbi!="" ||  $request->fbi != $empresas->fbi && $request->fbi!=" " ||  $request->fbi != $empresas->fbi && $request->fbi!=null)
        {  
                //dd("C");
                $empresas->update(['fbi' => $request->fbi]);
            }


 if($request->ofac != $empresas->ofac && $request->ofac!="" ||  $request->ofac != $empresas->ofac && $request->ofac!=" " ||  $request->ofac != $empresas->ofac && $request->ofac!=null)
        {  
                //dd("D");
                $empresas->update(['ofac' => $request->ofac]);
            }


 if($request->ue != $empresas->ue && $request->ue!="" ||  $request->ue != $empresas->ue && $request->ue!=" " ||  $request->ue != $empresas->ue && $request->ue!=null)
        {  
                //dd("E");
                $empresas->update(['ue' => $request->ue]);
            }


 if($request->cso != $empresas->cso && $request->cso!="" ||  $request->cso != $empresas->cso && $request->cso!=" " ||  $request->cso != $empresas->cso && $request->cso!=null)
        {  
               // dd("F");
                $empresas->update(['cso' => $request->cso]);
            }


             if($request->ip != $empresas->ip && $request->ip!="" ||  $request->ip != $empresas->ip && $request->ip!=" " ||  $request->ip != $empresas->ip && $request->ip!=null)
        {  
                //dd("G");
                $empresas->update(['ip' => $request->ip]);
            }


             if($request->icij != $empresas->icij && $request->icij!="" ||  $request->icij != $empresas->icij && $request->icij!=" " ||  $request->icij != $empresas->icij && $request->icij!=null)
        {  
                //dd("H");
                $empresas->update(['icij' => $request->icij]);
            }


             if($request->tsj != $empresas->tsj && $request->tsj!="" ||  $request->tsj != $empresas->tsj && $request->tsj!=" " ||  $request->tsj != $empresas->tsj && $request->tsj!=null)
        {  
               // dd("I");
                $empresas->update(['tsj' => $request->tsj]);
            }


             if($request->rnc != $empresas->rnc && $request->rnc!="" ||  $request->rnc != $empresas->rnc && $request->rnc!=" " ||  $request->rnc != $empresas->rnc && $request->rnc!=null)
        {  
              //  dd("J");
                $empresas->update(['rnc' => $request->rnc]);
            }


             if($request->ef != $empresas->ef && $request->ef!="" ||  $request->ef != $empresas->ef && $request->ef!=" " ||  $request->ef != $empresas->ef && $request->ef!=null)
        {  
               // dd("K");
                $empresas->update(['ef' => $request->ef]);
            }


             if($request->ex != $empresas->ex && $request->ex!="" ||  $request->ex != $empresas->ex && $request->ex!=" " ||  $request->ex != $empresas->ex && $request->ex!=null)
        {  
             //   dd("L");
                $empresas->update(['ex' => $request->ex]);
            }

            $empresas->update(['status' => 1]);

            return redirect()->route('elaborador_delegados', $empresas->delegate_id)->with('status','informe Modificado');
    }

    public function modificar_elaborar_empresas(request $request)
    {   
        //dd($request);

         $empresas = contenidoempresa::find($request->ide);
//dd($request);
 if($request->oci != $empresas->oci && $request->oci!="" ||  $request->oci != $empresas->oci && $request->oci!=" " ||  $request->oci != $empresas->oci && $request->oci!=null)
        {  
               // dd("a");
                $empresas->update(['oci' => $request->oci]);
            }

 


 if($request->fbi != $empresas->fbi && $request->fbi!="" ||  $request->fbi != $empresas->fbi && $request->fbi!=" " ||  $request->fbi != $empresas->fbi && $request->fbi!=null)
        {  
                //dd("C");
                $empresas->update(['fbi' => $request->fbi]);
            }


 if($request->ofac != $empresas->ofac && $request->ofac!="" ||  $request->ofac != $empresas->ofac && $request->ofac!=" " ||  $request->ofac != $empresas->ofac && $request->ofac!=null)
        {  
                //dd("D");
                $empresas->update(['ofac' => $request->ofac]);
            }


 if($request->ue != $empresas->ue && $request->ue!="" ||  $request->ue != $empresas->ue && $request->ue!=" " ||  $request->ue != $empresas->ue && $request->ue!=null)
        {  
                //dd("E");
                $empresas->update(['ue' => $request->ue]);
            }


 if($request->cso != $empresas->cso && $request->cso!="" ||  $request->cso != $empresas->cso && $request->cso!=" " ||  $request->cso != $empresas->cso && $request->cso!=null)
        {  
               // dd("F");
                $empresas->update(['cso' => $request->cso]);
            }


             if($request->ip != $empresas->ip && $request->ip!="" ||  $request->ip != $empresas->ip && $request->ip!=" " ||  $request->ip != $empresas->ip && $request->ip!=null)
        {  
                //dd("G");
                $empresas->update(['ip' => $request->ip]);
            }


             if($request->icij != $empresas->icij && $request->icij!="" ||  $request->icij != $empresas->icij && $request->icij!=" " ||  $request->icij != $empresas->icij && $request->icij!=null)
        {  
                //dd("H");
                $empresas->update(['icij' => $request->icij]);
            }


             if($request->tsj != $empresas->tsj && $request->tsj!="" ||  $request->tsj != $empresas->tsj && $request->tsj!=" " ||  $request->tsj != $empresas->tsj && $request->tsj!=null)
        {  
               // dd("I");
                $empresas->update(['tsj' => $request->tsj]);
            }


             if($request->rnc != $empresas->rnc && $request->rnc!="" ||  $request->rnc != $empresas->rnc && $request->rnc!=" " ||  $request->rnc != $empresas->rnc && $request->rnc!=null)
        {  
              //  dd("J");
                $empresas->update(['rnc' => $request->rnc]);
            }


             if($request->ef != $empresas->ef && $request->ef!="" ||  $request->ef != $empresas->ef && $request->ef!=" " ||  $request->ef != $empresas->ef && $request->ef!=null)
        {  
               // dd("K");
                $empresas->update(['ef' => $request->ef]);
            }


             if($request->ex != $empresas->ex && $request->ex!="" ||  $request->ex != $empresas->ex && $request->ex!=" " ||  $request->ex != $empresas->ex && $request->ex!=null)
        {  
             //   dd("L");
                $empresas->update(['ex' => $request->ex]);
            }

            $empresas->update(['status' => 1]);

            return redirect()->route('elaborador', $empresas->enterprise_id)->with('status','informe Modificado');
    }


public function embajada_modificador(request $request, $id)
{
//dd($request);
     $empresas = datosembajada::findorfail($id);

         
 $peticion=$empresas->enterprise_id;
          

        if($request->pais != $empresas->pais && $request->pais!="" ||  $request->pais != $empresas->pais && $request->pais!=" " ||  $request->pais != $empresas->pais && $request->pais!=null)
        {  
                //dd("a");
                $empresas->update(['pais' => $request->pais]);
            }

             if($request->ne != $empresas->ne && $request->ne!="" ||  $request->ne != $empresas->ne && $request->ne!=" " ||  $request->ne != $empresas->ne && $request->ne!=null)
        {  
                //dd("B");
                $empresas->update(['ne' => $request->ne]);
            }

             if($request->oe != $empresas->oe && $request->oe!="" ||  $request->oe != $empresas->oe && $request->oe!=" " ||  $request->oe != $empresas->oe && $request->oe!=null)
        {  
                //dd("B");
                $empresas->update(['oe' => $request->oe]);
            }

             if($request->inv != $empresas->inv && $request->inv!="" ||  $request->inv != $empresas->inv && $request->inv!=" " ||  $request->inv != $empresas->inv && $request->inv!=null)
        {  
                //dd("B");
                $empresas->update(['inv' => $request->inv]);
            }
             if($request->ex != $empresas->ex && $request->ex!="" ||  $request->ex != $empresas->ex && $request->ex!=" " ||  $request->ex != $empresas->ex && $request->ex!=null)
        {  
                //dd("B");
                $empresas->update(['ex' => $request->ex]);
            }
             if($request->al != $empresas->al && $request->al!="" ||  $request->al != $empresas->al && $request->al!=" " ||  $request->al != $empresas->al && $request->al!=null)
        {  
                //dd("B");
                $empresas->update(['al' => $request->al]);
            }
             if($request->ob != $empresas->ob && $request->ob!="" ||  $request->ob != $empresas->ob && $request->ob!=" " ||  $request->ob != $empresas->ob && $request->ob!=null)
        {  
                //dd("B");
                $empresas->update(['ob' => $request->ob]);
            }
        //dd($empresa);

            return redirect()->route('embajada', $peticion)->with('status','Documento Modificado Modificada');
        
    
}
public function embajada_modificar($id)
    {
        if(session('usuario')){

            $previa=DB::table('datos_empresas') 
            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->join('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->join('datos_embajadas','datos_embajadas.enterprise_id','=','datos_empresas.id')
            ->join('pais as embajada','datos_embajadas.pais','=','embajada.id')
            ->join('inversionista_naturals as delegado','delegado.id','=','contenido_empresas.delegate_id')
  

            ->where('datos_embajadas.id',$id)
            ->OrderBy('datos_embajadas.created_at','Asc')
            ->select(
            
            
            'embajada.paisnombre as paisembajada',
            'datos_embajadas.*',
            'origen.paisnombre as pais_origen',
            'registro.paisnombre as lregistro',
            'datos_embajadas.ex',
            'contenido_empresas.ef',
            'contenido_empresas.oci',
            'delegado.nombre as delegado_nombre',
            'delegado.apellido as delegado_apellido',
        'datos_empresas.*','datos_embajadas.id as id',)
           ->first();
        //dd($previa->id);
           $paises=db::table('pais')->get();

           $versiones=DB::table('datos_embajadas')->where('enterprise_id',$id)->get();

           //dd($paises);




  //dd($twitter);




            return view('embajada_modificar' ,['previa' => $previa,'paises'=> $paises,'versiones'=>$versiones]);
   
        }
        else
        return $this->index();
    }

 public function embajada($id)
    {
        if(session('usuario')){

            $previa=DB::table('datos_empresas')
            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->join('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->join('datos_embajadas','datos_embajadas.enterprise_id','=','datos_empresas.id')
            ->join('pais as embajada','datos_embajadas.pais','=','embajada.id')
            ->join('inversionista_naturals as delegado','delegado.id','=','contenido_empresas.delegate_id')
            ->where('datos_empresas.id',$id)
           
            ->select('datos_embajadas.id as dato_embajada',
            
            
            'embajada.paisnombre as paisembajada',
            'datos_embajadas.*',
           
            'registro.paisnombre as lregistro',
            'datos_embajadas.ex',
            'contenido_empresas.ef',
            'contenido_empresas.oci',
            'delegado.nombre as delegado_nombre',
            'delegado.apellido as delegado_apellido',
        'datos_empresas.*', 'origen.paisnombre as pais_origen',)
            ->OrderBy('datos_embajadas.created_at','desc')
           ->first();
        //dd($previa);
           $paises=db::table('pais')->get();

           $versiones=DB::table('datos_embajadas')->OrderBy('id','desc')->where('enterprise_id',$id)->get();

           //dd($paises);




  //dd($twitter);




            return view('embajada' ,['previa' => $previa,'paises'=> $paises,'versiones'=>$versiones]);
   
        }
        else
        return $this->index();
    }


    public function embajada_print($id)
    {//dd($id);
        if(session('usuario')){

            $previa=DB::table('datos_empresas')
            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->join('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->join('datos_embajadas','datos_embajadas.enterprise_id','=','datos_empresas.id')
            ->join('pais as embajada','datos_embajadas.pais','=','embajada.id')
               ->join('inversionista_naturals as delegado','delegado.id','=','contenido_empresas.delegate_id')

             ->where('datos_embajadas.id',$id)
            ->OrderBy('contenido_empresas.status','Asc')->OrderBy('contenido_empresas.created_at','Asc')
            ->select(
            'datos_empresas.*',
            'datos_embajadas.id as id',
            'embajada.paisnombre as paisembajada',
            'datos_embajadas.*',
            'origen.paisnombre as pais_origen',
            'registro.paisnombre as lregistro',
            'contenido_empresas.ex',
            'contenido_empresas.ef',
            'contenido_empresas.oci', 'delegado.nombre as delegado_nombre',
            'delegado.apellido as delegado_apellido',)
           ->first();
        //dd($previa);
           $paises=db::table('pais')->get();

           //dd($paises);




  //dd($twitter);




            return view('embajada_print' ,['previa' => $previa,'paises'=> $paises]);
   
        }
        else
        return $this->index();
    }



public function embajada_eliminador($id){
       $red = datosembajada::findOrFail($id);

    // Update the id_status column
    $red->delete();
      return redirect()->route('enterprises')->with('status','Documento Eliminado');
}




    public function embajada_register($id)
    {
        if(session('usuario')){

            $previa=DB::table('contenido_empresas')
            ->join('datos_empresas as empresas','empresas.id','=','contenido_empresas.enterprise_id')
            ->join('inversionista_naturals as delegado','delegado.id','=','contenido_empresas.delegate_id')
            ->leftjoin('pais','pais.id','=','empresas.pais_origen')
            ->select(
                'contenido_empresas.id',
                'pais.paisnombre as pais_origen',
                'empresas.razonsocial as razonsocial',
                'empresas.foto',
                'empresas.direccion',
                'empresas.identificador',
                'empresas.rif',
                 'contenido_empresas.oci',
                  'contenido_empresas.ex',
                   'contenido_empresas.ef',
                  'empresas.correo',
                     'empresas.telefono',

                   'delegado.nombre as delegado_nombre',

                   'delegado.apellido as delegado_apellido',
               )
            ->where('contenido_empresas.enterprise_id','=',$id)
            ->where('contenido_empresas.status','!=',0)
            ->OrderBy('contenido_empresas.created_at','desc')

           
           ->first();




        //dd($previa);



           $paises=db::table('pais')->orderby('paisnombre','asc')->get();

           //dd($paises);




  //dd($twitter);




            return view('embajada_register' ,['previa' => $previa,'paises'=> $paises]);
   
        }
        else
        return $this->index();
    }


     public function embajada_registrador(request $request)
    {
       $registry = new datosembajada;
              //dd($request);  
                $registry -> enterprise_id = $request->enterprise_id;
               // $registry -> delegate_id = $request->delegate_id;
                $registry -> ne = $request->ne;
                $registry -> oe = $request->oe;
                $registry -> inv = $request->inv;
                $registry -> ex = $request->ex;
                $registry -> al = $request->al;
                $registry -> ob = $request->ob;
                $registry -> pais = $request->pais;
               
               
                //dd($registry);
                $registry -> save();
                
        
        //dd($request);
            return redirect()->route('enterprises')->with('status','Documento Elaborado');
   
        
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
        if(session('usuario') && session('usuario')->role==9 || session('usuario') && session('usuario')->role > 3){
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
