
@extends('layouts.panel')
@section('content')
    

<div class="form mt-5" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificacion de Usuarios</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <form action="{{route('update_users',$usuario->id)}}" method="POST" enctype="multipart/form-data"  >
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="recipient-nombre" class="col-form-label">Nombre:</label>
              <input type="text" class="form-control" value="{{$usuario->name}}" id="recipient-nombre" name="nombre">
                <label for="recipient-apellido" class="col-form-label">Apellido:</label>
                <input type="text" class="form-control" id="recipient-apellido" value="{{$usuario->surname}}" name="apellido">
            
                <label for="recipient-correo" class="col-form-label">Correo Electronico:</label>
                <input type="email" class="form-control" id="recipient-correo" value="{{$usuario->email}}" name="correo">
             
                <label for="recipient-rol" class="col-form-label">Rol:</label>
                <select class="form-control" id="recipient-rol" name="rol">
                    <option value="{{$usuario->role}}" selected>Predeterminado {{$usuario->role}}</option>
                    <option value="1">Ordinario</option>
                    <option value="2">Administrador</option>    
                    <option value="9">Super Usuario</option>
                  </select>
                
                <label for="recipient-contrasena" class="col-form-label">Contraseña:</label>
                <input type="password" class="form-control" id="recipient-contrasena"   name="contrasena">
              
                <label for="recipient-foto" class="col-form-label">Foto de Perfil:</label>
                <input type="file" class="form-control" id="recipient-foto" name="foto" value="{{$usuario->file}}" accept="image/*">
              </div>
              
          
        </div>
        <div class="footer">
          <input type="submit" value="Modificar" class="btn btn-primary">
       
        </div>
      </form>
      </div>
  
    </div>
  </div>


          @endsection           