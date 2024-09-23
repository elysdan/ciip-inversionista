@extends('layouts.panel')

@section('usuarios') 

      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
        <style>
          .table td{vertical-align: inherit;"}
        </style>
  
    
    <div class="modal-body">
              <form action="{{route('update_web_inner', $delegado->id)}}" method="POST"  id="miFormulario">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <input type="hidden" name="id" value="{{$delegado->id}}">
                    <label for="campo4" class="col-form-label" >Red Social:</label>
                    <select class="form-control" id="campo4" name="red" required>
                        <option disabled>Seleccione una opcion</option>
                        <option value="1"  @if("1" == $delegado->site) selected @endif >Twitter</option>
                        <option value="2"  @if("2" == $delegado->site) selected @endif >Facebook</option>
                        <option value="3"  @if("3" == $delegado->site) selected @endif >Instagram</option>
                      </select>
 
                  <label for="campo2" class="col-form-label">Nombre de Usuario:</label>
                    <input type="text" class="form-control" id="campo2" name="usuario" pattern="[A-Za-z0-9_@záÁéÉíÍóÓúÚñÑ'-'' ']{2,100}" maxlength="100" value="{{$delegado->username}}" required>
                    
                    
            </div>
            <div class="modal-footer">
              <input type="submit" value="Registrar" id="submitBtn" class="btn btn-primary" disabled>
           
            </div>
          </form>
          </div>
<script>
 
  function validarCampos() {
     
      var campo2 = document.getElementById('campo2'); //apellido
     
      var campo4 = document.getElementById('campo4'); //nacionalidad
     
      var submitBtn = document.getElementById('submitBtn');
      var valido = campo2.checkValidity() && campo4.checkValidity();

      submitBtn.disabled = !valido;
  }

  

  document.getElementById('miFormulario').addEventListener('input', function(event) {
      var campo = event.target;
      if (campo.id === 'campo2') {
          campo.value = campo.value.replace(/[^A-Za-z0-9_@' 'áÁéÉíÍóÓúÚñÑ-]/g, '');
      }
      
      
      validarCampos();
  });

  

  document.getElementById('miFormulario').addEventListener('submit', function(event) {
      var campo4 = document.getElementById('campo4');
      var campo2 = document.getElementById('campo2');
      var valido = true;

      if (!campo4.checkValidity()) {
          campo4.classList.add('error');
          valido = false;
      } else {
          campo4.classList.remove('error');
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
    
    