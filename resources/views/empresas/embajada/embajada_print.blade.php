<link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <link rel="stylesheet" type="text/css" href="js/print.min.css">
    <style>
         body{
            margin: 0;
            width: 100%;
        }
        .previews
        {  
            font-family: arial;
            width: auto;

            justify-content: center;
            height: auto;
            max-height: 100%;
        
            font-size: auto;
            display:flex-inline;
            justify-content:space-between;
            align-items: center;
          
        }
        .consideraciones{
            text-align: justify;
            height: 10rem;
          

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
            font-size: 100%;


        }

        th {
            background-color: lightgrey;
        }

        .previews td{
            height: 5rem;
            text-align: justify;
            margin: 1%;
            font-size: 100%;
        }
        .anexo{
            height:  10rem;
        }

        th, tr,td{
            border: solid 1px black;
        }
    </style>
    <body>

<div class="previews m-auto" style="height: auto" style="margin-left: 15%;">


    <div style="min-width:100%; display:flex;justify-content:space-between;align-items: center">
        <div style="display: flex;align-items:center">
            <img src="{{asset('asset_original/logo_gbv.jpg')}}" style="width: 50%;">
        <div style="color:black;width:35%;text-align: left;font-size:120%">
          
            Ministerio del Poder Popular para <a style="font-weight: bold;">Relaciones Exteriores</a>
        
        </div>
    </div>
    <img class="mr-5" src="{{asset('asset_original/bicentenario.png')}}" style="width: 15%;;height: 25%"></div>


            <h2 class="m-5 w-100" style="text-align:center">FICHA DE VERIFICACIÓN DE EMPRESAS</h2>


                    <div class="row " style="height: 85%;">


                            <div style="height: auto;width: 58%;margin-left: 2%;">


                                  <div class="w-100 mb-5 mt-5" style="display: inline-flex;align-items: flex-end">

                                    
                                                
                                                  <h5 style="color:black;text-align: left;" class="w-50">EMBAJDA DE LA REPÚBLICA BOLIVARIANA DE VENEZUELA EN:</h5>

                                                  
                                             
                                                 
                                                   <h1  style="text-align: center;background: none;border: solid 1px white ;border-bottom: solid 1px black;outline: 0;width: 70%;height: 100%;">
                                                  {{$previa->paisembajada}}
                                                  </h1>
                                          
                                                 
       
                                            </div>
                                            <br><br><br><br>
                                
                                    <table>
                                            
                                            <tr>
                                                
                                                  <th>NOMBRE DE LA EMPRESA</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  >{{$previa->ne}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>
                                         <table>
                                            
                                            <tr>
                                                
                                                  <th>OBJETO DE LA EMPRESA</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  >{{$previa->oe}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>

                          <table>
                                            
                                            <tr>
                                                
                                                  <th>INTERÉS DE NEGOCIO CON VENEZUELA</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  >{{$previa->inv}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>

                          <table>
                                            
                                            <tr>
                                                
                                                  <th>EXPERIENCIAS EXITOSAS</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  >{{$previa->ex}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>

                           <table>
                                            
                                            <tr>
                                                
                                                  <th>ALERTAS</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  >{{$previa->al}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>


                          <table>
                                            
                                            <tr>
                                                
                                                  <th>OBSERVACIONES</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td  >{{$previa->ob}}</td>
                                            </tr>
                                    </table>
    <br>
                                    
                                    
                                  
                          <br>


                        </div>
                                    

                        <div class="ml-5" style="background-color:LIGHTGREY;width: 35%;height: auto;align-items: center;justify-content: center;font-size: 100%;">
                            <div style="win-width:100%;  display: flex;
  justify-content: center;">
                            <div class="d-flex m-3 p-2" style="width:20vw;height: 20vw;border:solid 1px black;justify-content: center;align-items: center;align-content: center;margin: 0 auto;">
                                <img src="{{$previa->foto}}" style="width:auto;min-height: 100%;max-height: 100%;max-width: 100%;">
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

                                 <h5 style="text-align:CENTER">{{$previa->delegado_nombre}}</h5>
                                  <h5 style="text-align:CENTER">{{$previa->delegado_apellido}}</h5>


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


</body>
<script type="text/javascript">window.print();</script>
<script type="text/javascript"> window.onafterprint = (event) => {
       window.history.go(-1);
       
       
    };</script>