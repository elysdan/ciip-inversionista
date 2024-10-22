@extends('layouts.panel')
@section('content')

  <style>
          .table td{vertical-align: inherit;"}

          .pagination {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}

.page-item {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 0.5rem 1rem;
}

.page-link {
    color: #333;
    text-decoration: none;
}

.page-item.active .page-link {
    background-color: #f0f0f0;
}
        </style>
        <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Sectores Empresariales</h2>
                           </div>
                        </div>
                     </div>
              
<div class="col-md-12">




<input type="text" class="form-control form-control-lg  w-50 m-5 m-auto " style="text-align:center"  id="search" placeholder="Buscar Sector">

<br>




@if($dc >0)
@foreach($sectores as $sector)


                           <div class="white_shd full margin_bottom_30 sector-item" data-search="{{ $sector->sector }}">



                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>{{$sector->sector}}</h2>
                                 </div>
                              </div>

<div class="table_section padding_infor_info">
  

   <div class="table-responsive-sm">
      <table class="table">
         <thead class="thead" >
            <tr style="background-color: #13579e;color: white;">
              <th  >#</th>

<th >Razon Social</th>
<th >Rif</th>


            </tr>
         </thead>
         <tbody style="color:black">
          @php $n=1; @endphp
           
             
             @foreach($empresas as $empresa)


@if($empresa->sector_id == $sector->id)

<tr style="vertical-align: none;text-align: center;align-items: center;
justify-content: center;
align-content: center;" >
<td >@php echo $n; @endphp</td>


<td>{{$empresa->razonsocial}}</td>
<td>{{$empresa->identificador}}-{{$empresa->rif}}</td>
@else  <tr style="background-color: #13579e;color: white;">
                          <a href="{{route('sectores_empresa_registro',$sector->sector)}}">
                           <button class="btn btn-primary w-50 m-auto" style="display: flex;justify-content: center">añadir</button>
                          </a>
                      </tr>

          
            
        


              @endif
      


             

              @endforeach
              
               @php $n++; @endphp
              

         </tbody>
      </table>
   </div>
</div>
</div>


@endforeach
@else
    <div class="white_shd full margin_bottom_30 sector-item" data-search="{{ $sector->sector }}" style="display:none" >

          <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>{{$sector->sector}}</h2>
                                 </div>
          </div>
        <div class="table_section padding_infor_info">
              <div class="table-responsive-sm">
                <table class="table">
                   <thead class="thead" >
                      <tr style="background-color: #13579e;color: white;">
                          <a href="{{route('sectores_empresa_registro',$sector->sector)}}">
                           <button class="btn btn-primary w-50 m-auto" style="display: flex;justify-content: center">añadir</button>
                          </a>
                      </tr>
                  </thead>
                </table>
              </div>

        </div>
    </div>

@endif

</div>

</div>






      </div>











<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function() {
  $('#search').on('keyup', function() {

    var query = $(this).val().toLowerCase();
    $('.sector-item').each(function() {
         $('#search').display="block";  
      var sectorName = $(this).data('search').toLowerCase();
      // Mostrar o ocultar el elemento según coincida con la búsqueda
      $(this).toggle(sectorName.indexOf(query) >= 0);
    });
  });
});
</script>

<script>

     var campo10 = document.getElementById('campo10'); //direccion
campo10.innerHTML=''

  function validarCampos() {
      var campo1 = document.getElementById('campo1');
      var campo2 = document.getElementById('campo2');
      var campo3 = document.getElementById('campo3');
      var campo4 = document.getElementById('campo4');
      var campo4 = document.getElementById('campo11');
      var campo4 = document.getElementById('campo12');
      
    
      var fileInput = document.getElementById('fileInput');
      var submitBtn = document.getElementById('submitBtn');
      var valido = campo1.checkValidity() && campo10.checkValidity() && campo11.checkValidity() && campo12.checkValidity() && campo3.selectedIndex != 0  && campo4.selectedIndex != 0 && campo2.selectedIndex != 0 ;

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
       if (campo.id === 'campo11') {
          campo.value = campo.value.replace(/[^A-Za-z0-9@' ',.#áÁéÉíÍóÓúÚñÑ]/g, '');
      }
       if (campo.id === 'campo12') {
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

   
    @endsection