@extends('layouts.panel')
@section('content')
@endsection
@section('usuarios') 
<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
              <th scope="col" >#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Correo</th>
              <th scope="col">Rol</th>
              <th scope="col">Estatus</th>
              <th scope="col">Foto de perfil</th>
              <th scope="col" colspan="2"></th>
            </tr>
          </thead>
          <tbody>
             @php $n=1; @endphp
            @foreach($usuarios as $usuario)
            
            <tr style="text-align: center;align-items: center;align-content: center;" >
              <td>@php echo $n; @endphp</td>
              <td>{{$usuario->name}}</td>
              <td>{{$usuario->surname}}</td>
              <td>{{$usuario->email}}</td>
              <td>{{$usuario->role}}</td>
              <td>{{$usuario->status}}</td>
              <td><img src="{{$usuario->file}}" style="width: 7vw;border-radius: 50%;"></td>
              <td><a href="{{route('edit_users',$usuario->id)}}">
                <button type="button" 
                class="btn btn-outline-warning mt-3 mb-3 p-0" 
                
                style="font-size:3vw;width: 4.5vw;border-radius:1rem;align-items: center;align-content: center;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 3vw;height:3vw">
                      <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>

                    </svg>
                </button>
                
              </a>
            </td>
              <td>
                
                <button type="button" 
class="btn btn-outline-danger mt-3 mb-3 p-0" 

style="font-size:3vw;width: 4.5vw;border-radius:1rem;align-items: center;align-content: center;" 
data-toggle="modal" data-target="#DelModal{{$usuario->id}}" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-dash" align="center" viewBox="0 0 16 16" style="width: 3vw;height:3vw">
      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
      <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
    
    </svg>
</button>
<div class="modal fade" id="DelModal{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true">
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
              @php $n++; @endphp
            </tr>
              
            @endforeach
            
            
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
              <form action="{{route('users_register')}}" method="POST" enctype="multipart/form-data" id="miFormulario">
                @csrf
                <div class="form-group">
                  <label for="campo1" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" id="campo1" name="nombre" pattern="[A-Za-záÁéÉíÍóÓúÚñÑ' ']{2,100}" maxlength="100" required>
                    <label for="campo2" class="col-form-label">Apellido:</label>
                    <input type="text" class="form-control" id="campo2" name="apellido" pattern="[A-Za-záÁéÉíÍóÓúÚñÑ' ']{2,100}" maxlength="100" required>
                
                    <label for="campo3" class="col-form-label">Correo Electronico:</label>
                    <input type="email" class="form-control" id="campo3" name="correo" pattern="[A-Za-z0-9@.áÁéÉíÍóÓúÚ]{4,256}" maxlength="256" required>
                 
                    <label for="campo4" class="col-form-label" >Rol:</label>
                    <select class="form-control" id="campo4" name="rol" required>
                        <option selected disabled>Seleccione una opcion</option>
                        <option value="1">Ordinario</option>
                        <option value="2">Administrador</option>
                        <option value="9">Super Usuario</option>
                      </select>
                    
                    <label for="campo5" class="col-form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="campo5" name="contrasena" pattern="[A-Za-z0-9@.*_'-'+áÁéÉíÍóÓúÚ]{8,100}" maxlength="100" required>
                  
                    <label for="fileInput" class="col-form-label">Foto de Perfil:</label>
                    <input type="file" class="form-control" name="foto" id="fileInput" accept="image/*">
                  </div>
                  <div id="preview" class="w-25"></div>
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
      @if(session('status'))


<div class="alert alert-danger d-flex align-items-center mt-1 " role="alert">
  
  <div>
    {{session('status')}}
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
    @endsection
    
    