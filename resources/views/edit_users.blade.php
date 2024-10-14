
@extends('layouts.panel')
@section('content')
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
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!-- fancy box js -->
      <link rel="stylesheet" href="css/jquery.fancybox.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
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
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Usuarios del Sistema</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
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
             @if(session('usuario')->role >=6)
                <label for="campo4" class="col-form-label" >Rol:</label>
                <select class="form-control" id="campo4" name="rol" required>
                    <option disabled>Seleccione una opcion</option>
                    <option value="1" @if( 1 == $usuario->role) selected @endif >Ordinario</option>
                    <option value="2" @if( 2 == $usuario->role) selected @endif >Invitado</option>
                    <option value="3" @if( 3 == $usuario->role) selected @endif >Ayudante</option>
                    <option value="4" @if( 4 == $usuario->role) selected @endif >Tecnico</option>
                   @if(session('usuario')->role >=5)
                    <option value="5" @if( 5 == $usuario->role) selected @endif >Licenciado</option>
                @if(session('usuario')->role >=6)
                    <option value="6" @if( 6 == $usuario->role) selected @endif >Coordinador</option>
                  @if(session('usuario')->role >=7)
                    <option value="7" @if( 7 == $usuario->role) selected @endif >Gerente</option>
                    @if(session('usuario')->role >=8)
                    <option value="8" @if( 8 == $usuario->role) selected @endif >Administrador</option>
                    @if(session('usuario')->role >=9)
                    <option value="9" @if( 9 == $usuario->role) selected @endif >Super Usuario</option>
                    @endif
                
                    @endif
                    @endif
                
                    @endif
                    @endif
                
                    
                  </select>
                  @else
                  <input type="hidden" value="{{$usuario->role}}" name="rol" id="campo4">
                  @endif
                 @if(session('usuario')->role >=8)
                <label for="campo5" class="col-form-label">Contraseña:</label>
                <input type="password" class="form-control" id="campo5" name="contrasena" pattern="[A-Za-z0-9@.*_'-'+áÁéÉíÍóÓúÚ]{8,100}" maxlength="100">
                @else
                 <input type="hidden" class="form-control" id="campo5" name="contrasena">
                      @endif
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