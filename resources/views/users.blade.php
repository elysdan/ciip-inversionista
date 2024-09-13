@extends('layouts.panel')
@section('content')
@endsection
@section('usuarios') 

<h2>Usuarios</h2>
<button type="button" 
class="btn btn-outline-success mt-3 mb-3 p-0" 

style="font-size:3vw;width: 4.5vw;border-radius:1rem;align-items: center;align-content: center;" 
data-toggle="modal" data-target="#RegModal" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" align="center" viewBox="0 0 16 16" style="width: 3vw;height:3vw">
    
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
    
        <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
    
    </svg>
</button>
  
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr style="text-align: center;">
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Correo</th>
              <th scope="col">Rol</th>
              <th scope="col">Foto de perfil</th>
              <th scope="col" colspan="2"></th>
            </tr>
          </thead>
          <tbody>
             @php $n=1; @endphp
            @foreach($usuarios as $usuario)
            <tr style="text-align: center;line-height: 8vw;">
              <td>@php echo $n; @endphp</td>
              <td>{{$usuario->name}}</td>
              <td>{{$usuario->surname}}</td>
              <td>{{$usuario->email}}</td>
              <td>{{$usuario->role}}</td>
              <td><img src="{{$usuario->file}}" style="width: 8vw;"></td>
              <td><a href="{{route('edit_users',$usuario->id)}}"><button class="btn btn-warning" >Modificar</button></a></td>
              <td><form method="POST" action="{{route('delete_users',$usuario->id)}}"> @csrf @method('PUT')<input class="btn btn-danger" type="submit"  value="Suspender"></form></td>
              @php $n++; @endphp
            @endforeach
            </tr>
            
          </tbody>
        </table>
      </div>
     
      <div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Creacion de Usuarios</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              <form action="{{route('users_register')}}" method="POST" enctype="multipart/form-data"  >
                @csrf
                <div class="form-group">
                  <label for="recipient-nombre" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" id="recipient-nombre" name="nombre">
                    <label for="recipient-apellido" class="col-form-label">Apellido:</label>
                    <input type="text" class="form-control" id="recipient-apellido" name="apellido">
                
                    <label for="recipient-correo" class="col-form-label">Correo Electronico:</label>
                    <input type="email" class="form-control" id="recipient-correo" name="correo">
                 
                    <label for="recipient-rol" class="col-form-label">Rol:</label>
                    <select class="form-control" id="recipient-rol" name="rol">
                        <option selected>Seleccione una opcion</option>
                        <option value="1">Ordinario</option>
                        <option value="2">Administrador</option>
                        <option value="9">Super Usuario</option>
                      </select>
                    
                    <label for="recipient-contrasena" class="col-form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="recipient-contrasena" name="contrasena">
                  
                    <label for="recipient-foto" class="col-form-label">Foto de Perfil:</label>
                    <input type="file" class="form-control" id="recipient-foto" name="foto" accept="image/*">
                  </div>
                  
              
            </div>
            <div class="modal-footer">
              <input type="submit" value="Registrar" class="btn btn-primary">
           
            </div>
          </form>
          </div>
      
        </div>
      </div>
      @if(session('status'))


<div class="alert alert-danger d-flex align-items-center mt-1 " role="alert">
  
  <div>
    {{session('status')}}
  </div>
</div>
@endif
    @endsection
    