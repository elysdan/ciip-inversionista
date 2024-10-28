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
<form method="POST" action="{{route('sector_modificador',$valor->id)}}" id="miFormulario">
@csrf
@method('PUT')
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

                                                        {{$valor->paisnombre}}
                                                     
                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                      Capital Inicial de Inversion:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;padding: 0;">
                                                                            <input type="number" value="{{$valor->cii}}" class="w-100 h-100" min="1000" step="any" id="cii" name="cii">                     
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
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;padding: 0;">
                                                          <textarea style="min-width: 100%;max-width: 100%;min-height:3rem;max-height:3rem" id="act"  name="act" required>{{$valor->act}}</textarea>     
                                                     
                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                       Impacto en la Produccion:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;padding: 0;">
                                                          <textarea style="min-width: 100%;max-width: 100%;min-height:3rem;max-height:3rem" id="ip" name="ip" required>{{$valor->ip}}</textarea>     
                                                     
                                                    </td>
                                                    
                                            </tr>
                                    </table>
    <br>
                                 


                        </div>
                                    

          <input type="hidden" name="rif" value="{{$valor->rif}}">
            <input type="hidden" name="sector_id" value="{{$valor->sector_id}}">
       
   <button class="mt-5 btn btn-primary  d-inline w-75 m-auto" style="text-align:center" id="submitBtn" type="submit" disabled>Modificar</button>              
                  
</div>

</form>


</body>

<script type="text/javascript">
  
    var campo1= document.getElementById("cii");
    var campo2= document.getElementById("act");
    var campo3= document.getElementById("ip");
    var submitBtn = document.getElementById('submitBtn');

    function validarCampos() {
     
      
      var valido = campo2.checkValidity() && campo3.checkValidity() && campo1.checkValidity() ;

      submitBtn.disabled = !valido;
  }

      
      validarCampos();



document.getElementById('miFormulario').addEventListener('input', function(event) {
   
      var campo = event.target;
      if (campo.id === 'act' || campo.id === 'ip' ) {
          campo.value = campo.value.replace(/[^A-Za-z0-9-áÁéÉíÍóÓúÚñÑ.@,;:#$%&/()=?¡¿°!*/+" "]/g, '');
      }
      
      
      validarCampos();
  });

</script>
    @endsection