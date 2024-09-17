@extends('layouts.panel')
@section('content')

@endsection
@section('usuarios') 
<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<h2>{{$delegado->nombre}} </h2>
<button type="button" 
class="btn btn-outline-success mt-3 mb-3 p-0" 

style="font-size:3vw;width: 4.5vw;border-radius:1rem;align-items: center;align-content: center;" 
data-toggle="modal" data-target="#RegModal" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" align="center" viewBox="0 0 16 16" style="width: 3vw;height:3vw">
    
        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>

    </svg>
</button>

<a href="{{route('delegates')}}"><button type="button" 
class="btn btn-outline-secondary mt-3 mb-3 p-0" href="{{url('delegates')}}"

style="font-size:3vw;width: 4.5vw;border-radius:1rem;align-items: center;align-content: center;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" align="center" viewBox="0 0 16 16" style="width: 3vw;height:3vw">
    
      <path d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>

    </svg>
</button></a>
  
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr style="text-align: center;">
              <th scope="col" >#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              
            </tr>
          </thead>
          <tbody>
           <tr>
            <td></td>
            <td></td>
            <td></td>
           </tr>
          </tbody>

        </table>
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
              <h5 class="modal-title" id="exampleModalLabel">Registro de Representantes</h5>
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
                        <option value="1" >Twitter</option>
                        <option value="2">Facebook</option>
                        <option value="3">Instagram</option>
                      </select>
 
                  <label for="campo2" class="col-form-label">Nombre de Usuario:</label>
                    <input type="text" class="form-control" id="campo2" name="usuario" pattern="[A-Za-z0-9_@záÁéÉíÍóÓúÚñÑ'-']{2,100}" maxlength="100" required>
                    
                    
            </div>
            <div class="modal-footer">
              <input type="submit" value="Registrar" id="submitBtn" class="btn btn-primary" disabled>
           
            </div>
          </form>
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
          campo.value = campo.value.replace(/[^A-Za-z0-9_@áÁéÉíÍóÓúÚñÑ-]/g, '');
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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
   </html> 
    @endsection
    
    