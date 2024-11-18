@extends('layouts.panel')
@section('content')
@endsection
@section('usuarios')
<div class="modal-header mt-0">
              <h5 class="modal-title" id="exampleModalLabel">Edicion de Representantes</h5>
             
            </div>
            
            <div class="modal-body">
              <form action="{{route('update_delegates',$delegado->id)}}" method="POST"  id="miFormulario" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="campo1" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" id="campo1" name="nombre" pattern="[A-Za-záÁéÉíÍóÓúÚñÑ' ']{2,100}" maxlength="100" value="{{$delegado->nombre}}" required>
                    
                  <label for="campo2" class="col-form-label">Apellido:</label>
                    <input type="text" class="form-control" id="campo2" name="apellido" pattern="[A-Za-záÁéÉíÍóÓúÚñÑ' ']{2,100}" maxlength="100" value="{{$delegado->apellido}}"  required>
                    
                    <label for="campo6" class="col-form-label">Cedula:</label>
                    <input type="text" class="form-control" id="campo6" name="cedula" pattern="[0-9]{5,8}" maxlength="8" value="{{$delegado->doc_identidad}}"  required>
                    
                    <label for="campo12" class="col-form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="campo12" name="fecha" onload="setFechaLimites()" value="{{$delegado->fecha_nacimiento}}"  required >
                    
                    <label for="campo4" class="col-form-label" >Nacionalidad:</label>
                    <select class="form-control" id="campo4" name="nacionalidad" required>
                        <option disabled>Seleccione una opcion</option>
                         @foreach($nacionalidad as $n)
                        <option value="{{$n->id}}" @if( $n->id === $delegado->nacionalidad) selected @endif >{{$n->PAIS_NAC}}</option>
                        @endforeach
                       
                      </select>

                      <label for="campo8" class="col-form-label" >Genero:</label>
                    <select class="form-control" id="campo8" name="genero" required>
                        <option disabled>Seleccione una opcion</option>
                        
                         @foreach($generos as $genero)
                        <option value="{{$genero->id}}" @if($genero->id === $delegado->sexo) selected @endif >{{$genero->genero}}</option>
                        @endforeach
                      </select>
                    
                      <label for="campo7" class="col-form-label" >Estado Civil:</label>
                    <select class="form-control" id="campo7" name="estado" required>
                        <option disabled>Seleccione una opcion</option>
                      
                       @foreach($estados_civiles as $estado_civil)
                        <option value="{{$estado_civil->id}}" @if($estado_civil->id === $delegado->estado_civil) selected @endif>{{$estado_civil->estado}}</option>
                        @endforeach
                      </select>

                      <label for="campo3" class="col-form-label">Correo Electronico:</label>
                    <input type="email" class="form-control" id="campo3" name="correo" pattern="[A-Za-z0-9@.áÁéÉíÍóÓúÚ]{4,256}" maxlength="256" value="{{$delegado->email}}" required>
                 
                    
                      
                      
                     
                        <label for="campo11" class="col-form-label">Telefono:</label>
                        <input type="text" class="form-control" id="campo11" name="telefono" pattern="[0-9]{11,11}" maxlength="11" value="{{$delegado->telefono}}" required>
                      
                        <label for="campo10" class="col-form-label">Direccion:</label>
                        <textarea class="form-control" id="campo10" name="direccion" placeholder="Direccion de Habitacion" minlength="4" maxlength="1000"   required>
                        </textarea>


                         <label for="fileInput" class="col-form-label">Foto de Perfil:</label>
                    <input type="file" class="form-control" name="foto" id="fileInput" accept="image/*">

                     <div id="preview" class="w-25"></div>
                        <div class="alert alert-danger" role="alert" id="fileError">
                            Por Favor Seleccione una imagen no mayor a 20 mb, de no tener el sistema pondra una predeterminada.
                        </div>
                    
              
            </div>
            <div class="modal-footer">
              <input type="submit" value="Registrar" id="submitBtn" class="btn btn-primary" disabled>
           
            </div>
          </form>
       
      
        

      <script>

var campo10 = document.getElementById('campo10'); //direccion
campo10.innerHTML='{{$delegado->direccion}}'
function setFechaLimites() {
  const hoy = new Date();
  const fechaMin = new Date();
  const fechaMax = new Date();

  // Calculamos las fechas límite restando 18 y 70 años a la fecha actual
  fechaMin.setFullYear(hoy.getFullYear() - 70);
  fechaMax.setFullYear(hoy.getFullYear() - 18);

  // Formateamos las fechas al formato "YYYY-MM-DD"
  const minDate = fechaMin.toISOString().split('T')[0];
  const maxDate = fechaMax.toISOString().split('T')[0];

  // Asignamos los valores a los atributos min y max del input
  document.getElementById("campo12").min = minDate;
  document.getElementById("campo12").max = maxDate;
}

// Llamamos a la función al cargar la página
window.onload = setFechaLimites;
  
  function validarCampos() {
      var campo1 = document.getElementById('campo1'); //nombre
      var campo2 = document.getElementById('campo2'); //apellido
      var campo3 = document.getElementById('campo3'); //correo
      var campo4 = document.getElementById('campo4'); //nacionalidad
      var campo6 = document.getElementById('campo6'); //cedula
      var campo7 = document.getElementById('campo7'); //estado civil
      var campo8 = document.getElementById('campo8'); //genero
      var campo10 = document.getElementById('campo10'); //direccion
      var campo11= document.getElementById('campo11'); //telefono
      var campo12 = document.getElementById('campo12'); //telefono
      var submitBtn = document.getElementById('submitBtn');
      var valido = campo1.checkValidity() && campo2.checkValidity() && campo3.checkValidity() && campo4.selectedIndex != 0 && campo7.selectedIndex != 0 && campo8.selectedIndex != 0 && campo11.checkValidity() && campo10.checkValidity() && campo6.checkValidity() && campo12.checkValidity();

      submitBtn.disabled = !valido;
  }

  function validarEdad(fechaNacimiento) {
  const fechaNac = new Date(fechaNacimiento);
  const hoy = new Date();

  // Calculamos la diferencia de años entre ambas fechas
  const diferenciaAnios = hoy.getFullYear() - fechaNac.getFullYear();

  // Validamos que la diferencia de años esté entre 18 y 70
  if (diferenciaAnios < 18 || diferenciaAnios > 70) {
    return "";
  } else {
    return fechaNacimiento;
  }
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
          campo.value = campo.value.replace(/[^A-Za-z0-9@.áÁéÉíÍóÓúÚñÑ]/g, '');
      }
      if (campo.id === 'campo6') {
          campo.value = campo.value.replace(/[^0-9]/g, '');
      }
      if (campo.id === 'campo10') {
          campo.value = campo.value.replace(/[^A-Za-z0-9' ',#áÁéÉíÍóÓúÚñÑ]/g, '');
      }
      if (campo.id === 'campo11') {
          campo.value = campo.value.replace(/[^0-9]/g, '');
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
    
    