@extends('layouts.panel')
@section('content')
<meta http-equiv="refresh" content="15">
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


  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#actividad" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clock-o blue2_color"></i> <span>Actividad</span></a>
                        <div class="collapse list-unstyled" id="actividad">
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
                        </div>

         
                </tbody>
            </table>

               </li>
                     
 </ul>
<div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#usuarios" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-users blue1_color"></i> 
                            <span>Usuarios</span>
                        </a>
                        <div class="collapse list-unstyled" id="usuarios">


            <table class="table">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>

                        <th>Correo</th>
                        <th>Rol</th>
                        
                       
                    </tr>
                </thead>
                <tbody >
                    @php $i=1; @endphp
                    @foreach($users as $user)
                    
                      <tr style="text-align: center;">
                        <td> {{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>

                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                       
                    </tr>      

                   @php $i++; @endphp
 @endforeach
</tbody>
</table>
                        </div>
               </li>
                     
 </ul>
 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#empresas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-building blue2_color"></i> 
                            <span>Empresas</span>
                        </a>
                        <div class="collapse list-unstyled" id="empresas">

                            <table class="table">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Rif</th>

                        <th>Correo</th>
                       
                        
                       
                    </tr>
                </thead>
                <tbody >
                    @php $i=1; @endphp
                   @foreach($datos_empresas as $datos_empresa)
                     <tr style="text-align: center;">
                        <td> {{$datos_empresa->id}}</td>
                        <td>{{$datos_empresa->razonsocial}}</td>
                        <td>{{$datos_empresa->rif}}</td>

                        <td>{{$datos_empresa->correo}}</td>
                        
                       
                    </tr>      

                   @php $i++; @endphp
 @endforeach
</tbody>
</table>
                        </div>
               </li>
                     
 </ul>
 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#representantes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-user blue1_color"></i> 
                            <span>Representantes</span>
                        </a>
                        <div class="collapse list-unstyled" id="representantes">

                              <table class="table">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Cedula</th>

                        <th>Correo</th>
                       
                        
                       
                    </tr>
                </thead>
                <tbody >
                    @php $i=1; @endphp
                    @foreach($inversionista_naturals as $inversionista_natural)
                    a
                     <tr style="text-align: center;">
                        <td> {{$inversionista_natural->id}}</td>
                        <td>{{$inversionista_natural->nombre}}</td>
                        <td>{{$inversionista_natural->doc_identidad}}</td>

                        <td>{{$inversionista_natural->email}}</td>
                        
                       
                    </tr>      

                   @php $i++; @endphp
 @endforeach
</tbody>
</table>
                        </div>
               </li>
                     
 </ul>
 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#generos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-gears blue2_color"></i> 
                            <span>Generos</span>
                        </a>
                        <div class="collapse list-unstyled" id="generos">
                    @foreach($generos as $genero)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#Sectores" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-puzzle-piece blue1_color"></i> 
                            <span>Sectores</span>
                        </a>
                        <div class="collapse list-unstyled" id="Sectores">
                    @foreach($sectores as $sectore)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#paises" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-globe blue2_color"></i> 
                            <span>paises</span>
                        </a>
                        <div class="collapse list-unstyled" id="paises">
                  @foreach($paises as $pais)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#nacionalidades" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-globe blue1_color"></i> 
                            <span>nacionalidades</span>
                        </a>
                        <div class="collapse list-unstyled" id="nacionalidades">
                    @foreach($nacionalidades as $nacionalidad)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#Estados_Civiles" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-gears blue2_color"></i> 
                            <span>Estados Civiles</span>
                        </a>
                        <div class="collapse list-unstyled" id="Estados_Civiles">
                  @foreach($estados_civiles as $estados_civil)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#Contenido_empresas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-gears blue1_color"></i> 
                            <span>Contenido_empresas</span>
                        </a>
                        <div class="collapse list-unstyled" id="Contenido_empresas">
                    @foreach($contenido_empresas as $contenido_empresa)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#contenido_representantes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-gears blue2_color"></i> 
                            <span>contenido_representantes</span>
                        </a>
                        <div class="collapse list-unstyled" id="contenido_representantes">
                     @foreach($contenido_representantes as $contenido_representante)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#datos_embajadas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-gears blue1_color"></i> 
                            <span>datos_embajadas</span>
                        </a>
                        <div class="collapse list-unstyled" id="datos_embajadas">
                     @foreach($datos_embajadas as $datos_embajada)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#redes_sociales" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-mobile-phone blue2_color"></i> 
                            <span>redes_sociales</span>
                        </a>
                        <div class="collapse list-unstyled" id="redes_sociales">
                    @foreach($rrsss as $rrss)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#redes sociales_delegados" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-mobile-phone blue1_color"></i> 
                            <span>redes sociales_delegados</span>
                        </a>
                        <div class="collapse list-unstyled" id="redes sociales_delegados">
                    @foreach($redes_sociales_delegados as $redes_sociales_delegado)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#Redes_sociales_empresas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-mobile-phone blue2_color"></i> 
                            <span>Redes_sociales_empresas</span>
                        </a>
                        <div class="collapse list-unstyled" id="Redes_sociales_empresas">
                    @foreach($redes_sociales_empresas as $redes_sociales_empresa)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#Sectores_empresas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-puzzle-piece blue1_color"></i> 
                            <span>Sectores_empresas</span>
                        </a>
                        <div class="collapse list-unstyled" id="Sectores_empresas">
                    @foreach($sectores_empresas as $sectores_empresa)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#Fases_de_sectores" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-puzzle-piece blue2_color"></i> 
                            <span>Fases_de_sectores</span>
                        </a>
                        <div class="collapse list-unstyled" id="Fases_de_sectores">
                     @foreach($sectores_fases as $sectores_fase)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#Delegados_asociados_a_empresas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-gears blue1_color"></i> 
                            <span>Delegados_asociados_a_empresas</span>
                        </a>
                        <div class="collapse list-unstyled" id="Delegados_asociados_a_empresas">
                    @foreach($asociador_empresas_representantes as $asociador_empresas_representante)
                    a
                    @endforeach
                        </div>
               </li>
                     
 </ul>

 
        </div>
    </div>












</div>

</div>






      </div>








      </div>







    @endsection