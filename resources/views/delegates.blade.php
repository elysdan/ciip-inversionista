@extends('layouts.panel')

@section('usuarios') 


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      
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
                              <h2>Representantes Empresariales</h2>
                           </div>
                        </div>
                     </div>

                  
                     <!-- row -->
                    <div class="col-md-12">

                         <button type="button" 
class="btn btn-outline-success mt-3 mb-3 p-0" 

 style="border-radius: 1rem; display: flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;"  
data-toggle="modal" data-target="#RegModal" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" align="center" viewBox="0 0 16 16" style="width: 2vw;height:2vw">
    
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
    
        <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
    
    </svg>
</button>

                           <div class="white_shd full margin_bottom_30">


                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Representantes Empresariales</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead class="thead" >
                                          <tr style="background-color: #13579e;color: white;">
                                            <th  >#</th>
              <th >Nombre</th>
              <th >Apellido</th>
              <th >Cedula</th>
              <th >Nacionalidad</th>
              <th >Fecha de Nacimiento</th>
              <th >edad</th>
              <th >Estado Civil</th>
              <th >Genero</th>
              <th >Direccion</th>
              <th >Telefono</th>
              <th >Email</th>
              <th >Redes Sociales</th>
               <th >Detalle</th>
              @if(session('usuario')->role==9 )
              <th  colspan="2"></th>
              @endif
                                          </tr>
                                       </thead>
                                       <tbody style="color:black">
                                         
                                           @php $n=1; @endphp
            @foreach($delegados as $delegado)
          <tr style="vertical-align: none;text-align: center;align-items: center;
  justify-content: center;
  align-content: center;" >
              <td >@php echo $n; @endphp</td>
              <td>{{$delegado->nombre}}</td>
              <td>{{$delegado->apellido}}</td>
              <td>{{$delegado->doc_identidad}}</td>
              <td>{{$delegado->nacionalidad}}</td>
              <td>{{$delegado->fecha_nacimiento}}</td>
              <td>{{$delegado->edad}}</td>
              <td>{{$delegado->estado_civil}}</td>
              <td>{{$delegado->sexo}}</td>
              <td>{{$delegado->direccion}}</td>
              <td>{{$delegado->telefono}}</td>
              <td>{{$delegado->email}}</td>
              
             <td style="vertical-align: top;align-items: center;
  justify-content: center;
  align-content: center;">
              <a href="{{route('add_socialweb',$delegado->id)}}" class="btn btn-outline-primary mt-1 mb-1 p-0"  style="border-radius: 1rem; display: flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;text-align: center;">
                
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;text-align: center;
    align-items: center;
    justify-content: center;">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                    </svg>
               
              </a>
              </td>
              <td><a href="{{route('previews_delegates',$delegado->id)}}"><button class="btn btn-primary">Ver Detalle</button></a></td>
              @if(session('usuario')->role==9 )
              <td>
                <a href="{{route('edit_delegates',$delegado->id)}}">
                <button type="button" 
                class="btn btn-outline-warning mt-1 mb-1 p-0" 
                
                 style="border-radius: 1rem; display: flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;">
                      <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>

                    </svg>
                </button>
                
              </a>
            </td>
              <td>
                
                <button type="button" 
class="btn btn-outline-danger mt-1 mb-1 p-0" 

 style="border-radius: 1rem; display: flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;"  
data-toggle="modal" data-target="#DelModal{{$delegado->id}}" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-dash" align="center" viewBox="0 0 16 16" style="width: 2vw;">
      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
      <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
    
    </svg>
</button>
<div class="modal fade" id="DelModal{{$delegado->id}}" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Desafiliar Delegado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
       <h3>¿Desea Suspender Al Usuario?</h3>
      </div>
      <div class="modal-footer">
        
       
        <form method="POST" action="{{route('delete_delegates',$delegado->id)}}" > 
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
              @endif
            </tr>
            @endforeach
            @php $n++; @endphp
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
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
      
<script>
  var campo10 = document.getElementById('campo10'); //direccion
campo10.innerHTML=''
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
      var campo11 = document.getElementById('campo11'); //telefono
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
    
    