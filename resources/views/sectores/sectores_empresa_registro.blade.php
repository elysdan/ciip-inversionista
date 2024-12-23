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
<form method="POST" action="{{route('sectores_empresa_registrar')}}" id="miFormulario">
@csrf
<div class="previews">

            <br>
            <h2 class="m-auto w-100" style="text-align:center">{{$sectores->sector}}</h2>

            <br>
                    <div class="row " >


                            <div style="height: auto;width: 100%;">
                                
                                    <table>
                                            
                                            <tr>
                                                
                                                  <th colspan="2"><select style="background:none;border: solid 1px lightgray;text-align: center; -webkit-appearance: none;" name="empresa_id" id="empresa_select">
                                                    <option selected disabled>Seleccione</option>
                                                    @foreach($empresas as $empresa)
                                                      <option value="{{$empresa->id}}">
                                                         {{$empresa->razonsocial}} ({{$empresa->delegate_id}} {{$empresa->delegatee_id}})
                                                      </option>
                                                      @endforeach
                                                      
                                                  </select></th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                       Representante:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;" id="delegaate_id">

                                                    

                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;" >

                                                       Pais:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;" id="paiis_id">

                                                     
                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                      Capital Inicial de Inversion:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;padding: 0;">
                                                                            <input type="number" class="w-100 h-100" min="1000" step="any" id="cii" name="cii">                     
                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                      Sector:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                     {{$sectores->sector}}
                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                       Activo:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;padding: 0;">
                                                          <textarea style="min-width: 100%;max-width: 100%;min-height:3rem;max-height:3rem" id="act" name="act" required></textarea>     
                                                     
                                                    </td>
                                                    
                                            </tr>
                                              <tr style="height:auto">
                                                      <th  style="text-align: left;min-width: 50%;max-width: 50%;">

                                                       Impacto en la Produccion:
                                                    </th>
                                                
                                                    <td  style="text-align: left;min-width: 50%;max-width: 50%;padding: 0;">
                                                          <textarea style="min-width: 100%;max-width: 100%;min-height:3rem;max-height:3rem" id="ip" name="ip" required></textarea>     
                                                     
                                                    </td>
                                                    
                                            </tr>
                                    </table>
    <br>
                                 


                        </div>
                                    

               <input type="hidden" id="delegate_id" name="delegate_id">
               
               <input type="hidden" id="pais_id" name="pais_id">
               <input type="hidden" id="sector_id" name="sector_id" value="{{$sectores->id}}">
       
                 
                  
</div>
<button class="mt-5 btn btn-primary" style="text-align:center;width: 100%;" id="submitBtn" type="submit" disabled>Elaborar</button>
</form>


</body>

<script type="text/javascript">
    var morder=document.getElementById('empresa_select').val;
    console.log(morder);
  document.getElementById('empresa_select').addEventListener('change', function() {
        const empresaId = this.value;
        // Aquí harías una petición AJAX para obtener el detalle de la empresa (si es necesario)
        // y luego actualizarías el div con el delegate_id
        document.getElementById('delegaate_id').textContent = `{{ $empresa->delegate_id }} {{ $empresa->delegatee_id }}`;
        document.getElementById('delegate_id').value = {{$empresa->delegado_id}};
        document.getElementById('paiis_id').textContent = `{{ $empresa->pais_origen }}`;
        document.getElementById('pais_id').value = `{{ $empresa->pais }}`;
    });
    
    var campo1= document.getElementById("cii");
    var campo2= document.getElementById("act");
    var campo3= document.getElementById("ip");
    var submitBtn = document.getElementById('submitBtn');

    function validarCampos() {
     
      
      var valido = campo2.checkValidity() && campo3.checkValidity() && campo1.checkValidity() ;

      submitBtn.disabled = !valido;
  }

document.getElementById('miFormulario').addEventListener('input', function(event) {
   
      var campo = event.target;
      if (campo.id === 'act' || campo.id === 'ip' ) {
          campo.value = campo.value.replace(/[^A-Za-z0-9-áÁéÉíÍóÓúÚñÑ.@,;:#$%&/()=?¡¿°!*/+" "]/g, '');
      }
      
      
      validarCampos();
  });

</script>
    @endsection