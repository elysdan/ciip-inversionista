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
            height: 3rem;
            padding: 0;
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


            <h2 class="m-5 w-100" style="text-align:center">REPORTE DE VERIFICACIÓN DE EMPRESAS</h2>


                    <div class="row " >


                            <div style="height: auto;width: 60%">


                                  <div class="w-100 mb-5 " style="display: inline-flex;align-items: flex-end">

                                    
                                                
                                                  <h1 style="color:black;" class="w-50">EMBAJDA DE LA REPÚBLICA BOLIVARIANA DE VENEZUELA EN:</h1>

                                                  
                                             
                                                 
                                                   <h1 name="pais" style="text-align: center;background: none;border: solid 1px white ;border-bottom: solid 1px black;outline: 0;width: 70%;height: 100%;">
                                                  {{$previa->paisembajada}}
                                                  </h1>
                                          
                                                 
       
                                            </div>
                                            <br><br><br><br>
                                
                                    <table>
                                            
                                            <tr>
                                                
                                                  <th>NOMBRE DE LA EMPRESA</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;">{{$previa->ne}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>
                                         <table>
                                            
                                            <tr>
                                                
                                                  <th>OBJETO DE LA EMPRESA</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;">{{$previa->oe}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>

                          <table>
                                            
                                            <tr>
                                                
                                                  <th>INTERÉS DE NEGOCIO CON VENEZUELA</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;">{{$previa->inv}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>

                          <table>
                                            
                                            <tr>
                                                
                                                  <th>EXPERIENCIAS EXITOSAS</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;">{{$previa->ex}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>

                           <table>
                                            
                                            <tr>
                                                
                                                  <th>ALERTAS</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;">{{$previa->al}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>


                          <table>
                                            
                                            <tr>
                                                
                                                  <th>OBSERVACIONES</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;">{{$previa->ob}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>


                        </div>
                                    

                        <div class="ml-5" style="background-color:LIGHTGREY;width: 35%;height: auto;align-items: center;justify-content: center;font-size: 100%;">
                            <div style="win-width:100%;  display: flex;
  justify-content: center;">
                            <div class="d-flex m-3 p-2" style="width:10vw;height: 10vw;border:solid 1px black;justify-content: center;align-items: center;align-content: center;margin: 0 auto;">
                                <img src="{{$previa->foto}}" style="width:auto;max-height: 100%;">
                            </div>
                            </div>

                                         

                            
                                <h3 style="text-align:CENTER">INFORMACIÓN GENERAL</h3>

                                     <br><br>

                                      <h4 style="text-align:CENTER">País de Origen</h4>

                                <h5 style="text-align:CENTER">{{$previa->pais_origen}}</h5>

                                <br><br>

                                  <h4 style="text-align:CENTER">Direccion Fiscal</h4>

                                <h5 style="text-align:CENTER">{{$previa->direccion}}</h5>

                                     <br><br>
                            
                                 <h4 style="text-align:CENTER">Numero de Registro de la Empresa</h4>

                                <h5 style="text-align:CENTER">{{$previa->identificador}}-{{$previa->rif}}</h5>
                                     
                            
                               

                                     <br><br>
                            
                               

                                  
                              
                            
                                <h4 style="text-align:CENTER">Representante Legal</h4>

                                <h5 style="text-align:CENTER">no hay</h5>

                                     <br><br>
                            
                               
                                <div class="d-flex m-3 p-1" style="justify-content: center;font-size: auto;">
                                <table>
                                  
                                <tr>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
</svg></td>
                                    <td>
  
                                        {{$previa->telefono}}
 
                                    </td>
                                </tr>
                                <tr>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
</svg></td>
                                    <td>

                                        {{$previa->correo}}
  
                                    </td>
                                </tr>
                                    
                                </table>
                            </div>


                          

                        </div>
                       
                    </div>
                 
                  

</div>



    <div class="mt-5" style="text-align:center;width: 100%;">
<a href="{{route('embajada_print',$previa->id)}}" class="btn btn-primary">Imprimir</a>
</div>

<br>
<table class="w-75 mt-5 m-auto">
    <tr>
<th>
      Version 
    </th>

    <th>
      Imprimir   
    </th>

    <th>
      Modificar   
    </th>

<th>
      Eliminar
    </th>
    </tr>

    <tr>
         @foreach($versiones as $version)
<td>
     {{ \Carbon\Carbon::parse($version->updated_at)->locale('es_ES')
                                                        ->isoFormat('dddd DD [de] MMMM [de] YYYY [a las] hh:mm') }}
    </td>



    <td>
      <a href="{{route('embajada_print',$version->id)}}">
      <div class=" w-75 btn btn-primary" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
  <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
  <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
</svg></div></a>
    </td>

    <td>
         <a href="{{route('embajada_modificar',$version->id)}}">
     <div class=" w-75 btn btn-warning" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"/>
</svg></div></a>
    </td>

<td>
      <form  method="POST" action="{{route('embajada_eliminador',$version->id)}}">
                                                                @csrf
@method('PUT')
<button class=" w-75 btn btn-danger" type="submit">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
</svg></button></form>
    </td>
    </tr>

    @endforeach()
    
</table>

</body>


    @endsection