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

        <a href="{{ route('sectores_empresa_registro', $sectorId) }}">   <button class="btn btn-success mb-2">Añadir</button>   </a>


            <table class="table">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Razon Social</th>
                        <th>Rif</th>

                        <th>Fecha</th>
                        <th>Fases</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sectorEmpresas as $n => $empresa)
                        <tr style="text-align:center">
                            <td>{{ $n + 1 }}</td>
                            <td>{{ $empresa->razonsocial }}</td>
                            <td><a href="{{ route('sector_vizualizador', ['id'=>$empresa->rif,'revision'=>$empresa->revision]) }}" style="color: blue">{{ $empresa->identificador }}-{{ $empresa->rif }}<a></td>
                            <td>{{ \Carbon\Carbon::parse($empresa->created_at)->locale('es_ES')
                                                        ->isoFormat('DD [/] MM [de] YYYY [a las] h:mm a ') }}</td>
                                                        <td>PROXIMAMENTE...</td>
                        </tr>
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
    $('.sector-item').each(function() {
         $('#search').display="block";  
      var sectorName = $(this).data('search').toLowerCase();
      // Mostrar o ocultar el elemento según coincida con la búsqueda
      $(this).toggle(sectorName.indexOf(query) >= 0);
    });
  });
});
</script>



   
    @endsection