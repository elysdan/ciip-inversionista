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
<form method="POST" action="{{route('embajada_modificador',$previa->id)}}" id="miFormulario">
@csrf
@method('PUT')
<div class="previews">


            <h2 class="m-5 w-100" style="text-align:center">REPORTE DE VERIFICACIÓN DE EMPRESAS</h2>


                    <div class="row " >


                            <div style="height: auto;width: 60%">


                                  <div class="w-100 mb-5 " style="display: inline-flex;align-items: flex-end">

                                    
                                                
                                                  <h1 style="color:black;" class="w-50">EMBAJDA DE LA REPÚBLICA BOLIVARIANA DE VENEZUELA EN:</h1>

                                                  
                                             
                                                 
                                                   <select name="pais" style="text-align: center;font-size: 150%;background: none;border: solid 1px white ;border-bottom: solid 1px black;outline: 0;width: 70%;height: 100%;">
                                                    @foreach($paises as $pais)
                                                      <option value="{{$pais->id}}" @if($pais->id == $previa->pais) selected @endif>{{$pais->paisnombre}}</option>
                                                      @endforeach
                                                  </select>
                                          
                                                 
       
                                            </div>
                                            <br><br><br><br>
                                
                                    <table>
                                            
                                            <tr>
                                                
                                                  <th>NOMBRE DE LA EMPRESA</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;"><textarea style="font-size: 100%;width:100%;height: 100%;margin: 0;padding:0;min-height: 5rem;max-height: 5rem;font-family: arial;" placeholder="Sin Resultados" name="ne" id="ne" pattern="[A-Za-z0-9-áÁéÉíÍóÓúÚñÑ.@,;:#$%&/()=?¡¿°!*/+' ']{4,500}" maxlength="500"  required>{{$previa->ne}}</textarea></td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>
                                         <table>
                                            
                                            <tr>
                                                
                                                  <th>OBJETO DE LA EMPRESA</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;"><textarea style="font-size: 100%;width:100%;height: 100%;margin: 0;padding:0;min-height: 5rem;max-height: 5rem;font-family: arial;" placeholder="Sin Resultados" name="oe" id="oe" pattern="[A-Za-z0-9-áÁéÉíÍóÓúÚñÑ.@,;:#$%&/()=?¡¿°!*/+' ']{4,500}" maxlength="500"  required>{{$previa->oe}}</textarea></td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>

                          <table>
                                            
                                            <tr>
                                                
                                                  <th>INTERÉS DE NEGOCIO CON VENEZUELA</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;"><textarea style="font-size: 100%;width:100%;height: 100%;margin: 0;padding:0;min-height: 5rem;max-height: 5rem;font-family: arial;" placeholder="Sin Resultados" name="inv" id="inv" pattern="[A-Za-z0-9-áÁéÉíÍóÓúÚñÑ.@,;:#$%&/()=?¡¿°!*/+' ']{4,500}" maxlength="500" required>{{$previa->inv}} </textarea></td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>

                          <table>
                                            
                                            <tr>
                                                
                                                  <th>EXPERIENCIAS EXITOSAS</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;"><textarea style="font-size: 100%;width:100%;height: 100%;margin: 0;padding:0;min-height: 5rem;max-height: 5rem;font-family: arial;" placeholder="Sin Resultados" name="ex" id="ex" pattern="[A-Za-z0-9-áÁéÉíÍóÓúÚñÑ.@,;:#$%&/()=?¡¿°!*/+' ']{4,500}" maxlength="500"  required>{{$previa->ex}}</textarea></td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>

                           <table>
                                            
                                            <tr>
                                                
                                                  <th>ALERTAS</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;"><textarea style="font-size: 100%;width:100%;height: 100%;margin: 0;padding:0;min-height: 5rem;max-height: 5rem;font-family: arial;" placeholder="Sin Resultados" name="al" id="al" pattern="[A-Za-z0-9-áÁéÉíÍóÓúÚñÑ.@,;:#$%&/()=?¡¿°!*/+' ']{4,500}" maxlength="500"  required>{{$previa->al}}</textarea></td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>


                          <table>
                                            
                                            <tr>
                                                
                                                  <th>OBSERVACIONES</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  style="padding: 0;"><textarea style="font-size: 100%;width:100%;height: 100%;margin: 0;padding:0;min-height: 5rem;max-height: 5rem;font-family: arial;" placeholder="Sin Resultados" name="ob" id="ob" pattern="[A-Za-z0-9-áÁéÉíÍóÓúÚñÑ.@,;:#$%&/()=?¡¿°!*/+' ']{4,500}" maxlength="500"  required>{{$previa->ob}}</textarea></td>
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
<input type="hidden" name="enterprise_id" value="{{$previa->id}}">

<button class="mt-5 btn btn-primary" style="text-align:center;width: 100%;" id="submitBtn" type="submit" disabled>Modificar</button>
</form>

<!--
    <div class="mt-5" style="text-align:center;width: 100%;">
<a href="{{route('prueba_pdf',$previa->id)}}" class="btn btn-primary">Imprimir</a>
</div>
-->
</body>

<script type="text/javascript">
    var campo1= document.getElementById("ne");

    var campo2= document.getElementById("oe");
    var campo3= document.getElementById("inv");
    var campo4= document.getElementById("ex");
    var campo5= document.getElementById("ex");
    var campo6= document.getElementById("al");
    var campo7= document.getElementById("ob");
    var campo8= document.getElementById("pais");
    var submitBtn = document.getElementById('submitBtn');

    function validarCampos() {
     
      
      var valido = campo1.checkValidity() && campo2.checkValidity() && campo3.checkValidity() && campo4.checkValidity() && campo5.checkValidity() && campo6.checkValidity() && campo7.checkValidity();

      submitBtn.disabled = !valido;
  }

document.getElementById('miFormulario').addEventListener('input', function(event) {
   
      var campo = event.target;
      if (campo.id === 'ne' || campo.id === 'oe' || campo.id === 'inv' || campo.id === 'ex' || campo.id === 'ex' || campo.id === 'al' || campo.id === 'ob' || campo.id === 'pais') {
          campo.value = campo.value.replace(/[^A-Za-z0-9-áÁéÉíÍóÓúÚñÑ.@,;:#$%&/()=?¡¿°!*/+" "]/g, '');
      }
      
      
      validarCampos();
  });

</script>
    @endsection