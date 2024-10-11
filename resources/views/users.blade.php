@extends('layouts.panel')

@section('usuarios') 

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      
        <style>
          .table td{vertical-align: inherit;"}
        </style>
   </head>


   
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Usuarios</h2>
                           </div>
                        </div>
                     </div>

                  
                     <!-- row -->
                    <div class="col-md-12">
  @if(session('usuario')->role >=4)
                         <button type="button" 
class="btn btn-outline-success mt-3 mb-3 p-0" 

 style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;"  
data-toggle="modal" data-target="#RegModal" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" align="center" viewBox="0 0 16 16" style="width: 2vw;height:2vw">
    
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
    
        <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
    
    </svg>
</button>
@endif
<div class="modal fade w-100" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true" style="align-items: center;
  justify-content: center;
  align-content: center;">  
        <div class="modal-dialog w-100" role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Creacion de Usuarios</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              <form action="{{route('users_register')}}" method="POST" enctype="multipart/form-data" id="miFormulario">
                @csrf
                <div class="form-group">
                  <label for="campo1" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" id="campo1" name="nombre" pattern="[A-Za-záÁéÉíÍóÓúÚñÑ' ']{2,100}" maxlength="100" required>
                    <label for="campo2" class="col-form-label">Apellido:</label>
                    <input type="text" class="form-control" id="campo2" name="apellido" pattern="[A-Za-záÁéÉíÍóÓúÚñÑ' ']{2,100}" maxlength="100" required>
                
                    <label for="campo3" class="col-form-label">Correo Electronico:</label>
                    <input type="email" class="form-control" id="campo3" name="correo" pattern="[A-Za-z0-9@.áÁéÉíÍóÓúÚ]{4,256}" maxlength="256" required>
                 @if(session('usuario')->role >= 4)
                    <label for="campo4" class="col-form-label" >Rol:</label>
                    <select class="form-control" id="campo4" name="rol" required>
                        <option selected disabled>Seleccione una opcion</option>
                        <option value="1">Ordinario</option>
                        <option value="2">Invitado</option>
                        <option value="3">Ayudante</option>
                       
                        <option value="4">Tecnico</option>
                        @if(session('usuario')->role >= 5)
                        <option value="5">Licenciado</option>
                        @endif
                        @if(session('usuario')->role >= 6)
                        <option value="6">Coordinador</option>
                        @endif
                        @if(session('usuario')->role >= 7)
                        <option value="7">Gerente</option>
                        @endif
                        @if(session('usuario')->role >= 8)
                        <option value="8">Administrador</option>
                        @endif
                        @if(session('usuario')->role==9)
                        <option value="9">Super Usuario</option>
                        @endif
                        @endif
                        
                       
                      </select>
                    
                    <label for="campo5" class="col-form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="campo5" name="contrasena" pattern="[A-Za-z0-9@.*_'-'+áÁéÉíÍóÓúÚ]{8,100}" maxlength="100" required>
                  
                    <label for="fileInput" class="col-form-label">Foto de Perfil:</label>
                    <input type="file" class="form-control" name="foto" id="fileInput" accept="image/*">
                  </div>
                  <div id="preview" class="w-100"></div>
                        <div class="alert alert-danger" role="alert" id="fileError">
                            Por Favor Seleccione una imagen no mayor a 20 mb, de no tener el sistema pondra una predeterminada.
                        </div>
                  
              
            </div>
            <div class="modal-footer">
              <input type="submit" value="Registrar" id="submitBtn" class="btn btn-primary" disabled>
           
            </div>
          </form>
          </div>
      
        </div>
      </div>
      @if($uc>0)
                           <div class="white_shd full margin_bottom_30">


                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Usuarios del Sistema</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead class="thead" >
                                          <tr style="background-color: #13579e;color: white;">
                                             <th>#</th>
                                             <th>Nombre</th>
                                             <th>Apellido</th>
                                             <th>Correo</th>
@if(session('usuario')->role >= 8 )
                                             <th>Rol</th>
                                              @endif
                                             <th>Foto de Perfil</th>
                                            @if(session('usuario')->role >= 8 )
                                              <th>Status</th>
                                              @endif
                                               @if(session('usuario')->role >= 5 )
                                             <th colspan="2">Gestion de administradores</th>
                                            @endif
                                          </tr>
                                       </thead>
                                       <tbody style="color:black">
                                        @php $n=1; @endphp
                                         @if(session('usuario')->role >= 6)
                                           
            @foreach($usuarios as $usuario)
            
            <tr style="align-items:center;text-align:center;justify-content: center;">
              <td>@php echo $n; @endphp</td>
              <td>{{$usuario->name}}</td>
              <td>{{$usuario->surname}}</td>
              <td>{{$usuario->email}}</td>
              @if(session('usuario')->role >= 8)
              
              <td>@if($usuario->role == 1) Ordinario
              @elseif($usuario->role == 2) Visitante
              @elseif($usuario->role == 3) Ayudante
              @elseif($usuario->role == 4) Tecnico
              @elseif($usuario->role == 5) Licenciado
              @elseif($usuario->role == 6) Coordinador
              @elseif($usuario->role == 7) Gerente
              @elseif($usuario->role == 8) Administrador
              @elseif($usuario->role == 9) Super Usuario
              @endif</td>
              @endif
              
              <td style="vertical-align: top;align-items: center;
  justify-content: center;
  align-content: center;"> <img src="{{$usuario->file}}" style="border-radius: 50%;
  align-items: center;
  justify-content: center;
  align-content: center;
  width: 3vw;"></td>
   @if(session('usuario')->role >=8)
              <td>
                @if($usuario->status==1)
<form method="POST" action="{{route('suspend_users',$usuario->id)}}">
  @csrf
  @method('PUT')
<button type="submit" 
                class="btn btn-outline-success mt-1 mb-1 p-0" 
                
                  style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;">
                     <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
</svg>
                </button>
              </form>
@endif

@if($usuario->status==0)
 <form method="POST" action="{{route('update_users',$usuario->id)}}">
  @csrf
  @method('PUT')

<button type="submit" 
                class="btn btn-outline-danger mt-1 mb-1 p-0" 
                
                  style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;">
                      <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
</svg>
                </button></form>
                


@endif</td>
             
              @endif
              @if(session('usuario')->role >= 5 && session('usuario')->role >= $usuario->role)
              <td><a href="{{route('edit_users',$usuario->id)}}">
                <button type="button" 
                class="btn btn-outline-warning mt-3 mb-3 p-0" 
                
                style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;"> 
                      <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>

                    </svg>
                </button>
                
              </a>
              
            </td>
            @else
             <td>
                <button type="button" 
                class="btn btn-outline-secondary mt-3 mb-3 p-0" 
                
                style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;"> 
                      <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>

                    </svg>
                </button>
                
              
              
            </td>
            @endif

                       @if(session('usuario')->role >= 6 )
  @if(session('usuario')->role >= 6 && session('usuario')->role >= $usuario->role)
              <td>
                
                <button type="button" 
class="btn btn-outline-danger mt-3 mb-3 p-0" 

 style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height:3vw" 
data-toggle="modal" data-target="#DelModal{{$usuario->id}}" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-dash " align="center" viewBox="0 0 16 16" style="width: 2vw;">
      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
      <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
    
    </svg>
</button>

<div class="modal fade" id="DelModal{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true" style="align-items: center;
  justify-content: center;
  align-content: center;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suspender Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
       <h3>¿Desea Suspender Al Usuario?</h3>
      </div>
      <div class="modal-footer">
        
       
        <form method="POST" action="{{route('delete_users',$usuario->id)}}" > 
          @csrf 
          @method('PUT')
          <input class="btn btn-primary" type="submit" value="Si">
        </form>
      </div>
    </form>
    </div>

  </div>
</div>



                
              
              </td>
              @else

                <td>
                
                <button type="button" 
class="btn btn-outline-secondary mt-3 mb-3 p-0" 

 style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height:3vw" 
> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-dash " align="center" viewBox="0 0 16 16" style="width: 2vw;">
      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
      <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
    
    </svg>
</button>






                
              
              </td>
              @endif
              @endif
              
             
            </tr>
            @php $n++; @endphp
            @endforeach
             @else

             @foreach($usuarios as $usuario)
            @if($usuario->status==1)
            <tr style="vertical-align: none;text-align: center;align-items: center;
  justify-content: center;
  align-content: center;" >
              <td>@php echo $n; @endphp</td>
              <td>{{$usuario->name}}</td>
              <td>{{$usuario->surname}}</td>
              <td>{{$usuario->email}}</td>
              @if(session('usuario')->role==9)
              
              <td>{{$usuario->role}}</td>
              @endif
              
              <td style="vertical-align: top;align-items: center;
  justify-content: center;
  align-content: center;"> 
  <img src="{{$usuario->file}}" style="border-radius: 50%;
  align-items: center;
  justify-content: center;
  align-content: center;
  width: 3vw;">
</td>
   @if(session('usuario')->role==9)
              <td>@if($usuario->status==1)
<form method="POST" action="{{route('suspend_users',$usuario->id)}}">
  @csrf
  @method('PUT')
<button type="submit" 
                class="btn btn-outline-success mt-1 mb-1 p-0" 
                
                  style="border-radius: 1rem; display: flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;">
                     <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
</svg>
                </button>
              </form>
@endif

@if($usuario->status==0)
 <form method="POST" action="{{route('update_users',$usuario->id)}}">
  @csrf
  @method('PUT')

<button type="submit" 
                class="btn btn-outline-danger mt-1 mb-1 p-0" 
                
                  style="border-radius: 1rem; display: flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;">
                      <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
</svg>
                </button></form>
                


@endif</td>
             
              @endif
               @if(session('usuario')->role >= 5 )

                           @if(session('usuario')->role >= 5 && session('usuario')->role >= $usuario->role)

              <td><a href="{{route('edit_users',$usuario->id)}}">
                <button type="button" 
                class="btn btn-outline-warning mt-3 mb-3 p-0" 
                
                style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;"> 
                      <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>

                    </svg>
                </button>
                
              </a>
              
            </td>
            @else
             <td>

                <button type="button" 
                class="btn btn-outline-secondary mt-3 mb-3 p-0" 
                
                style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;"> 
                      <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>

                    </svg>
                </button>
                
              
              
            </td>
            @endif
            @endif

                    
                    @if(session('usuario')->role >= 6 )
  @if(session('usuario')->role >= 6 && session('usuario')->role >= $usuario->role)
              <td>
                
                <button type="button" 
class="btn btn-outline-danger mt-3 mb-3 p-0" 

 style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height:3vw" 
data-toggle="modal" data-target="#DelModal{{$usuario->id}}" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-dash " align="center" viewBox="0 0 16 16" style="width: 2vw;">
      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
      <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
    
    </svg>
</button>

<div class="modal fade" id="DelModal{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true" style="align-items: center;
  justify-content: center;
  align-content: center;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suspender Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
       <h3>¿Desea Suspender Al Usuario?</h3>
      </div>
      <div class="modal-footer">
        
       
        <form method="POST" action="{{route('delete_users',$usuario->id)}}" > 
          @csrf 
          @method('PUT')
          <input class="btn btn-primary" type="submit" value="Si">
        </form>
      </div>
    </form>
    </div>

  </div>
</div>



                
              
              </td>
              @else

                <td>
                
                <button type="button" 
class="btn btn-outline-danger mt-3 mb-3 p-0" 

 style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height:3vw" > 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-dash " align="center" viewBox="0 0 16 16" style="width: 2vw;">
      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
      <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
    
    </svg>
</button>






                
              
              </td>
              @endif
              @endif
              
             
            </tr>
            @endif
            @php $n++; @endphp
            @endforeach

            @endif
            
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
      
      @endif



<script>
  function validarCampos() {
      var campo1 = document.getElementById('campo1');
      var campo2 = document.getElementById('campo2');
      var campo3 = document.getElementById('campo3');
      var campo4 = document.getElementById('campo4');
      
      var campo5 = document.getElementById('campo5');
      var fileInput = document.getElementById('fileInput');
      var submitBtn = document.getElementById('submitBtn');
      var valido = campo1.checkValidity() && campo2.checkValidity() && campo3.checkValidity() && campo4.selectedIndex != 0 && campo5.checkValidity();

      submitBtn.disabled = !valido;
  }

  document.getElementById('miFormulario').addEventListener('input', function(event) {
      var campo = event.target;
      if (campo.id === 'campo1') {
          campo.value = campo.value.replace(/[^A-Za-z' 'áÁéÉíÍóÓúÚñÑ]/g, '');
      }
      if (campo.id === 'campo2') {
          campo.value = campo.value.replace(/[^A-Za-z' 'áÁéÉíÍóÓúÚñÑ]/g, '');
      }
      if (campo.id === 'campo3') {
          campo.value = campo.value.replace(/[^A-Za-z0-9@.áÁéÉíÍóÓúÚ]/g, '');
      }
      if (campo.id === 'campo4') {
          campo.value = campo.value.replace(/[^A-Za-z0-9]/g, '');
      }
      if (campo.id === 'campo5') {
          campo.value = campo.value.replace(/[^A-Za-z0-9@.*6'-'_+áÁéÉíÍóÓúÚ]/g, '');
      }
      validarCampos();
  });

  document.getElementById('fileInput').addEventListener('change', function(event) {
      var files = event.target.files;
      var preview = document.getElementById('preview');
      var fileError = document.getElementById('fileError');
      preview.innerHTML = '';
      fileError.style.display = 'none';
      var validFiles = true;

      Array.from(files).forEach(file => {
          if (file.type.startsWith('image/')) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  var container = document.createElement('div');
                  container.classList.add('preview-container');
                  var img = document.createElement('img');
                  img.src = e.target.result;
                  img.addEventListener('click', function() {
                      img.classList.toggle('maximized');
                  });
                  var span = document.createElement('span');
                  span.textContent = file.name.length > 20 ? file.name.substring(0, 20) + '...' : file.name;
                  container.appendChild(img);
                  container.appendChild(span);
                  preview.appendChild(container);
              };
              reader.readAsDataURL(file);
          } else {
              validFiles = false;
          }
      });

      if (!validFiles) {
          fileError.style.display = 'block';
          event.target.value = '';
      }

      validarCampos();
  });

  document.getElementById('miFormulario').addEventListener('submit', function(event) {
      var campo1 = document.getElementById('campo1');
      var campo2 = document.getElementById('campo2');
      var valido = true;

      if (!campo1.checkValidity()) {
          campo1.classList.add('error');
          valido = false;
      } else {
          campo1.classList.remove('error');
      }

      if (!campo2.checkValidity()) {
          campo2.classList.add('error');
          valido = false;
      } else {
          campo2.classList.remove('error');
      }

      if (!valido) {
          event.preventDefault();
      }
  });



</script>

   </body>
</html>
    @endsection
    
    