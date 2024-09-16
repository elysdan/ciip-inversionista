
@extends('layouts.panel')
@section('content')
    

<div class="form mt-5 w-75" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificacion de Usuarios</h5>
          
        </div>
        
        <div class="modal-body">
          <form action="{{route('update_users',$usuario->id)}}" method="POST" enctype="multipart/form-data" id="miFormulario" >
            @method('PUT')
            @csrf
            <div class="form-group">
              <label for="campo1" class="col-form-label">Nombre:</label>
              <input type="text" class="form-control" id="campo1" name="nombre" pattern="[A-Za-záÁéÉíÍóÓúÚñÑ' ']{2,100}" maxlength="100" value="{{$usuario->name}}"required>
                <label for="campo2" class="col-form-label">Apellido:</label>
                <input type="text" class="form-control" id="campo2" name="apellido" pattern="[A-Za-záÁéÉíÍóÓúÚñÑ' ']{2,100}" maxlength="100" value="{{$usuario->surname}}" required>
            
                <label for="campo3" class="col-form-label">Correo Electronico:</label>
                <input type="email" class="form-control" id="campo3" name="correo" pattern="[A-Za-z0-9@.áÁéÉíÍóÓúÚ]{4,256}" maxlength="256" value="{{$usuario->email}}" required>
             
                <label for="campo4" class="col-form-label" >Rol:</label>
                <select class="form-control" id="campo4" name="rol" required>
                    <option disabled>Seleccione una opcion</option>
                    <option value="1" @if("1" === $usuario->role) selected @endif >Ordinario</option>
                    <option value="2" @if("2" === $usuario->role) selected @endif >Administrador</option>
                    <option value="9" @if("9" === $usuario->role) selected @endif >Super Usuario</option>
                  </select>
                
                <label for="campo5" class="col-form-label">Contraseña:</label>
                <input type="password" class="form-control" id="campo5" name="contrasena" pattern="[A-Za-z0-9@.*_'-'+áÁéÉíÍóÓúÚ]{8,100}" maxlength="100">
              
                <label for="fileInput" class="col-form-label">Foto de Perfil:</label>
                <input type="file" class="form-control" name="foto" id="fileInput" accept="image/*">
              </div>
              <div id="preview" class="w-25"></div>
                    <div class="alert alert-danger" role="alert" id="fileError">
                        Por Favor Seleccione una imagen no mayor a 20 mb, de no tener el sistema pondra una predeterminada.
                    </div>
              
          
        </div>
        <div class="modal-footer">
          <input type="submit" value="Modificar" id="submitBtn" class="btn btn-primary" disabled>
       
        </div>
      </form>
      </div>
  
    </div>
  </div>
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

          @endsection           