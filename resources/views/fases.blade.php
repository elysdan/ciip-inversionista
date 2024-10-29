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

                                                     <button class="btn btn-outline-success">Iniciar    </button>
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">

                                                     
                                                    </td>
                                                      <td class="col-md-2" style="text-align: center;" id="paiis_id">
En Proceso
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">2</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Consignacion de Documentos
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">

                                                     <button class="btn btn-outline-success">Iniciar    </button>
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">

                                                     
                                                    </td>
                                                      <td class="col-md-2" style="text-align: center;" id="paiis_id">
En Proceso
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">3</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Firma del Acuerdo de Confidencialidad
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">

                                                     <button class="btn btn-outline-success">Iniciar    </button>
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">

                                                     
                                                    </td>
                                                      <td class="col-md-2" style="text-align: center;" id="paiis_id">
En Proceso
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">4</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Visita al Activo
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">

                                                     <button class="btn btn-outline-success">Iniciar    </button>
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">

                                                     
                                                    </td>
                                                      <td class="col-md-2" style="text-align: center;" id="paiis_id">
En Proceso
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">5</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Desarrollo y Presentación del Proyecto
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">

                                                     <button class="btn btn-outline-success">Iniciar    </button>
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">

                                                     
                                                    </td>
                                                      <td class="col-md-2" style="text-align: center;" id="paiis_id">
En Proceso
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">6</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Factibilidad
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">

                                                     <button class="btn btn-outline-success">Iniciar    </button>
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">

                                                     
                                                    </td>
                                                      <td class="col-md-2" style="text-align: center;" id="paiis_id">
En Proceso
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">7</td>
                                                
                                                    <td class="col-md-2" style="text-align: center;" id="delegaate_id">
Negociacion y Firma del Contrato
                                                    

                                                    </td>

                                                     <td  class="col-md-2" style="text-align: center;" id="paiis_id">

                                                     <button class="btn btn-outline-success">Iniciar    </button>
                                                    </td>
                                                      <td class="col-md-2"  style="text-align: center;" id="paiis_id">

                                                     
                                                    </td>
                                                      <td class="col-md-2" style="text-align: center;  font-weight: bold;
        text-decoration: underline;
        color: black;" id="paiis_id">
Proyeccion de Firma:
                                                     
                                                    </td>
                                                    
                                            </tr>
                                              
                                            
                                    </table>
    <br>
<form method="POST" action="{{route('fases_registro',$valor->id)}}">
    @csrf
    @method('PUT')
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
                        </div>


            
</div>

                        
                        





    @endsection