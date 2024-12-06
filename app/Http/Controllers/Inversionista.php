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

    public function search()
    {
        if(session('usuario')){
             //$this->logs(session('usuario')->id,'Carga de pagina','search'); 
            return view('search');
        }
        else
           // $this->logs(session('usuario')->id,'Redireccionamiento','search'); 
        return view('index');
    }




      public function result(request $request)
    {// dd(db::table('inversionista_naturals')->where('email',$request->busqueda)->first() == null);
        if(db::table('inversionista_naturals')->where('inversionista_naturals.email',$request->busqueda)  
            ->join('nacionalidad','nacionalidad.id','=','inversionista_naturals.nacionalidad')
            ->join('contenido_representantes','contenido_representantes.delegate_id','=','inversionista_naturals.id')
           ->join('users as elaborado','elaborado.id','=','contenido_representantes.elaborado')
           ->where('contenido_representantes.status', '!=', 0)
           ->first()!=null)

{
    
             $resultado=db::table('inversionista_naturals')
             ->where('inversionista_naturals.email',$request->busqueda)
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
             
           ->OrderBy('contenido_representantes.created_at','desc')
             ->first();
            //dd($resultado);

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
            $this->logs(session('usuario')->id,'Busqueda Empresa Rif','results'); 
        return view('elaborador',['versiones'=> $versiones,'previa'=> $resultado,'instagram' =>$instagram,'twitter' =>$twitter,'facebook' =>$facebook ,'linkedin' =>$linkedin,'correo' =>$correo,'telefono' =>$telefono]);
}       
elseif (db::table('inversionista_naturals')->where('doc_identidad',$request->busqueda)   ->join('nacionalidad','nacionalidad.id','=','inversionista_naturals.nacionalidad')
            ->join('contenido_representantes','contenido_representantes.delegate_id','=','inversionista_naturals.id')
           ->join('users as elaborado','elaborado.id','=','contenido_representantes.elaborado')->where('contenido_representantes.status', '!=', 0)
           
             
           ->first()!=null) {
  $resultado=db::table('inversionista_naturals')
             ->where('inversionista_naturals.doc_identidad',$request->busqueda)
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
            $this->logs(session('usuario')->id,'Busqueda Delegado Cedula','results'); 
        return view('elaborador_delegados',['versiones'=> $versiones,'previa'=> $resultado,'instagram' =>$instagram,'twitter' =>$twitter,'facebook' =>$facebook ,'linkedin' =>$linkedin,'correo' =>$correo,'telefono' =>$telefono]);
}
elseif(db::table('datos_empresas')->where('datos_empresas.rif',$request->busqueda)
        ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->join('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->join('users as elaborado','elaborado.id','=','contenido_empresas.elaborado')
            ->where('contenido_empresas.status', '!=', 0)
        
->first()!=null)
{
   
            $previa=DB::table('datos_empresas') ->where('datos_empresas.rif',$request->busqueda)
            ->leftjoin('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->leftjoin('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->leftjoin('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->join('users as elaborado','elaborado.id','=','contenido_empresas.elaborado')
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



            $this->logs(session('usuario')->id,'Busqueda Delegado Rif','results'); 
            return view('elaborador' ,['versiones' => $versiones,'instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
}
else
    $this->logs(session('usuario')->id,'Fallo Busqueda','results'); 
    return back()->with('status','Dato no encontrado');
    }

    public function users()
    {   
        //$this->logs(session('usuario')->id,'Carga de pagina','users'); 
        if(session('usuario') ){
            if(session('usuario')->role >= 8)
        {

            $usuarios=db::table('users')->OrderBy('role','desc')->OrderBy('id','asc')->get();
        }
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
            // $this->logs(session('usuario')->id,'Redireccionamiento','users'); 
        return view('index');
    }

    public function delete_users(request $request, $id)
    {
        $user = User::findOrFail($id);

    // Update the id_status column
    $user->update(['status' => '0']);

            $this->logs(session('usuario')->id,'Eliminacion usuario','delete_users'); 
            return back()->with('status','Usuario Suspendido');
        
    }

    public function edit_users($id)
    {   //$this->logs(session('usuario')->id,'Carga de pagina','edit_users'); 
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
        $this->logs(session('usuario')->id,'Modificacion usuario','update_users'); 
    }
    else
    {
         $this->logs(session('usuario')->id,'Restauracion usuario','update_users'); 
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
        
        

  
            $this->logs(session('usuario')->id,'Suspension usuario','users_register'); 
            return back()->with('status','Usuario Modificado');
        
    }

    public function users_register(Request $request)
    {
        
        $validar=strtolower($request->correo);
       // dd($request);
        $comparar = DB::table('users')->where('email',$validar )->first();
       
      
        if($comparar)
        {
             $this->logs(session('usuario')->id,'Reingreso Creacion Usuario','users_register'); 
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
                    $this->logs(session('usuario')->id,'Creacion Usuario','users_register'); 
            return back()->with('status','Usuario Registrado de Manera Exitosa');
                    }
                    else
                    {
                        $this->logs(session('usuario')->id,'Fallo al Crear Usuario','users_register'); 
                        return back()->with('status','Registro Incompleto,Faltan Datos Necesarios');
                    }
        }
     
    }

    
   

    public function delegates()
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','delegates'); 
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
           // $this->logs(session('usuario')->id,'Redireccionamiento','delegates'); 
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

                $this->logs(session('usuario')->id,'Registro Delegado','delegates_register'); 
            return back()->with('status','Delegado Registrado');
        
    }

    public function edit_delegates($id)
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','edit_delegates'); 
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
             $this->logs(session('usuario')->id,'Suspension Delegado','suspend_delegates'); 
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
       
        
        
        

  
        $this->logs(session('usuario')->id,'modificacion Delegado','update_delegates'); 
            return redirect()->route('delegates')->with('status','Datos Modificado');
        
    }


    public function delete_delegates(request $request, $id)
    {
        $user = inversionistanatural::findOrFail($id);

    // Update the id_status column
    $user->update(['status' => '0']);

         $this->logs(session('usuario')->id,'Eliminacion Delegado','delete_delegates'); 
            return back()->with('status','Usuario Suspendido');
        
    }

    public function add_socialweb($id)
    {
          //$this->logs(session('usuario')->id,'Carga de pagina','add_socialweb'); 
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
                $this->logs(session('usuario')->id,'Creacion Red Social Delegado','web_register'); 
            return back()->with('status','Sitio Web Registrado');
        
    }

    public function edit_web($id)
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','edit_web'); 
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
            $this->logs(session('usuario')->id,'modificacion Red Social Delegado','update_web_inner'); 
            return redirect()->route('add_socialweb', $peticion)->with('status','Red Social Modificada');
        
    }


    public function delete_web_register( $id)
    {

                
               $red = redessocialesdelegado::findOrFail($id);

    // Update the id_status column
    $red->delete();

        $this->logs(session('usuario')->id,'Eliminacion Red Social Delegado','delete_web_register'); 
            return back()->with('status','Red Social Eliminada');
        
    }

    public function configurations()
    {
        if(session('usuario')){
            //$this->logs(session('usuario')->id,'Carga de pagina','configurations'); 
            return view('configurations');
        }
        else
            // $this->logs(session('usuario')->id,'Redireccionamiento','configurations'); 
        return $this->index();

    }
    public function enterprises()
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','enterprises'); 
        if(session('usuario')){
            $dc=db::table('datos_empresas')->count();
            if(session('usuario')->role >= 8){

                $empresas=DB::table('datos_empresas')
            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->join('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->leftjoin('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->leftjoin('datos_embajadas','datos_embajadas.enterprise_id','=','contenido_empresas.enterprise_id')
            
            ->select(
            'datos_empresas.*',
             'datos_empresas.id as id_empresa',
            'origen.paisnombre as pais_origen',
            DB::raw('count(case when contenido_empresas.status <> 0 then 1 else null end) as visualizar'),
            DB::raw('count(datos_embajadas) as visualizare'),
            'registro.paisnombre as lregistro')
            ->groupBy('datos_empresas.id','origen.paisnombre','registro.paisnombre')
            ->OrderBy('id')
           ->get();
          // dd($empresas);
           //$dato=datosembajada::count();
           //dd($dato);

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
            ->leftjoin('datos_embajadas','datos_embajadas.enterprise_id','=','contenido_empresas.enterprise_id')
            
            ->select(
            'datos_empresas.*',
             'datos_empresas.id as id_empresa',
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
           // $this->logs(session('usuario')->id,'Redireccionamiento','enterprises'); 
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
        $this->logs(session('usuario')->id,'Creacion Empresa','enterprises_register'); 
        return back()->with('status','Empresa Registrada');
    }

    public function delete_enterprises($id)
    {
        
         
               $empresa = datosempresa::findOrFail($id);

    // Update the id_status column
    $empresa->update(['status' => 0]);

            $this->logs(session('usuario')->id,'Eliminacion Empresa','delete_enterprises'); 
            return back()->with('status','Empresa Eliminada');
    }

    public function edit_enterprises($id)
    {   
        //$this->logs(session('usuario')->id,'Carga de pagina','edit_enterprises'); 
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
            $this->logs(session('usuario')->id,'Modificacion Empresa','update_enterprises'); 
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
            $this->logs(session('usuario')->id,'Suspension Empresa','suspend_enterprises'); 
            return back()->with('status','Empresa Modificada');
    
        
    }

 public function asociador_eliminar( $id)
    {

                
               $delegados = asociadorxempresasxrepresentante::findorFail($id);
               $peticion=$delegados->enterprise_id;
               //dd($red);
    // Update the id_status column
    $delegados->delete();

        $this->logs(session('usuario')->id,'Eliminacion Delegado a Empresa','asociador_eliminar'); 
            return redirect()->route('asociador', $peticion)->with('status','Delegado Eliminado');
        
    }


    public function asociador_modificar($id)
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','asociador_modificar'); 
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
            $this->logs(session('usuario')->id,'modificacion','asociador_modificador'); 
            return redirect()->route('asociador', $peticion)->with('status','Red Social Modificada');
        
    }

public function asociador($id)
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','asociador'); 
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
                $this->logs(session('usuario')->id,'Asociacion Delegado a Empresa','asociador_registrado'); 
            return back()->with('status','Delegado Asociado');
        }
    }



public function add_web($id)
    {   
        //$this->logs(session('usuario')->id,'Carga de pagina','add_web'); 
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
                $this->logs(session('usuario')->id,'Registro Red Social Empresa','web_register_enterprise'); 
            return back()->with('status','Pagina Web Registrada');
        
    }


    public function edit_web_enterprise($id)
    {
         //$this->logs(session('usuario')->id,'Carga de pagina','edit_web_enterprise');
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
             $this->logs(session('usuario')->id,'modificacion Red Social Empresa','update_web_enterprise_inner');
            return redirect()->route('add_web', $peticion)->with('status','Red Social Modificada');
        
    }


    public function delete_web_enterprise_register( $id)
    {

                
               $red = redessocialesempresa::findorFail($id);
               $peticion=$red->enterprise_id;
               //dd($red);
    // Update the id_status column
    $red->delete();

            $this->logs(session('usuario')->id,'Eliminacion Red Social Empresa','delete_web_enterprise_register');
            return redirect()->route('add_web', $peticion)->with('status','Red Social Eliminada');
        
    }




    public function previews($id)
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','previews');
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

           $delegados=db::table('inversionista_naturals')
           ->join('asociador_empresas_representantes as asociador','asociador.delegate_id','=','inversionista_naturals.id')
           ->select('inversionista_naturals.*','inversionista_naturals.id as id','asociador.type')
           ->where('inversionista_naturals.status','!=',0)
           ->where('asociador.enterprise_id','=',$id)
           ->OrderBy('asociador.type','asc')
           ->OrderBy('inversionista_naturals.nombre','ASC')->get();

           $conteo=db::table('inversionista_naturals')
           ->join('asociador_empresas_representantes as asociador','asociador.delegate_id','=','inversionista_naturals.id')
           
           ->where('inversionista_naturals.status','!=',0)
           ->where('asociador.enterprise_id','=',$id)
           ->count();

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



  //dd($delegados);




            return view('previews' ,['instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo,'delegados' => $delegados,'conteo'=>$conteo]);
   
        }
        else
           // $this->logs(session('usuario')->id,'Redireccionamiento','previews');
        return $this->index();
    }

    public function prueba_pdf($id)
    {//dd($ide);
        $this->logs(session('usuario')->id,'Impresion','prueba_pdf');
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

  
     return view('prueba_pdf' ,['instagram' => $instagram,'previa' => $previa,'facebook' => $facebook,'twitter' => $twitter,'linkedin' => $linkedin,'telefono' => $telefono,'correo' => $correo]);
    }


public function previews_delegates($id)
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','previews_delegates');
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
            // $this->logs(session('usuario')->id,'Redireccionamiento','previews_delegates');
        return $this->index();
    }

    public function prueba_delegates_pdf($id)
    {
          $this->logs(session('usuario')->id,'Impresion','prueba_delegates_pdf');
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
            // $this->logs(session('usuario')->id,'Redireccionamiento','prueba_delegates_pdf');
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
                 $this->logs(session('usuario')->id,'Creacion hoja de Empresas','elaborar');
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
                 $this->logs(session('usuario')->id,'Creacion hoja de delegados','elaborar_delegates');
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
                 $this->logs(session('usuario')->id,'Certificacion','revisar');
                 return redirect()->route('enterprises')->with('status','Documento Certificado');
                }
                
                elseif($empresas->status==1)
                {    //dd(session('usuario')->id);
                    $empresas->update(['status' => '2']);
                    $empresas->update(['revisado' => session('usuario')->id]);
                     $this->logs(session('usuario')->id,'Revision','revisar');
                     return redirect()->route('enterprises')->with('status','Documento Revisado');
        } 
                elseif($empresas->status==3)
                {    //dd(session('usuario')->id);
                    $empresas->update(['status' => '4']);
                    $empresas->update(['aprobado' => session('usuario')->id]);
                     $this->logs(session('usuario')->id,'Aprobacion','revisar');
                     return redirect()->route('prueba_pdf', $empresas->id)->with('status','Documento Aprobado');
        }
        elseif($empresas->status==4)
                {    //dd(session('usuario')->id);
                 $this->logs(session('usuario')->id,'Impresion','revisar');
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
                $this->logs(session('usuario')->id,'Certificacion','revisar_delegados');
                 return redirect()->route('delegates')->with('status','Documento Certificado');
                }
                
                elseif($empresas->status==1)
                {    //dd(session('usuario')->id);
                    $empresas->update(['status' => '2']);
                    $empresas->update(['revisado' => session('usuario')->id]);
                    $this->logs(session('usuario')->id,'Revision','revisar_delegados');
                     return redirect()->route('delegates')->with('status','Documento Revisado');
        } 
                elseif($empresas->status==3)
                {    //dd(session('usuario')->id);
                    $empresas->update(['status' => '4']);
                    $empresas->update(['aprobado' => session('usuario')->id]);
                    $this->logs(session('usuario')->id,'Aprobacion','revisar_delegados');
                     return redirect()->route('prueba_delegates_pdf', $empresas->id)->with('status','Documento Aprobado');
        }
        elseif($empresas->status==4)
                {    //dd(session('usuario')->id);
                    $this->logs(session('usuario')->id,'Impresion','revisar_delegados');
                     return redirect()->route('prueba_delegates_pdf', $empresas->id)->with('status','Impreso');
        }

                
        
        //dd($request);
         
        
    }


public function elaborador($id)
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','elaborador');
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
           // $this->logs(session('usuario')->id,'Redireccionamiento','elaborador');
        return $this->index();
    }

public function elaborador_delegados($id)
    {   
        //$this->logs(session('usuario')->id,'Carga de pagina','elaborador_delegados');
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
           // $this->logs(session('usuario')->id,'Redireccionamiento','elaborador_delegados');
        return $this->index();
    }

public function suspender_pdf($id){

     $previa = contenidoempresa::find($id);
     if($previa->status != 0)
     {
        $previa->update(['status' => '0']);
        $this->logs(session('usuario')->id,'Eliminacion','suspender_pdf');
        return redirect()->route('enterprises')->with('status','Documento Eliminado');
}
elseif($previa->status == 0)
{
    $previa->update(['status' => '1']);
    $this->logs(session('usuario')->id,'Restauracion','suspender_pdf');
        return redirect()->route('enterprises')->with('status','Documento Restaurando');
}
     
     
}

public function suspender_pdf_delegados($id){

     $previa = contenidorepresentante::find($id);
      if($previa->status != 0)
     {
        $previa->update(['status' => '0']);
        $this->logs(session('usuario')->id,'Eliminacion','suspender_pdf_delegados');
        return redirect()->route('enterprises')->with('status','Documento Eliminado');
}
elseif($previa->status == 0)
{
    $previa->update(['status' => '1']);
     $this->logs(session('usuario')->id,'Restauracion','suspender_pdf_delegados');
        return redirect()->route('enterprises')->with('status','Documento Restaurando');
}
}

    public function modificar_elaborador_delegados($id)
    {   
        //$this->logs(session('usuario')->id,'Carga de pagina','modificar_elaborador_delegados');
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
             // $this->logs(session('usuario')->id,'Redireccionamiento','modificar_elaborador_delegados');
        return $this->index();
    }

    public function modificar_elaborador_empresas($id)
    {
          //$this->logs(session('usuario')->id,'Carga de pagina','modificar_elaborador_empresas');
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
            // $this->logs(session('usuario')->id,'Redireccionamiento','modificar_elaborador_empresas');
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
            $this->logs(session('usuario')->id,'modificacion Hoja de Delegados','modificar_elaborar_delegados');
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
            $this->logs(session('usuario')->id,'modificacion Hoja de Empresas','modificar_elaborar_empresas');
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
             $this->logs(session('usuario')->id,'modificacion','embajada_modificador');
            return redirect()->route('embajada', $peticion)->with('status','Documento Modificado Modificada');
        
    
}
public function embajada_modificar($id)
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','embajada_modificar');
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
           // $this->logs(session('usuario')->id,'Redireccionamiento','embajada_modificar');
        return $this->index();
    }

 public function embajada($id)
    {
         //$this->logs(session('usuario')->id,'Carga de pagina','embajada');
        if(session('usuario')){

            $previa=DB::table('datos_empresas')
            ->leftjoin('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->leftjoin('pais as registro','datos_empresas.lregistro','=','registro.id')
            ->leftjoin('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->leftjoin('datos_embajadas','datos_embajadas.enterprise_id','=','datos_empresas.id')
            ->leftjoin('pais as embajada','datos_embajadas.pais','=','embajada.id')
            ->leftjoin('inversionista_naturals as delegado','delegado.id','=','contenido_empresas.delegate_id')
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
            // $this->logs(session('usuario')->id,'Redireccionamiento','embajada');
        return $this->index();
    }


    public function embajada_print($id)
    {//dd($id);
         $this->logs(session('usuario')->id,'Impresion','embajada_print');
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
            // $this->logs(session('usuario')->id,'Redireccionamiento','embajada_print');
        return $this->index();
    }



public function embajada_eliminador($id){
       $red = datosembajada::findOrFail($id);

    // Update the id_status column
    $red->delete();
    $this->logs(session('usuario')->id,'Eliminacion Hoja Embajada','embajada_eliminador');
      return redirect()->route('enterprises')->with('status','Documento Eliminado');
}




    public function embajada_register($id)
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','embajada_register');
        if(session('usuario')){

            $previa=DB::table('contenido_empresas')
            ->leftjoin('datos_empresas as empresas','empresas.id','=','contenido_empresas.enterprise_id')
            ->leftjoin('inversionista_naturals as delegado','delegado.id','=','contenido_empresas.delegate_id')
            ->leftjoin('pais','pais.id','=','empresas.pais_origen')
            ->select(
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
                'empresas.id as id',
               )
            ->where('contenido_empresas.enterprise_id','=',$id)
            ->where('contenido_empresas.status','!=',0)
            ->OrderBy('contenido_empresas.created_at','desc')

           
           ->first();

           //dd($previa);




        //dd($previa);



           $paises=db::table('pais')->orderby('paisnombre','asc')->get();

           //dd($paises);




  //dd($twitter);




            return view('embajada_register' ,['previa' => $previa,'paises'=> $paises]);
   
        }
        else
           // $this->logs(session('usuario')->id,'Redireccionamiento','embajada_register');
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
                
        $this->logs(session('usuario')->id,'Registro','embajada_registrador');
        //dd($request);
            return redirect()->route('enterprises')->with('status','Documento Elaborado');
   
        
    }



public function fases($id, $revision){
    //$this->logs(session('usuario')->id,'Carga de pagina','fases');
   $valor=db::table('sector_empresas')


   ->rightjoin('datos_empresas', 'datos_empresas.id','=','sector_empresas.enterprise_id')
    ->rightjoin('sectors', 'sectors.id', '=', 'sector_empresas.sector_id')

            ->rightjoin('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')

            ->leftjoin('inversionista_naturals','inversionista_naturals.id','=','contenido_empresas.delegate_id')

            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
                ->select('sector_empresas.id',
                    'sectors.sector',
                    'datos_empresas.razonsocial',
                    'inversionista_naturals.nombre',
                    'inversionista_naturals.apellido',
                    'origen.paisnombre as pais',
                    'sector_empresas.cii',
                    'sector_empresas.act',
                    'sector_empresas.ip',

                    'sector_empresas.id as evaluador',
                    'datos_empresas.rif',


                    'sector_empresas.sector_id',
                    )
                ->where('rif',$id)
                ->where('sector_id',$revision)
                ->OrderBy('sector_empresas.created_at','desc')
                ->first();

                $fase=db::table('sector_fases')->where('sector_id',$valor->evaluador)->first();

                  $versiones=db::table('sector_empresas')
   ->rightjoin('datos_empresas', 'datos_empresas.id','=','sector_empresas.enterprise_id')
    ->rightjoin('sectors', 'sectors.id', '=', 'sector_empresas.sector_id')

       
                ->select('sector_empresas.id','sector_empresas.updated_at','datos_empresas.rif as rif','sector_empresas.id as evaluador')
                ->where('datos_empresas.rif',$id)
                ->where('sector_id',$revision)
                ->OrderBy('sector_empresas.created_at','desc')
                ->get();
//dd($valor);
    
 // dd($versiones);
   return view('fases',['valor' => $valor,'fase'=>$fase,'versiones'=>$versiones]);
}

public function fases_registro(request $request , $id)
{
   // dd($id);
    $fases=sector_fase::all()->where('sector_id',$id)->first();
    //dd($request);
    if($fases==null){
        $registry=new sector_fase;

        $registry -> sector_id = $id;
        if($request->ob)
        {
        $registry -> ob = $request->ob;
        }
        if($request->fase1i)
        {
        $registry -> fase1i = $request->fase1i;
        }
        if($request->fase2i)
        {
        $registry -> fase2i = $request->fase2i;
        }if($request->fase3i)
        {
        $registry -> fase3i = $request->fase3i;
        }if($request->fase4i)
        {
        $registry -> fase4i = $request->fase4i;
        }if($request->fase5i)
        {
        $registry -> fase5i = $request->fase5i;
        }if($request->fase6i)
        {
        $registry -> fase6i = $request->fase6i;
        }if($request->fase7i)
        {
        $registry -> fase7i = $request->fase7i;
        }
        $registry ->save();
        $this->logs(session('usuario')->id,'Creacion','fases_registro');
        return back()->with('status','Observacion/Fase Añadida');
    }
    else{
         if($request->ob != $fases->ob && $request->ob!="" ||  $request->ob != $fases->ob && $request->ob!=" " ||  $request->ob != $fases->ob && $request->ob!=null)
        { 
            $fases ->update(['ob' => $request->ob]);
            $this->logs(session('usuario')->id,'Observacion Modificacion','fases_registro');
            return back()->with('status','Observacion Modificada');
     }

     if($request->fase1i)
        { //dd();
            $fases ->update(['fase1i' => $request->fase1i]);
            $fases ->update(['fase1status' => 2]);
            $this->logs(session('usuario')->id,'Creacion fase 1','fases_registro');
            return back()->with('status','Fase Iniciada');
     }
     if($request->fase2i)
        { //dd();
            $fases ->update(['fase2i' => $request->fase2i]);
                $fases ->update(['fase2status' => 2]);
                $this->logs(session('usuario')->id,'Creacion fase 2','fases_registro');
            return back()->with('status','Fase Iniciada');
     }
     if($request->fase3i)
        { //dd();
            $fases ->update(['fase3i' => $request->fase3i]);
                $fases ->update(['fase3status' => 2]);
                $this->logs(session('usuario')->id,'Creacion fase 3','fases_registro');
            return back()->with('status','Fase Iniciada');
     }
     if($request->fase4i)
        { //dd();
            $fases ->update(['fase4i' => $request->fase4i]);
                $fases ->update(['fase4status' => 2]);
                $this->logs(session('usuario')->id,'Creacion fase 4','fases_registro');
            return back()->with('status','Fase Iniciada');
     }
     if($request->fase5i)
        { //dd();
            $fases ->update(['fase5i' => $request->fase5i]);
                $fases ->update(['fase5status' => 2]);
                $this->logs(session('usuario')->id,'Creacion fase 5','fases_registro');
            return back()->with('status','Fase Iniciada');
     }
     if($request->fase6i)
        { //dd();
            $fases ->update(['fase6i' => $request->fase6i]);
                $fases ->update(['fase6status' => 2]);
                $this->logs(session('usuario')->id,'Creacion fase 6','fases_registro');
            return back()->with('status','Fase Iniciada');
     }
     if($request->fase7i)
        { //dd();
            $fases ->update(['fase7i' => $request->fase7i]);
                $fases ->update(['fase7status' => 2]);
                $this->logs(session('usuario')->id,'Creacion fase 7','fases_registro');
            return back()->with('status','Fase Iniciada');
     }

     if($request->fase1f)
        { //dd();
            $fases ->update(['fase1f' => $request->fase1f]);
            $fases ->update(['fase1status' => 3]);
            $this->logs(session('usuario')->id,'Finalizacion fase 1','fases_registro');
            return back()->with('status','Fase Finalizada');
     }
     if($request->fase2f)
        { //dd();
            $fases ->update(['fase2f' => $request->fase2f]);
                $fases ->update(['fase2status' => 3]);
                $this->logs(session('usuario')->id,'Finalizacion fase 2','fases_registro');
            return back()->with('status','Fase Finalizada');
     }
     if($request->fase3f)
        { //dd();
            $fases ->update(['fase3f' => $request->fase3f]);
                $fases ->update(['fase3status' => 3]);
                $this->logs(session('usuario')->id,'Finalizacion fase 3','fases_registro');
            return back()->with('status','Fase Finalizada');
     }
     if($request->fase4f)
        { //dd();
            $fases ->update(['fase4f' => $request->fase4f]);
                $fases ->update(['fase4status' => 3]);
                $this->logs(session('usuario')->id,'Finalizacion fase 4','fases_registro');
            return back()->with('status','Fase Finalizada');
     }
     if($request->fase5f)
        { //dd();
            $fases ->update(['fase5f' => $request->fase5f]);
                $fases ->update(['fase5status' => 3]);
                $this->logs(session('usuario')->id,'Finalizacion fase 5','fases_registro');
            return back()->with('status','Fase Finalizada');
     }
     if($request->fase6f)
        { //dd();
            $fases ->update(['fase6f' => $request->fase6f]);
                $fases ->update(['fase6status' => 3]);
                $this->logs(session('usuario')->id,'Finalizacion fase 6','fases_registro');
            return back()->with('status','Fase Finalizada');
     }
     if($request->fase7f)
        { //dd();
            $fases ->update(['fase7f' => $request->fase7f]);
                $fases ->update(['fase7status' => 3]);
                $this->logs(session('usuario')->id,'Finalizacion fase 7','fases_registro');
            return back()->with('status','Fase Finalizada');
     }
     $this->logs(session('usuario')->id,'modificacion','fases_registro');
        return back()->with('status','Documento Modificado');
    }

}






    public function sector_modificador(request $request,$id){
   

$empresas=sector_empresa::findorfail($id);

  // dd($request);



   if($request->cii != $empresas->cii && $request->cii!="" ||  $request->cii != $empresas->cii && $request->cii!=" " ||  $request->cii != $empresas->cii && $request->cii!=null)
        {  
               // dd("B");
                $empresas->update(['cii' => $request->cii]);
            }

            if($request->act != $empresas->act && $request->act!="" ||  $request->act != $empresas->act && $request->act!=" " ||  $request->act != $empresas->act && $request->act!=null)
        {  
              //  dd("C");
                $empresas->update(['act' => $request->act]);
            }

            if($request->ip != $empresas->ip && $request->ip!="" ||  $request->ip != $empresas->ip && $request->ip!=" " ||  $request->ip != $empresas->ip && $request->ip!=null)
        {  
              //  dd("D");
                $empresas->update(['ip' => $request->ip]);
            }

             $this->logs(session('usuario')->id,'Modificacion','sector_modificador');
   return redirect()->route('sector_vizualizador', ['id'=>$request->rif,'revision'=>$request->sector_id])->with('status','Datos Modificados');
} 

    public function sector_modificar($id){
         //$this->logs(session('usuario')->id,'Carga de pagina','sector_modificar');
   $valor=db::table('sector_empresas')
   ->rightjoin('datos_empresas', 'datos_empresas.id','=','sector_empresas.enterprise_id')
    ->rightjoin('sectors', 'sectors.id', '=', 'sector_empresas.sector_id')

            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')

            ->join('inversionista_naturals','inversionista_naturals.id','=','contenido_empresas.delegate_id')

            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
                ->select('sector_empresas.id',
                    'sectors.sector',
                    'datos_empresas.razonsocial',
                    'inversionista_naturals.nombre',
                    'inversionista_naturals.apellido',
                    'origen.paisnombre as pais',
                    'sector_empresas.cii',
                    'sector_empresas.act',
                    'sector_empresas.ip',

                    'datos_empresas.rif',

                    'sectors.sector',


                    'origen.paisnombre',

                    'sector_empresas.sector_id',

                    )
                ->where('sector_empresas.id',$id)
            
                ->first();
//dd($valor);
  
 // dd($versiones);
   return view('sector_modificar',['valor' => $valor]);
}

public function sector_vizualizador($id, $revision){
     //$this->logs(session('usuario')->id,'Carga de pagina','sector_vizualizador');
   $valor=db::table('sector_empresas')
   ->rightjoin('datos_empresas', 'datos_empresas.id','=','sector_empresas.enterprise_id')
    ->rightjoin('sectors', 'sectors.id', '=', 'sector_empresas.sector_id')

            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')

            ->join('inversionista_naturals','inversionista_naturals.id','=','contenido_empresas.delegate_id')

            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
                ->select('sector_empresas.id',
                    'sectors.sector',
                    'datos_empresas.razonsocial',
                    'inversionista_naturals.nombre',
                    'inversionista_naturals.apellido',
                    'origen.paisnombre as pais',
                    'sector_empresas.cii',
                    'sector_empresas.act',
                    'sector_empresas.ip',

                    'sector_empresas.id as evaluador',
                    'datos_empresas.rif',


                    'sector_empresas.sector_id',
                    )
                ->where('rif',$id)
                ->where('sector_id',$revision)
                ->OrderBy('sector_empresas.created_at','desc')
                ->first();
//dd($valor);
    $versiones=db::table('sector_empresas')
   ->rightjoin('datos_empresas', 'datos_empresas.id','=','sector_empresas.enterprise_id')
    ->rightjoin('sectors', 'sectors.id', '=', 'sector_empresas.sector_id')

       
                ->select('sector_empresas.id','sector_empresas.updated_at','datos_empresas.rif as rif','sector_empresas.id as evaluador')->where('datos_empresas.rif',$id)->where('sector_id',$revision)->OrderBy('sector_empresas.created_at','desc')->get();
 // dd($versiones);
   return view('sector_vizualizador',['valor' => $valor,'versiones'=>$versiones]);
}

public function sector_imprenta($id){
     $this->logs(session('usuario')->id,'Impresion','sector_imprenta');
   $valor=db::table('sector_empresas')
   ->rightjoin('datos_empresas', 'datos_empresas.id','=','sector_empresas.enterprise_id')
    ->rightjoin('sectors', 'sectors.id', '=', 'sector_empresas.sector_id')

            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')

            ->join('inversionista_naturals','inversionista_naturals.id','=','contenido_empresas.delegate_id')

            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->leftjoin('sector_fases', 'sector_fases.sector_id', '=', 'sector_empresas.id')
                ->select('sector_empresas.id',
                    'sectors.sector',
                    'datos_empresas.razonsocial',
                    'inversionista_naturals.nombre',
                    'inversionista_naturals.apellido',
                    'origen.paisnombre as pais',
                    'sector_empresas.cii',
                    'sector_empresas.act',
                    'sector_empresas.ip',

                    'sector_empresas.id as evaluador',
                    'datos_empresas.rif',


                    'sector_empresas.sector_id',
                    'sector_fases.*'
                    )
                ->where('sector_empresas.id',$id)
               
                ->OrderBy('sector_empresas.created_at','desc')
                ->first();
//dd($valor);
  
 // dd($versiones);
   return view('sector_imprenta',['valor' => $valor]);
}
public function sectores()
    {
         //$this->logs(session('usuario')->id,'Carga de pagina','sectores');
        if(session('usuario')){
            $sectores=sectors::all();
            //dd($sectores);
            $dc=db::table('sector_empresas')->count();
           

         $empresas = DB::table('datos_empresas')
    ->join('pais as origen', 'datos_empresas.pais_origen', '=', 'origen.id')
    ->rightjoin('sector_empresas', 'sector_empresas.enterprise_id', '=', 'datos_empresas.id')
    ->rightjoin('sectors', 'sectors.id', '=', 'sector_empresas.sector_id')
    ->select(
          'sectors.id as sector_valor',  
        'sectors.sector as sector_id',  // Group by sector name
          'sector_empresas.sector_id as revision', 
         
       
        'datos_empresas.*',
        'origen.paisnombre as pais_origen', 'sectors.sector','sector_empresas.created_at', 
    )
    ->groupBy('sector_empresas.created_at','sectors.sector','sectors.id','sector_empresas.sector_id','datos_empresas.id','origen.paisnombre')  // Grouping by sector name
    ->orderBy('sectors.sector', 'ASC')
    ->get();

           //dd($sectores);
           //dd($empresas);

           $generador=DB::table('datos_empresas')
            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            
            
            ->count()
           ;
          // dd($empresas);
 $valor=DB::table('datos_empresas')->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')->where('contenido_empresas.status','!=','0')->count();
           

           
            
            $pais=db::table('pais')->OrderBy('paisnombre')->get();
            //dd($generador);
            return view('sectores',['empresas'=>$empresas,'pais'=>$pais,'generador'=>$generador,'dc' => $dc,'sectores' => $sectores,'valor' => $valor]);
        }
        else
            // $this->logs(session('usuario')->id,'Redireccionamiento','sectores');
        return $this->index();
    }


    public function sectores_empresa_registro($id)
    {   
           //$this->logs(session('usuario')->id,'Carga de pagina','sectores_empresa_registro');
        if(session('usuario')){
            $sectores=sectors::all()->where('sector',$id)->first();
            //dd($sec);
            

                $empresas=DB::table('datos_empresas')
            ->join('pais as origen','datos_empresas.pais_origen','=','origen.id')
            ->join('contenido_empresas','contenido_empresas.enterprise_id','=','datos_empresas.id')
            ->leftjoin('inversionista_naturals','inversionista_naturals.id','=','contenido_empresas.delegate_id')
            
            ->select(
            'datos_empresas.*',
            'origen.paisnombre as pais_origen',
            'origen.id as pais',
            'inversionista_naturals.id as delegado_id',
            'inversionista_naturals.nombre as delegate_id',
            'inversionista_naturals.apellido as delegatee_id',
        )
            ->groupBy(
                'datos_empresas.id',
                'datos_empresas.rif',
                'origen.id',
                'origen.paisnombre',
                'inversionista_naturals.nombre',
                'inversionista_naturals.apellido',
                'inversionista_naturals.id'
            )
            ->OrderBy('id')
           ->get();
           //dd($empresas);

           //dd($empresas);

            
           
            return view('sectores_empresa_registro',['empresas'=>$empresas,'sectores' => $sectores]);
        }
        else
            // $this->logs(session('usuario')->id,'Redireccionamiento','sectores_empresa_registro');
        return $this->index();
    }



     public function sectores_empresa_registrar(request $request)
    {
      $registry=new sector_empresa;
      $registry -> delegate_id=$request->delegate_id;
      $registry -> enterprise_id=$request->empresa_id;
      $registry -> cii=$request->cii;
      $registry -> sector_id=$request->sector_id;
      $registry -> act=$request->act;
      $registry -> ip=$request->ip;
      //dd($registry);
      $registry ->save();
      $this->logs(session('usuario')->id,'Relacion empresa/sector','sectores_empresa_registrar');
      return redirect()->route('sectores')->with('status','Relacion de sectores creado');
    }



    public function results()
    {   //$this->logs(session('usuario')->id,'Carga de pagina','results');
        if(session('usuario')){
            return view('results');
        }
        else
           // $this->logs(session('usuario')->id,'Redireccionamiento','results');
        return $this->index();
    }

   public function actividades()
{
    $actividades = DB::table('logs')
        ->join('users', 'users.id', '=', 'logs.usuario')
        ->select('logs.*','logs.created_at', DB::raw('users.email AS usuario'))
        ->orderBy('logs.id', 'DESC')
        ->orderBy('logs.created_at', 'DESC')
        ->get();

      

   

    return datatables()->of($actividades)->toJson() ; 

}

public function usuarios()
{
 

        $users= db::table('users')->OrderBy('role','desc')->orderby('id','asc')->get();

   

    return datatables()->of($users)->toJson() ; 
    
}
public function empresas()
{
 

       $datos_empresas= db::table('datos_empresas')->orderby('id','asc')->get();

   

    return datatables()->of($datos_empresas)->toJson() ; 
    
}
public function representantes()
{
 

       $inversionista_naturals= db::table('inversionista_naturals')->orderby('id','asc')->get();

   

    return datatables()->of( $inversionista_naturals)->toJson() ; 
    
}

public function generos()
{
 

        $generos= db::table('generos')->orderby('id','asc')->get();

   

    return datatables()->of( $generos)->toJson() ; 
    
}
public function paises()
{
 

       $paises= db::table('pais')->orderby('id','asc')->get();

   

    return datatables()->of( $paises)->toJson() ; 
    
}

public function nacionalidades()
{
 

       $nacionalidades= db::table('nacionalidad')->orderby('id','asc')->get();

   

    return datatables()->of($nacionalidades)->toJson() ; 
    
}
public function sectores_d()
{
 

        $sectores= db::table('sectors')->orderby('id','asc')->get();

   

    return datatables()->of($sectores)->toJson() ; 
    
}
public function estados_civiles()
{
 

        $estados_civiles= db::table('estados_civiles')->orderby('id','asc')->get();

   

    return datatables()->of($estados_civiles)->toJson() ; 
    
}

public function contenido_empresas()
{
 

        $contenido_empresas= db::table('contenido_empresas')->orderby('id','asc')->get();

   

    return datatables()->of(  $contenido_empresas)->toJson() ; 
    
}
public function contenido_representantes()
{
 

        $contenido_representantes= db::table('contenido_representantes')->orderby('id','asc')->get();

   

    return datatables()->of(   $contenido_representantes)->toJson() ; 
    
}

public function datos_embajadas()
{
 

      $datos_embajadas= db::table('datos_embajadas')->orderby('id','asc')->get();

   

    return datatables()->of($datos_embajadas)->toJson() ; 
    
}
public function redes_sociales()
{
 

        $rrsss= db::table('rrss')->orderby('id','asc')->get();

   

    return datatables()->of( $rrsss)->toJson() ; 
    
}
public function redes_sociales_delegados()
{
 

       $redes_sociales_delegados= db::table('redes_sociales_delegados')->orderby('id','asc')->get();

   

    return datatables()->of($redes_sociales_delegados)->toJson() ; 
    
}
public function redes_sociales_empresas()
{
 

       $redes_sociales_empresas= db::table('redes_sociales_empresas')->orderby('id','asc')->get();

   

    return datatables()->of( $redes_sociales_empresas)->toJson() ; 
    
}

public function sectores_empresas()
{
 

      $sectores_empresas= db::table('sector_empresas')->orderby('id','asc')->get();

   

    return datatables()->of($sectores_empresas)->toJson() ; 
    
}
public function sectores_fases()
{
 

        $sectores_fases= db::table('sector_fases')->orderby('id','asc')->get();

   

    return datatables()->of($sectores_fases)->toJson() ; 
    
}
public function asociador_er()
{
 

        $asociador_empresas_representantes= db::table('asociador_empresas_representantes')->orderby('id','asc')->get();

   

    return datatables()->of( $asociador_empresas_representantes)->toJson() ; 
    
}


    public function logss()
    {   
        //$this->logs(session('usuario')->id,'Carga de pagina','stadistics');
        if(session('usuario') && session('usuario')->role>8){
           
           
          
            return view('logss');
        }
        else
           // $this->logs(session('usuario')->id,'Redireccionamiento','stadistics');
        return $this->index();

    }

     public function logs($usuario, $accion ,$controlador)
    {
        
        $log=new logs;
        $log -> ip = request()->ip();
        $log -> usuario = $usuario;
        $log -> accion = $accion;
        $log -> controlador = $controlador;
        //dd($log);
        $log ->save();
    }
    public function userpanel()
    {
        //$this->logs(session('usuario')->id,'Carga de pagina','userpanel');
        if(session('usuario')){
            return view('Userpanel');
        }
        else
           // $this->logs(session('usuario')->id,'Redireccionamiento','userpanel');
        return $this->index();
    }
    public function logout()
    {
      // $this->logs(session('usuario')->id,'Salida','logout');
        session()->forget('usuario');
        return $this->index();
        
    }


}
