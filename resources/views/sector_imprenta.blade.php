  <style>
        body{
            margin: 0;
            width: 100%;
        }
        .previews
        {  
            font-family: arial;
            width: 80%;
            height: auto;
            margin: 0;
            font-size: 80%;
           align-items: center;
           justify-content: center;
           align-content: center;
           margin: 0 auto;
          
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
            font-size: 80%;


        }
        /* Make the number column narrower */
td:first-child {
  width: 20px;
}



/* Ensure "Inicio" and "Culminacion" have equal width */

.fases td:nth-child(2){
  width: 30%;
}
.fases td:nth-child(3){
  width: 20%;
}

.fases td:nth-child(4) {
  width: 20%;
}


        th {
            background-color: lightgrey;
            padding: .5%;
        }

        td{
            width: 50%;
        }
       

        th, tr,td{
            border: solid 1px black;
        }
    </style>
    <body>

<div class="previews">
<div style="min-width:100%; display:flex;justify-content:space-between;align-items: center">
    <div style="display: flex;align-items:center">
        <img src="{{asset('asset_original/logo_gbv.jpg')}}" style="width: 30%;">
        <div style="color:black;width:30%;text-align: left;font-size:80%">
            Vicepresidencia de la Republica Bolivariana de Venezuela
        </div></div>
        <img class="mr-5" src="{{asset('asset_original/logo-ciip.png')}}" style="width: 40%;height: 30%">
    </div>

        

     
                    <div class="row " >

                            <div style="height: auto;width: 100%;">
                                

                                    <table>
                                                <h2 class="m-auto w-100" style="text-align:center;margin-bottom: 2%;margin-top:2%">{{strtoupper($valor->sector)}}</h2>
                                            <tr>
                                                
                                                  <th colspan="2" style="background-color:darkgray;">{{strtoupper($valor->razonsocial)}}</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 20px;max-width: 20px;">

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

 
                                 

                    <div class="row " >


                            <div style="height: auto;width: 100%;" class="fases">
                             
                                    <table>
                                            
                                                <tr>
                                                    
                                                      <th rowspan="2" colspan="2" class="col-md-2"  style="background-color:darkgray;">Fase</th>
                                                      <th  colspan="2" style="background-color:darkgray;">Fecha / Periodo</th>
                                                      <th rowspan="2" class="col-md-5" style="background-color:darkgray;">Comentario</th>
           
                                                </tr>
                                                <tr>
                                                    
                                                     
                                                      <th  class="" style="background-color:darkgray;"style="background-color:darkgray;">Inicio</th>
                                                      <th  style="background-color:darkgray;">Culminacion</th>
           
                                                </tr>
                                                
                                                <tr style="height:auto" >
                                                         <td   style="padding: 0;width: 3%">1</td>
                                                    
                                                        <td class="" style="text-align: center;width: 10%;padding: 0;" id="delegaate_id">
    Reunion Exploratoria
                                                        

                                                        </td>

                                                         <td  style="text-align: center;width: 10px;" id="paiis_id">

                                                        {{$valor->fase1i}}
                                                   


                                                        </td>
                                                          <td class=""  style="text-align: center;" id="paiis_id">
                                                       
                                                                {{$valor->fase1f}}
                                                         
                                                        </td>
    @if($valor)                                                      <td class="" style="text-align: center;" id="paiis_id">
    @if($valor->fase1status) 
    @if($valor->fase1status == 2)
    Procesado 
    @elseif($valor->fase1status == 3)
    Finalizado 
    @endif 
    @else En Proceso 
    @endif @endif
                                                         
                                                        </td>
                                                        
                                                </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">2</td>
                                                
                                                    <td class="" style="text-align: center;;padding: 0;" id="delegaate_id">
Consignacion de Documentos
                                                    

                                                    </td>

                                                     <td  class="" style="text-align: center;" id="paiis_id">

                                                        {{$valor->fase2i}}
                                               
                                                    </td>
                                                      <td class=""  style="text-align: center;" id="paiis_id">
                                             

                                                          {{$valor->fase2f}}  
                                                     
                                                    </td>
 @if($valor)                                                      <td class="" style="text-align: center;" id="paiis_id">
@if($valor->fase2status) 
@if($valor->fase2status == 2)
Procesado 
@elseif($valor->fase2status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">3</td>
                                                
                                                    <td class="" style="text-align: center;;padding: 0;" id="delegaate_id">
Firma del Acuerdo de Confidencialidad
                                                    

                                                    </td>

                                                     <td  class="" style="text-align: center;" id="paiis_id">
                                                      

                                                    </td>
                                                      <td class=""  style="text-align: center;" id="paiis_id">

                                                            {{$valor->fase3f}}
                                                   
                                                    </td>
            @if($valor)                                           <td class="" style="text-align: center;" id="paiis_id">
@if($valor->fase3status) 
@if($valor->fase3status == 2)
Procesado 
@elseif($valor->fase3status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">4</td>
                                                
                                                    <td class="" style="text-align: center;;padding: 0;" id="delegaate_id">
Visita al Activo
                                                    

                                                    </td>

                                                     <td  class="" style="text-align: center;" id="paiis_id">
 
                                                        {{$valor->fase4i}}
                                                  
                                                    </td>
                                                      <td class=""  style="text-align: center;" id="paiis_id">
                                                     

                       {{$valor->fase4f}}                                     
                                                      
                                                    </td>
    @if($valor)                                                   <td class="" style="text-align: center;" id="paiis_id">
@if($valor->fase4status) 
@if($valor->fase4status == 2)
Procesado 
@elseif($valor->fase4status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">5</td>
                                                
                                                    <td class="" style="text-align: center;;padding: 0;" id="delegaate_id">
Desarrollo y Presentación del Proyecto
                                                    

                                                    </td>

                                                     <td  class="" style="text-align: center;" id="paiis_id">
 
                                                        {{$valor->fase5i}}
                                                 
                                                    </td>
                                                      <td class=""  style="text-align: center;" id="paiis_id">
 
                                                            {{$valor->fase5f}}
                                                        
                                                    </td>
     @if($valor)                                                  <td class="" style="text-align: center;" id="paiis_id">
@if($valor->fase5status) 
@if($valor->fase5status == 2)
Procesado 
@elseif($valor->fase5status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">6</td>
                                                
                                                    <td class="" style="text-align: center;padding: 0;" id="delegaate_id">
Factibilidad
                                                    

                                                    </td>

                                                     <td  class="" style="text-align: center;" id="paiis_id">
 
                                                        {{$valor->fase6i}}
                                                    
                                                    </td>
                                                      <td class=""  style="text-align: center;" id="paiis_id">
                                                    
                       {{$valor->fase6f}}                                     
                                                     
                                                    </td>
     @if($valor)                                                  <td class="" style="text-align: center;" id="paiis_id">
@if($valor->fase6status) 
@if($valor->fase6status == 2)
Procesado 
@elseif($valor->fase6status == 3)
Finalizado 
@endif 
@else En Proceso 
@endif @endif
                                                     
                                                    </td>
                                                    
                                            </tr>
                                            <tr style="height:auto" >
                                                     <td   style="padding: 0;width: 2.5%">7</td>
                                                
                                                    <td class="" style="text-align: center;padding: 0;" id="delegaate_id">
Negociacion y Firma del Contrato
                                                    

                                                    </td>

                                                     <td  class="" style="text-align: center;" id="paiis_id">
 
                                                
                                                    </td>
                                                      <td class=""  style="text-align: center;" id="paiis_id">
                                                       
                                                       {{$valor->fase7f}}     
                                                       
                                                     
                                                    </td>
                                                      <td class="" style="text-align: center;  font-weight: bold;
        text-decoration: underline;
        color: black;" id="paiis_id">
Proyeccion de Firma:
                                                     
                                                    </td>
                                                    
                                            </tr>
                                              
                                            
                                    </table>
                               
    <br>

    <table>
                                            
                                            <tr>
                                                
                                                  <th  style="text-align:left;background-color:darkgray;">Observaciones:</th>
                                               
       
                                            </tr>
                                           
                                            
                                            <tr style="height:auto" >
                                                     <td   style="height:150px;max-height:200px;text-align:left;  vertical-align: text-top;  ">
                                                      @if($valor) @php  
                                                        echo nl2br($valor->ob) ; 
                                                    @endphp
                                                    @endif
                                                    </td>
                                                
                                                   
                                            </tr>
                                           
                                              
                                            
                                    </table>

                    <div style="text-align:center;width: 100%;">
   <h4 style="margin-bottom:0;margin-top:20%">Av.Venezuela Torre CIIP, Sector el Rosal.Chacao, Caracas, Venezuela</h4>
<h4 style="margin-top:0;margin-bottom:0">Contactos@ciip.com.ve</h4>
<h5 style="margin-top:0;margin-bottom:0">www.ciip.com.ve</h5>
</div>

</div>



</body>
<script type="text/javascript">window.print();</script>
<script type="text/javascript">window.onafterprint = (event) => {
       window.history.go(-1);
       
       
    };</script>

</body>