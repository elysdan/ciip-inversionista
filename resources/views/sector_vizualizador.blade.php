@extends('layouts.panel')
@section('content')

    <style>
        body{
            margin: 0;
            width: 100%;
        }
        .previews
        {  
            font-family: arial;
            width: 100%;
            height: auto;
            margin: 0;
            font-size: auto;
          
        }
        .consideraciones{
            text-align: justify;
            height: 15rem;
          

        }
        table {
            border-collapse: collapse;
            width: 100%;


        }

        th, td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
            color: black;
            font-size: 140%;


        }

        th {
            background-color: lightgrey;
        }

        td{
            width: 50%;
        }
        .anexo{
            height:  15rem;
        }

        th, tr,td{
            border: solid 1px black;
        }
    </style>
    <body>

<div class="previews">

            <br>
            <h2 class="m-auto w-100" style="text-align:center">{{$valor->sector}}</h2>

            <br>
                    <div class="row " >


                            <div style="height: auto;width: 100%;">
                                
                                    <table>
                                            
                                            <tr>
                                                
                                                  <th colspan="2">{{$valor->razonsocial}}</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                       Representante:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;" id="delegaate_id">
{{$valor->nombre}} {{$valor->apellido}}
                                                    

                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;" >

                                                       Pais:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;" id="paiis_id">
{{$valor->pais}}
                                                     
                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                      Capital Inicial de Inversion:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;">
                                                            {{$valor->cii}}                             
                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                      Sector:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                    {{$valor->sector}}
                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                       Activo:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;">
                                                           {{$valor->act}}
                                                     
                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                       Impacto en la Produccion:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;">
                                                        
                                                        {{$valor->ip}}
                                                    </td>
                                                    
                                            </tr>
                                    </table>
    <br>

    <table class="m-1 w-100">
                                                    <tr >
                                                      
                                                        <th>Fecha de Elaboracion</th>
                                                         
                                                          @if(session('usuario')->role >= 5)
                                                         <th>Modificar</th>
                                                         @endif
                                                         <th>Imprimir</th>
                                                         @if(session('usuario')->role >=8)
                                                       
                                                         @endif
                                                        
                                                    </tr>
                                                   @foreach($versiones as $version)
                                                    <tr>
                                                      
                                                       <td class="col-md-1">{{ \Carbon\Carbon::parse($version->updated_at)->locale('es_ES')
                                                        ->isoFormat('dddd DD [de] MMMM [de] YYYY [a las] hh:mm') }}</td>
                                                      
                                                        @if(session('usuario')->role >= 5)
                                                        @if(session('usuario')->role >= 7)
                                                        <td class="col-md-1"><a href="{{route('sector_modificar', ['id'=>$version->evaluador])}}"><div class=" w-75 btn btn-warning" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
</svg></div></a></td>
@else

 <td class="col-md-1"><div class=" w-75 btn btn-secondary" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
</svg></div></td>

@endif
@endif

                                                         <td class="col-md-1"><a href="{{route('sector_imprenta', ['id'=>$version->evaluador])}}"><div class=" w-75 btn btn-primary" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
  <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
  <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
</svg></div></a></td>


  

                                                    </tr>
                                                    @endforeach
                                                    
                                    </table>
                                 


                        </div>
                                    

            
                 
                  
</div>



</body>


    @endsection