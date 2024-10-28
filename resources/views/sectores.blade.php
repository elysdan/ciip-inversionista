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


@foreach ($empresas->groupBy('sector_id') as $sectorId => $sectorEmpresas)


    <div class="white_shd full margin_bottom_30 sector-item" data-search="{{ $sectorEmpresas->first()->sector }}">
        <div class="full graph_head">
            <div class="heading1 margin_0">
                <h2>{{ $sectorEmpresas->first()->sector }}</h2>
            </div>
        </div>

@if($sectorEmpresas->first()->revision != null)
        <div class="table_section padding_infor_info">

            <input type="text" class="form-control  w-50 m-auto" style="text-align:center;"  id="busqueda_{{ $sectorEmpresas->first()->sector }}" placeholder="Buscar Empresa, Rif o Identificador">

        <a href="{{ route('sectores_empresa_registro', $sectorId) }}">
           <button class="btn btn-outline-primary mb-2">Añadir</button>   
       </a>



            <table class="table">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Razon Social</th>
                        <th>Rif</th>

                        <th>Fecha de Creacion</th>
                        <th>Fases</th>
                    </tr>
                </thead>
                <tbody >
                    @php $i=1; @endphp
                    @foreach ($sectorEmpresas->groupBy('rif') as $n => $empresa)

                          

                        <tr style="text-align:center" class="busqueda_item_{{ $sectorEmpresas->first()->sector }}" data-search="{{ $empresa->first()->razonsocial }}" data-valor="{{ $empresa->first()->rif }}" data-identificador="{{ $empresa->first()->identificador }}">
                            <td >{{ $i }}</td>
                            <td>{{ $empresa->first()->razonsocial }}</td>
                            <td><a href="{{ route('sector_vizualizador', ['id'=>$empresa->first()->rif,'revision'=>$empresa->first()->revision]) }}" style="color: blue">{{ $empresa->first()->identificador }}-{{ $empresa->first()->rif }}<a></td>
                            <td>{{ \Carbon\Carbon::parse($empresa->first()->created_at)->locale('es_ES')
                                                        ->isoFormat('DD [/] MM [de] YYYY [a las] h:mm a ') }}</td>
                                                        <td><a href="" class="btn btn-outline-secondary mt-1 mb-1 p-0" style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;text-align: center;">
                
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;text-align: center;
    align-items: center;
    justify-content: center;">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"></path>
                    </svg>
               
              </a></td>
                        </tr>
                  @php $i++; @endphp



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
 $(document).ready(function()   
 {
    $('#busqueda_{{ $sectorEmpresas->first()->sector }}').on('keyup', function() {
        var query = $(this).val().toLowerCase();

        $('.busqueda_item_{{ $sectorEmpresas->first()->sector }}').each(function() {
            var searchString = $(this).data('search').toLowerCase();
            var sectorValor = $(this).data('valor').toString().toLowerCase(); 
            var sectorident = $(this).data('identificador').toLowerCase(); // Convert to string

            // Combine search for both data attributes using OR operator (||)
            var matchFound = searchString.indexOf(query) >= 0 || sectorValor.indexOf(query) >= 0 || sectorident.indexOf(query) >= 0;

            $(this).toggle(matchFound);
        });
    });
});
</script>







            
 @endforeach
                    @else
                    <div class="table_section padding_infor_info">
           
 <tbody>
                        <tr style="background-color: #13579e;color: white;">
                            <td colspan="3">
                                <a href="{{ route('sectores_empresa_registro', $sectorId) }}">
                                    <button class="btn btn-primary w-50 m-auto" style="display: flex;justify-content: center">Añadir</button>
                                </a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>


@endforeach









</div>

</div>






      </div>











<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  $(document).ready(function() {
  $('#search').on('keyup', function() {

    var query = $(this).val().toLowerCase();
    console.log(query);
    $('.sector-item').each(function() {
        console.log('a');
         $('#search').display="block";  
      var sectorName = $(this).data('search').toLowerCase();
      // Mostrar o ocultar el elemento según coincida con la búsqueda
      $(this).toggle(sectorName.indexOf(query) >= 0);
    });
  });
});
</script>





   
    @endsection