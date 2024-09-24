          @extends('layouts.panel')
@section('content')

  <style>
          .table td{vertical-align: inherit;"}
        </style>
        <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Modificacion de Empresas</h2>
                           </div>
                        </div>
                     </div>



<div class="col-md-12">

<div class="table_section padding_infor_info">

  <div class="table-responsive-sm">


<form action="{{route('update_enterprises',$empresa->id)}}" method="POST" enctype="multipart/form-data" id="miFormulario">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="campo1" class="col-form-label">Razon Social:</label>
                  <input type="text" class="form-control" id="campo1" name="razon" pattern="[A-Za-z0-9áÁéÉíÍóÓúÚñÑ®©.' ']{4,100}" value="{{$empresa->razonsocial}}" maxlength="100" required>
                    <label for="campo2" class="col-form-label">Rif:</label>
                    <div class="input-group">
                    <select class="form-control" id="campo2" name="identificador" required>
                        <option disabled>Seleccione una opcion</option>
                        <option value="V" @if("V" === $empresa->identificador) selected @endif >Venezolano</option>
                        <option value="E" @if("E" === $empresa->identificador) selected @endif >Extranjero</option>
                        <option value="J" @if("J" === $empresa->identificador) selected @endif >Juridico</option>
                        <option value="G" @if("G" === $empresa->identificador) selected @endif >Gubernamental</option>

                      </select>
               
                    
                    <input type="text" class="form-control" id="campo3" name="rif" pattern="[0-9]{9,9}" maxlength="9" value="{{$empresa->rif}}" required>
                  </div>
                    <label for="campo4" class="col-form-label" >Lugar de Origen:</label>
                    <select class="form-control" id="campo4" name="lorigen" required>
                        <option  disabled>Seleccione una opcion</option>
                        <option value="1" @if("1" === $empresa->pais_origen) selected @endif >Venezuela</option>
                        <option value="2" @if("2" === $empresa->pais_origen) selected @endif >Rusia</option>
                        <option value="3" @if("3" === $empresa->pais_origen) selected @endif >China</option>
                        <option value="4" @if("4" === $empresa->pais_origen) selected @endif >Estados unidos de America</option>
                      </select>


                    <label for="campo4" class="col-form-label" >Lugar de registro:</label>
                    <select class="form-control" id="campo4" name="lregistro" required>
                        <option disabled>Seleccione una opcion</option>
                        <option value="1" @if("1" === $empresa->lregistro) selected @endif >Venezuela</option>
                        <option value="2" @if("2" === $empresa->lregistro) selected @endif >Rusia</option>
                        <option value="3" @if("3" === $empresa->lregistro) selected @endif >China</option>
                        <option value="4" @if("4" === $empresa->lregistro) selected @endif >Estados unidos de America</option>
                      </select>
               
                    
                        <label for="campo10" class="col-form-label">Direccion:</label>
                        <textarea class="form-control" id="campo10" name="direccion" placeholder="Direccion de Habitacion" minlength="4" maxlength="1000" required>
                        </textarea>

                           
                  
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
</div>
    </div>


<script>

     var campo10 = document.getElementById('campo10'); //direccion
campo10.innerHTML=''

 var campo10 = document.getElementById('campo10'); //direccion
campo10.innerHTML='{{$empresa->direccion}}';

  function validarCampos() {
      var campo1 = document.getElementById('campo1');
      var campo2 = document.getElementById('campo2');
      var campo3 = document.getElementById('campo3');
      var campo4 = document.getElementById('campo4');
      
    
      var fileInput = document.getElementById('fileInput');
      var submitBtn = document.getElementById('submitBtn');
      var valido = campo1.checkValidity() && campo10.checkValidity() && campo3.selectedIndex != 0  && campo4.selectedIndex != 0 && campo2.selectedIndex != 0 ;

      submitBtn.disabled = !valido;
  }

  document.getElementById('miFormulario').addEventListener('input', function(event) {
      var campo = event.target;
      if (campo.id === 'campo1') {
          campo.value = campo.value.replace(/[^A-Za-z0-9áÁéÉíÍóÓúÚñÑ®©.' ']/g, '');
      }
      
      if (campo.id === 'campo3') {
          campo.value = campo.value.replace(/[^0-9]/g, '');
      }
      if (campo.id === 'campo10') {
          campo.value = campo.value.replace(/[^A-Za-z0-9' ',.#áÁéÉíÍóÓúÚñÑ]/g, '');
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