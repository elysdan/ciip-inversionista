@extends('layouts.panel')

@section('usuarios') 

      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
        <style>
          .table td{vertical-align: inherit;"}
        </style>
        <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Registro de Redes Sociales</h2>
                           </div>
                        </div>
                     </div>

<h2>{{$delegado->nombre}} </h2>
<button type="button" 
class="btn btn-outline-success mt-3 mb-3 p-0" 

 style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;"
data-toggle="modal" data-target="#RegModal" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" align="center" viewBox="0 0 16 16" style="width: 2vw;height:2vw">
    
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>

    </svg>
</button>

<a href="{{route('delegates')}}"><button type="button" 
class="btn btn-outline-secondary mt-3 mb-3 p-0" href="{{url('delegates')}}"

 style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" align="center" viewBox="0 0 16 16" style="width: 2vw;height:2vw">
    
      <path d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>

    </svg>
</button></a>


  
<div class="white_shd full margin_bottom_30">


<!-- dashboard inner -->
               

<div class="table_section padding_infor_info">
   <div class="table-responsive-sm">
      <table class="table">
         <thead class="thead" >
            <tr style="background-color: #13579e;color: white;">
              <th  >#</th>
<th >Red Social</th>
<th >Usuario</th>
@if(session('usuario')->role==9 )
<th  colspan="2"></th>
@endif
            </tr>
         </thead>
         <tbody style="color:black">
           
             @php $n=1; @endphp

@foreach($redes as $red)
<tr style="vertical-align: none;text-align: center;align-items: center;
justify-content: center;
align-content: center;" >
<td >@php echo $n; @endphp</td>
<td>{{$red->red}}</td>

<td>{{$red->username}}</td>

@if(session('usuario')->role==9 )
              <td>
                <a href="{{route('edit_web', $red->id)}}">
                <button type="button" 
                class="btn btn-outline-warning mt-1 mb-1 p-0" 
                
                 style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;">
                     <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
 </svg>
                </button>
                
              </a>
            </td>
              <td>
                
                <button type="button" 
class="btn btn-outline-danger mt-1 mb-1 p-0" 

  style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;"  
data-toggle="modal" data-target="#DelModal{{$red->id}}" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-dash" align="center" viewBox="0 0 16 16" style="width: 2vw;">
      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>

    </svg>
</button>
<div class="modal fade" id="DelModal{{$red->id}}" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Red Social</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
       <h3>¿Desea Eliminar La Red Social Del Usuario?</h3>
      </div>
      <div class="modal-footer">
        
       
        <form method="POST" action="{{route('delete_web_register', $red->id)}}" > 
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
              @php $n++; @endphp

@endforeach

         </tbody>
      </table>
   </div>
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
      <div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registro de Redes Sociales</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            

            
            <div class="modal-body">
              <form action="{{route('web_register')}}" method="POST"  id="miFormulario">
                @csrf
                <div class="form-group">
                  <input type="hidden" name="id" value="{{$delegado->id}}">
                    <label for="campo4" class="col-form-label" >Red Social:</label>
                    <select class="form-control" id="campo4" name="red" required>
                        <option selected disabled>Seleccione una opcion</option>
                         @foreach ($sitios as $r)
                        <option value="{{$r->id}}" >{{$r->red}}</option>
                        @endforeach
                       
                      </select>
 
                  <label for="campo2" class="col-form-label">Nombre de Usuario:</label>
                    <input type="text" class="form-control" id="campo2" name="usuario" pattern="[A-Za-z0-9_@záÁéÉíÍóÓúÚñÑ'-'' ']{2,100}" maxlength="100" required>
                    
                    
            </div>
            <div class="modal-footer">
              <input type="submit" value="Registrar" id="submitBtn" class="btn btn-primary" disabled>
           
            </div>
          </form>
          </div>
      
        </div>
      </div>


</div>
      
        </div>
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



  </body>
   </html> 
    @endsection
    
    