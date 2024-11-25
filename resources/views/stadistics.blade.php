@extends('layouts.panel')
@section('content')

<link rel="stylesheet" type="text/css" href="    https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css
    ">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
<!-- <meta http-equiv="refresh" content="30">-->
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
                          


                       
        <div class="table_section padding_infor_info">

          
         


            <div class="card">
                <div class="card-body"> 
            <table id="example" class="table table nowrap" style="width:100%">
                <thead >
                    <tr style="text-align: center;">
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Ip</th>

                        <th>Accion</th>
                        <th>Controlador</th>
                        <th>Fecha</th>
                       
                    </tr>
                </thead>
                <tbody >
                   
 
                        </div>

         
                </tbody>
            </table>
        </div>
        </div>

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

<div class="card">
    <div class="card-body">
            <table class="table" id="Usuarios">
                <thead>
                    <tr >
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>

                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Fecha de Creacion</th>
                        
                       
                    </tr>
                </thead>
              
</table>
</div>
</div>
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

   <div class="card">
                <div class="card-body"> 
                            <table class="table" id="Empresas">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Identificador</th>
                        <th>Rif</th>

                        <th>Correo</th>
                        <th>Fecha de Creacion</th>
                       
                        
                       
                    </tr>
                </thead>
             
</table>
</div></div>
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
   <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Representantes">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cedula</th>

                        <th>Correo</th>
                        <th>Fecha de Creacion</th>
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                    <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Generos">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Genero</th>
                        <th>Fecha de Creacion</th>
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                   <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Sectoress">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Sector</th>
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                   <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Paises">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Pais</th>
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                       <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Nacionalidades">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Pais</th>
                        <th>Nacionalidad</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                 <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Estados_civile">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Estado_civil</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                     <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Contenido_empresa">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Empresa</th>
                        <th>Status</th>
                        <th>Fecha de Elaboracion</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                     <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Contenido_representantes">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Representante</th>
                        <th>Status</th>
                        <th>Fecha de Elaboracion</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                       <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Datos_embajadas">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Empresas</th>
                    
                        <th>Fecha de Elaboracion</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                    <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Redes_sociales">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Red Social</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
                        </div>
               </li>
                     
 </ul>

 <div style="width:100%;border-bottom: 1px dotted black;margin: 1%;"></div>
  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#redes_sociales_delegados" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fa fa-mobile-phone blue1_color"></i> 
                            <span>redes sociales_delegados</span>
                        </a>
                        <div class="collapse list-unstyled" id="redes_sociales_delegados">
                      <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Redes_SD">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Red Social</th>
                        <th>Nombre de Usuario</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                   <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Redes_SE">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Red Social</th>
                        <th>Nombre de Usuario</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                   <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Sectores_empresass">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Empresa</th>
                        <th></th>
                        <th>Nombre de Usuario</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                     <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Sectores_fases">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Fase 1</th>
                        <th>Fase 2</th>
                        <th>Fase 3</th>
                        <th>Fase 4</th>
                        <th>Fase 5</th>
                        <th>Fase 6</th>
                        <th>Fase 7</th>
                        <th>Nombre de Usuario</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
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
                    <div class="card">
                <div class="card-body"> 
                              <table class="table" id="Asociador_ED">
                <thead>
                    <tr style="background-color: #13579e;color: white;text-align: center;">
                        <th>#</th>
                        <th>Fase 1</th>
                        <th>Fase 2</th>
                        <th>Fase 3</th>
                        <th>Fase 4</th>
                        <th>Fase 5</th>
                        <th>Fase 6</th>
                        <th>Fase 7</th>
                        <th>Nombre de Usuario</th>
                       
                      
                       
                        
                       
                    </tr>
                </thead>
              
</table>
</div></div>
                        </div>
               </li>
                     
 </ul>

 
        </div>
    </div>

    <script type="text/javascript" src="    https://code.jquery.com/jquery-3.7.1.js"></script>
     <script type="text/javascript" src="    https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript" src="    https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
       <script type="text/javascript" src="    https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
       <script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
       <script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
       <script type="text/javascript">
            
new DataTable('#example', {
     ajax: "{{route('actividades')}}",
     columns:[
        {data:'id'},
        {data:'usuario'},
        {data:'ip'},

        {data:'accion'},
        {data:'controlador'},
        {data:'created_at'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Usuarios', {
     ajax: "{{route('usuarios')}}",
     columns:[
        {data:'id'},
        {data:'name'},
        {data:'surname'},

        {data:'email'},
        {data:'role'},
        {data:'created_at'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Empresas', {
     ajax: "{{route('empresas')}}",
     columns:[
        {data:'id'},
        {data:'razonsocial'},
        {data:'identificador'},

        {data:'rif'},
        {data:'correo'},
        {data:'created_at'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Representantes', {
     ajax: "{{route('representantes')}}",
     columns:[
        {data:'id'},
        {data:'nombre'},
        {data:'apellido'},

        {data:'doc_identidad'},
        {data:'email'},
        {data:'created_at'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Generos', {
     ajax: "{{route('generos')}}",
     columns:[
        {data:'id'},
      
        {data:'genero'},
        {data:'created_at'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Sectoress', {
     ajax: "{{route('sectores_d')}}",
     columns:[
        {data:'id'},
      
        {data:'sector'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});
new DataTable('#Paises', {
     ajax: "{{route('paises')}}",
     columns:[
        {data:'id'},
      
        {data:'paisnombre'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});
new DataTable('#Nacionalidades', {
     ajax: "{{route('nacionalidades')}}",
     columns:[
        {data:'id'},
      
        {data:'PAIS_NAC'},
        {data:'GENTILICIO_NAC'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Estados_civile', {
     ajax: "{{route('estados_civiles')}}",
     columns:[
        {data:'id'},
      
        {data:'estado'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Contenido_empresa', {
     ajax: "{{route('contenido_empresas')}}",
     columns:[
        {data:'id'},
      
        {data:'enterprise_id'},
        {data:'status'},
        {data:'created_at'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Contenido_representantes', {
     ajax: "{{route('contenido_representantes')}}",
     columns:[
        {data:'id'},
      
        {data:'delegate_id'},
        {data:'status'},
        {data:'created_at'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Datos_embajadas', {
     ajax: "{{route('datos_embajadas')}}",
     columns:[
        {data:'id'},
      
        {data:'enterprise_id'},
        {data:'created_at'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Redes_sociales', {
     ajax: "{{route('redes_sociales')}}",
     columns:[
        {data:'id'},
      
        {data:'red'}
        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Redes_SD', {
     ajax: "{{route('redes_sociales_delegados')}}",
     columns:[
        {data:'id'},
      
        {data:'delegate_id'},
      
        {data:'username'},
      
        {data:'site'}

        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Redes_SE', {
     ajax: "{{route('redes_sociales_empresas')}}",
     columns:[
        {data:'id'},
      
        {data:'enterprise_id'},
      
        {data:'username'},
      
        {data:'site'}

        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Sectores_empresass', {
     ajax: "{{route('sectores_empresas')}}",
     columns:[
        {data:'id'},
      
        {data:'enterprise_id'},
        {data:'created_at'}

        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

new DataTable('#Sectores_fases', {
     ajax: "{{route('sectores_fases')}}",
     columns:[
        {data:'id'},
      
        {data:'enterprise_id'},
      
        {data:'username'},
      
        {data:'site'}

        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});
new DataTable('#Asociador_ED', {
     ajax: "{{route('asociador_er')}}",
     columns:[
        {data:'id'},
      
        {data:'enterprise_id'},
      
        {data:'username'},
      
        {data:'site'}

        ],
    responsive: true,
    autowidth:false,
    language: {

            "decimal": "",

            "emptyTable": "No hay información",

            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",

            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",

            "infoFiltered": "(Filtrado de _MAX_ total entradas)",

            "infoPostFix": "",

            "thousands": ",",

            "lengthMenu": "Mostrar _MENU_ Entradas",

            "loadingRecords": "Cargando...",

            "processing": "Procesando...",

            "search": "Buscar:",

            "zeroRecords": "Sin resultados encontrados",

            "paginate": {

                "first": "Primero",

                "last": "Ultimo",

                "next": ">",

                "previous": "<"

            }

          }
});

       </script>












</div>

</div>






      </div>








      </div>







    @endsection