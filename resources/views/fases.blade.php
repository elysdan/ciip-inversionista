@extends('layouts.panel')
@section('content')

    <style>
        body{
            margin: 0;
            width: 100%;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;


        }

        th, td {
            text-align: center;
            padding: 5px;
            border: 1px solid #ddd;
            color: black;
            font-size: auto;


        }

        th {
            background-color: lightgrey;
        }


        th, tr,td{
            border: solid 1px black;
        }
    </style>
    <body>

<div class="previews">

            <br>
            <h2 class="m-auto w-100" style="text-align:center">{{$valor->razonsocial}}</h2>

            <br>
                    <div class="row " >


                            <div style="height: auto;width: 100%;">
                                <form method="POST" action="{{route('fases_registro',$valor->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <table>
                                            
                                            <tr>
                                                
                                                  <th rowspan="2" colspan="2"  >Fase</th>
                                                  <th  colspan="2" >Fecha / Periodo</th>
                                                  <th rowspan="2">Comentario</th>
       
                                            </tr>
                                            <tr>
                                                
                                                 
                                                  <th >Inicio</th>
                                                  <th  >Culminacion</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">1</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Reunion Exploratoria
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">
@if($fase)
@if($fase->fase1i)
                                                    {{$fase->fase1i}}
                                                     @else
                                                      <button type="submit" name="fase1i" value="{{today()->format('d-m-y')}}" class="btn btn-outline-success">Iniciar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                     @endif @endif


                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">
                                                       @if($fase) @if($fase->fase1f)
                                                            {{$fase->fase1f}}
                                                        @elseif($fase->fase1i )
                                                          <button class="btn btn-outline-success" type="submit" name="fase1f" value="{{today()->format('d-m-y')}}">Culminar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                          @else
                                                            Fecha estimada:   {{today()->addDays(5)->format('d-m-y')}}
                                                        @endif @endif
                                                    </td>
@if($fase)                                                      <td class="col-md-2" style="text-align: center;" id="paiis_id">
@if($fase->fase1status) 
@if($fase->fase1status == 2)
Procesado 
@elseif($fase->fase1status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">2</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Consignacion de Documentos
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">
 @if($fase)
                                                   @if($fase->fase2i)
                                                        {{$fase->fase2i}}
                                                     @else
                                                      <button class="btn btn-outline-success" type="submit" name="fase2i" value="{{today()->format('d-m-y')}}"  >Iniciar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                     @endif @endif
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">
                                                        @if($fase)
  @if($fase->fase2f)
                                                          {{$fase->fase2f}}  
                                                        @elseif($fase->fase2i )
                                                          <button class="btn btn-outline-success" type="submit" name="fase2f" value="{{today()->format('d-m-y')}}">Culminar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                          @else
                                                            Fecha estimada:   {{today()->addDays(5)->format('d-m-y')}}
                                                        @endif
                                                     @endif
                                                    </td>
 @if($fase)                                                      <td class="col-md-2" style="text-align: center;" id="paiis_id">
@if($fase->fase2status) 
@if($fase->fase2status == 2)
Procesado 
@elseif($fase->fase2status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">3</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Firma del Acuerdo de Confidencialidad
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">
                                                         @if($fase)
@if($fase->fase3i)
                                                        {{$fase->fase3i}}
                                                     @else
                                                      <button class="btn btn-outline-success" type="submit" name="fase3i" value="{{today()->format('d-m-y')}}" >Iniciar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                     @endif @endif
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">
@if($fase)
                                                      @if($fase->fase3f)
                                                            {{$fase->fase3f}}
                                                        @elseif($fase->fase3i )
                                                          <button class="btn btn-outline-success" type="submit" name="fase3f" value="{{today()->format('d-m-y')}}">Culminar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                          @else
                                                            Fecha estimada:   {{today()->addDays(10)->format('d-m-y')}}
                                                        @endif @endif
                                                    </td>
            @if($fase)                                           <td class="col-md-2" style="text-align: center;" id="paiis_id">
@if($fase->fase3status) 
@if($fase->fase3status == 2)
Procesado 
@elseif($fase->fase3status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">4</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Visita al Activo
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">
 @if($fase)
                                                    @if($fase->fase4i)
                                                        {{$fase->fase4i}}
                                                     @else
                                                      <button class="btn btn-outline-success" type="submit" name="fase4i" value="{{today()->format('d-m-y')}}" >Iniciar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                     @endif @endif
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">
                                                         @if($fase)
 @if($fase->fase4f)
                       {{$fase->fase4f}}                                     
                                                        @elseif($fase->fase4i )
                                                          <button class="btn btn-outline-success" type="submit" name="fase4f" value="{{today()->format('d-m-y')}}">Culminar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                          @else
                                                            Fecha estimada:   {{today()->addDays(30)->format('d-m-y')}}
                                                        @endif @endif
                                                     
                                                    </td>
    @if($fase)                                                   <td class="col-md-2" style="text-align: center;" id="paiis_id">
@if($fase->fase4status) 
@if($fase->fase4status == 2)
Procesado 
@elseif($fase->fase4status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">5</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Desarrollo y Presentación del Proyecto
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">
 @if($fase)
                                                  @if($fase->fase5i)
                                                        {{$fase->fase5i}}
                                                     @else
                                                      <button class="btn btn-outline-success" type="submit" name="fase5i" value="{{today()->format('d-m-y')}}" >Iniciar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                     @endif @endif
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">
 @if($fase)
                                                       @if($fase->fase5f)
                                                            {{$fase->fase5f}}
                                                        @elseif($fase->fase5i )
                                                          <button class="btn btn-outline-success" type="submit" name="fase5f" value="{{today()->format('d-m-y')}}">Culminar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                          @else
                                                            Fecha estimada:   {{today()->addDays(5)->format('d-m-y')}}
                                                        @endif @endif
                                                    </td>
     @if($fase)                                                  <td class="col-md-2" style="text-align: center;" id="paiis_id">
@if($fase->fase5status) 
@if($fase->fase5status == 2)
Procesado 
@elseif($fase->fase5status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">6</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Factibilidad
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">
 @if($fase)
                                                   @if($fase->fase6i)
                                                        {{$fase->fase6i}}
                                                     @else
                                                      <button class="btn btn-outline-success" type="submit" name="fase6i" value="{{today()->format('d-m-y')}}" >Iniciar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                     @endif @endif
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">
                                                        @if($fase)
 @if($fase->fase6f)
                       {{$fase->fase6f}}                                     
                                                        @elseif($fase->fase6i )
                                                          <button class="btn btn-outline-success" type="submit" name="fase6f" value="{{today()->format('d-m-y')}}">Culminar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                          @else
                                                            Fecha estimada:   {{today()->addDays(26)->format('d-m-y')}}
                                                        @endif
                                                     @endif
                                                    </td>
     @if($fase)                                                  <td class="col-md-2" style="text-align: center;" id="paiis_id">
@if($fase->fase6status) 
@if($fase->fase6status == 2)
Procesado 
@elseif($fase->fase6status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">7</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Negociacion y Firma del Contrato
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">
 @if($fase)
                                                   @if($fase->fase7i)
                                                        {{$fase->fase7i}}
                                                     @else
                                                      <button class="btn btn-outline-success" type="submit" name="fase7i" value="{{today()->format('d-m-y')}}" >Iniciar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                     @endif @endif
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">
                                                         @if($fase)
 @if($fase->fase7f)
                                                       {{$fase->fase7f}}     
                                                        @elseif($fase->fase7i )
                                                          <button class="btn btn-outline-success" type="submit" name="fase7f" value="{{today()->format('d-m-y')}}">Culminar en fecha del: {{today()->format('d-m-y')}}  </button>
                                                          @else
                                                            Fecha estimada:   {{today()->addDays(5)->format('d-m-y')}}
                                                        @endif @endif
                                                     
                                                    </td>
                                                      <td class="col-md-2" style="text-align: center;  font-weight: bold;
        text-decoration: underline;
        color: black;" id="paiis_id">
Proyeccion de Firma:
                                                     
                                                    </td>
                                                    
                                            </tr>
                                              
                                            
                                    </table>
                               
    <br>

    <table>
                                            
                                            <tr>
                                                
                                                  <th  style="text-align:left">Observaciones:</th>
                                               
       
                                            </tr>
                                           
                                            
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">
                                                        <textarea name="ob" style="min-width:100%;max-width: 100%;">@if($fase) {{$fase->ob}} @endif</textarea>
                                                    </td>
                                                
                                                   
                                            </tr>
                                           
                                              
                                            
                                    </table>
<br>         
                  <button type="submit" class="btn btn-primary w-50 m-auto d-flex" style="text-align:center;justify-content:center">Actualizar</button>

</form>
<br>
  <table class="m-auto w-75">
                                                    <tr >
                                                  
                                                         
                                                         
                                                         <th>Imprimir</th>
                                                         @if(session('usuario')->role >=8)
                                                       
                                                         @endif
                                                        
                                                    </tr>
                                            

                                                         <td class="col-md-1"><a href="{{route('sector_imprenta', ['id'=>$versiones->first()->evaluador])}}"><div class=" w-75 btn btn-primary" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
  <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
  <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
</svg></div></a></td>


  

                                                    </tr>
                                                 
                                                    
                                    </table>
                        </div>


            
</div>

                        
                        





    @endsection