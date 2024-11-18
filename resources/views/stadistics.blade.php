@extends('layouts.panel')
@section('content')
<meta http-equiv="refresh" content="5">
      <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Estadisticas</h2>
                           </div>
                        </div>
                     </div>
              
<div class="col-md-12">
{{$actividades->links('vendor.pagination.bootstrap-4')}}
@if($actividades)
        <div class="table_section padding_infor_info">

         



            <table class="table">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>ip</th>
                        <th>usuario</th>

                        <th>accion</th>
                        <th>controlador</th>
                        <th>fecha</th>
                       
                    </tr>
                </thead>
                <tbody >
                    @php $i=1; @endphp
                    @foreach ($actividades as $actividad)

                 
                    <tr style="text-align: center;">
                        <td> {{$actividad->id}}</td>
                        <td>{{$actividad->ip}}</td>
                        <td>{{$actividad->usuario}}</td>

                        <td>{{$actividad->accion}}</td>
                        <td>{{$actividad->controlador}}()</td>
                        <td>{{ \Carbon\Carbon::parse($actividad->created_at)->locale('es_ES')
                                                        ->isoFormat('dddd DD [de] MMMM [de] YYYY [a las] hh:mm') }}</td>
                       
                    </tr>      

                   @php $i++; @endphp
 @endforeach
 @endif
         
                </tbody>
            </table>
        </div>
    </div>












</div>

</div>






      </div>








      </div>







    @endsection