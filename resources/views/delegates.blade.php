@extends('layouts.panel')
@section('content')
@endsection
@section('usuarios') 
<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<h2>Representantes Empresariales</h2>
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
              <th scope="col">Cedula</th>
              <th scope="col">Nacionalidad</th>
              <th scope="col">Fecha de Nacimiento</th>
              <th scope="col">edad</th>
              <th scope="col">Estado Civil</th>
              <th scope="col">Genero</th>
              <th scope="col">Direccion</th>
              <th scope="col">Telefono</th>
              <th scope="col">Email</th>
              <th scope="col">Redes Sociales</th>
              <th scope="col" colspan="2"></th>
            </tr>
          </thead>
          <tbody>
          <tr style="text-align: center;">
              <td scope="col" >#</td>
              <td scope="col">Nombre</td>
              <td scope="col">Apellido</td>
              <td scope="col">Cedula</td>
              <td scope="col">Nacionalidad</td>
              <td scope="col">Fecha de Nacimiento</td>
              <td scope="col">edad</td>
              <td scope="col">Estado Civil</td>
              <td scope="col">Genero</td>
              <td scope="col">Direccion</td>
              <td scope="col">Telefono</td>
              <td scope="col">Email</td>
              <td scope="col">Redes Sociales</td>
              <td scope="col" colspan="2"></td>
            </tr>
          </tbody>

        </table>
      </div>
     
    
      <div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registro de Representantes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              <form action="{{route('delegates_register')}}" method="POST"  id="miFormulario">
                @csrf
                <div class="form-group">
                  <label for="campo1" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" id="campo1" name="nombre" pattern="[A-Za-záÁéÉíÍóÓúÚñÑ' ']{2,100}" maxlength="100" required>
                    
                  <label for="campo2" class="col-form-label">Apellido:</label>
                    <input type="text" class="form-control" id="campo2" name="apellido" pattern="[A-Za-záÁéÉíÍóÓúÚñÑ' ']{2,100}" maxlength="100" required>
                    
                    <label for="campo6" class="col-form-label">Cedula:</label>
                    <input type="text" class="form-control" id="campo6" name="cedula" pattern="[0-9]{5,8}" maxlength="8" required>
                    
                    <label for="campo12" class="col-form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="campo12" name="fecha" onload="setFechaLimites()" required >
                    
                    <label for="campo4" class="col-form-label" >Nacionalidad:</label>
                    <select class="form-control" id="campo4" name="nacionalidad" required>
                        <option selected disabled>Seleccione una opcion</option>
                        <option value="1">Venezolano</option>
                        <option value="2">Extranjero</option>
                      </select>

                      <label for="campo8" class="col-form-label" >Genero:</label>
                    <select class="form-control" id="campo8" name="genero" required>
                        <option selected disabled>Seleccione una opcion</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                      </select>
                    
                      <label for="campo7" class="col-form-label" >Estado Civil:</label>
                    <select class="form-control" id="campo7" name="estado" required>
                        <option selected disabled>Seleccione una opcion</option>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Viudo</option>
                        <option value="4">Divorciado</option>
                        <option value="5">En Concubinato</option>
                      </select>

                      <label for="campo3" class="col-form-label">Correo Electronico:</label>
                    <input type="email" class="form-control" id="campo3" name="correo" pattern="[A-Za-z0-9@.áÁéÉíÍóÓúÚ]{4,256}" maxlength="256" required>
                 
                    
                      
                      
                     
                        <label for="campo11" class="col-form-label">Telefono:</label>
                        <input type="text" class="form-control" id="campo11" name="telefono" pattern="[0-9]{11,11}" maxlength="11" required>
                      
                        <label for="campo10" class="col-form-label">Direccion:</label>
                        <textarea class="form-control" id="campo10" name="direccion" placeholder="Direccion de Habitacion" minlength="4" maxlength="1000" required>
                        </textarea>
                    
              
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
      var campo5 = document.getElementById('campo6'); //cedula
      var campo5 = document.getElementById('campo7'); //estado civil
      var campo5 = document.getElementById('campo8'); //genero
      var campo5 = document.getElementById('campo10'); //direccion
      var campo5 = document.getElementById('campo11'); //telefono
      var campo5 = document.getElementById('campo12'); //telefono
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
    
    