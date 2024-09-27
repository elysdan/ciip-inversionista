@extends('layouts.panel')
@section('content')

    <style>
        
        .previews
        {  
            font-family: arial;
            height: auto;
          
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
        }
        .anexo{
            height:  15rem;
        }

        th, tr,td{
            border: solid 1px black;
        }
    </style>


<div class="previews">


            <h2 class="m-5 w-100" style="text-align:center">REPORTE DE VERIFICACIÓN DE EMPRESAS</h2>


                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2" >


                            <div style="win-width: 60%;max-width: 60%;min-height: auto;">
                                
                                    <table>
                                            
                                            <tr>
                                                
                                                  <th>OBJETO Y CONSIDERACIONES DE INTERÉS</th>
       
                                            </tr>
                                            
                                            <tr style="height:auto">
                                                
                                                    <td class="consideraciones p-3" >Tiene por objeto realizar a través de la contratación de personal especializado, la prestación de servicios acuáticos y portuarios Propios del Negocio y del transaporte Maritimo. tales como compra y venta de buques, accesorios de navegacion, plataformas de perforacion, de produccion y/o explotacion de buques propios o fletados, sea por tiempo, por viaje o mixto, llamados Contracto of Affreighment (COA), arrendados a cascos denusdos o bajo arrendamiento financiero de cualquier clase, tipo, porte o utilidad; asi como transaporte maritimo Fluivial, lascustre, bien sea nacional, se cabotaje y navegacion domestica, o inmternacional. (Expediente)</td>
                                            </tr>
                                    </table>
    <div class="field">
                                  <label class="label_field hidden">hidden label</label>
                                 
                               </div>
                                    
                                    <table>
                                            
                                            <tr>
                                                    <th>BUSQUEDA EN LISTA</th>
       
                                            </tr>
  
                                    </table>
            <div class="field">
                                          <label class="label_field hidden">hidden label</label>
                                         
                                       </div>
                                    
                                    <table>
                                                    <tr>
                                                        <th>FUENTE</th>
                                                         <th>RESULTADO</th>
                                                        
                                                    </tr>
                                                   
                                                    <tr>
                                                       <td>FBI</td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                       <td>OFAC</td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                       <td>UNION EUROPEA</td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                       <td>CONSEJO DE SEGURIDAD DE LA ONU (CSO)</td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                       <td>INTERPOL</td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                       <td>ICIJ</td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                       <td>TSJ</td>
                                                        <td></td>
                                                    </tr>
                                                     <tr>
                                                       <td>RNC</td>
                                                        <td></td>
                                                    </tr>
                                    </table>

                            <div class="field">
                                                  <label class="label_field hidden">hidden label</label>
                                                 
                                               </div>
                                            <table>
                                                <tr>
                                                    <th>ESCÁNDALOS/FRAUDES</th>
                                                     
                                                    
                                                </tr>
                                               
                                                <tr>
                                                   <td>Sin Resultados</td>
                                                    
                                                </tr>
                                                </table>

                                                 <div class="field">
                                                                          <label class="label_field hidden">hidden label</label>
                                                                         
                                                                       </div>
                                            <table>
                                                <tr>
                                                    <th>EXPERIENCIAS EXITOSAS</th>
                                                     
                                                    
                                                </tr>
                                               
                                                <tr>
                                                   <td>Sin Resultados</td>
                                                    
                                                </tr>
                                                </table>

                                              <div class="field">
                                                                          <label class="label_field hidden">hidden label</label>
                                                                         
                                                                       </div>
                                            <table>
                                                <tr>
                                                    <th>Elaborado por:</th>
                                                    <th>Revisado por:</th>
                                                    <th>Certificado por:</th>
                                                    <th>Aprobado por:</th>
                                                     
                                                    
                                                </tr>
                                               
                                                <tr  style="height: 8rem;font-size: 70%;">
                                                   <td  style="vertical-align: bottom;">HEDWING GUTIERREZ</td>
                                                   <td  style="vertical-align: bottom;">GERMAN GERARDINO</td>
                                                   <td  style="vertical-align: bottom;">MARIA PIA SAVOIA</td>
                                                   <td  style="vertical-align: bottom;">LAILA TAJELDINE</td>
                                                    
                                                </tr>
                                                </table>



                        </div>
                                    

                        <div class="ml-5" style="background-color:LIGHTGREY;min-width: 35%;max-width: 35%;height: auto;align-items: center;justify-content: center;font-size: 100%;">
                            <div style="win-width:100%;  display: flex;
  justify-content: center;">
                            <div class="d-flex m-3 p-2" style="width:50%;border:solid 1px black;justify-content: center;align-items: center;align-content: center;margin: 0 auto;">
                                <img src="{{$previa->foto}}" style="width:100%">
                            </div>
                            </div>

                                         

                            
                                <h3 style="text-align:CENTER">INFORMACIÓN GENERAL</h3>

                                     <div class="field">
                                                                          <label class="label_field hidden">hidden label</label>
                                                                         
                                                                       </div>

                            
                                <h4 style="text-align:CENTER">Razón Social</h4>

                                <h5 style="text-align:CENTER">{{$previa->razonsocial}}</h5>

                                     <div class="field">
                                                                          <label class="label_field hidden">hidden label</label>
                                                                         
                                                                       </div>

                            
                                <h4 style="text-align:CENTER">País de Origen</h4>

                                <h5 style="text-align:CENTER">{{$previa->pais_origen}}</h5>

                                     <div class="field">
                                                                          <label class="label_field hidden">hidden label</label>
                                                                         
                                                                       </div>

                            
                                <h4 style="text-align:CENTER">Registro Fizcal</h4>

                                <h5 style="text-align:CENTER">{{$previa->identificador}}-{{$previa->rif}}</h5>

                                     <div class="field">
                                                                          <label class="label_field hidden">hidden label</label>
                                                                         
                                                                       </div>

                            
                                <h4 style="text-align:CENTER">Lugar de Registro</h4>

                                <h5 style="text-align:CENTER">{{$previa->lregistro}}</h5>

                                     <div class="field">
                                                                          <label class="label_field hidden">hidden label</label>
                                                                         
                                                                       </div>

                            
                                <h4 style="text-align:CENTER">Direccion Fiscal</h4>

                                <h5 style="text-align:CENTER">{{$previa->direccion}}</h5>

                                     <div class="field">
                                                                          <label class="label_field hidden">hidden label</label>
                                                                         
                                                                       </div>

                            
                                <h4 style="text-align:CENTER">Representante Legal</h4>

                                <h5 style="text-align:CENTER">no hay</h5>

                                     <div class="field">
                                                                          <label class="label_field hidden">hidden label</label>
                                                                         
                                                                       </div>

                            
                                <h4 style="text-align:CENTER">Fecha de Consulta</h4>

                                <h5 style="text-align:CENTER">{{ date('d-m-y') }}</h5>

                                   <div class="field">
                                                                          <label class="label_field hidden">hidden label</label>
                                                                         
                                                                       </div>

                                <div class="d-flex m-5 p-1" style="justify-content: center;">
                                <table>
                                    <tr>
                                        <td ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
</svg></td>
                                    <td>
                                      @if($instagram != '0')
                                        {{$instagram->instagram}}
                                       @endif 
                                    </td>
                                </tr>
                                <tr>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
</svg></td>
                                    <td>
  @if($facebook!= '0')
                                        {{$facebook->facebook}}
                                      @endif 
                                    </td>
                                </tr>
                                <tr>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
  <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
</svg></td>
                                    <td>
                                          @if($twitter!= '0')
                                        {{$twitter->twitter}}
   @endif 
                                    </td>
                                </tr>
                                <tr>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
</svg></td>
                                    <td>
  @if($linkedin!= '0')
                                        {{$linkedin->linkedin}}
   @endif 
                                    </td>
                                </tr>
                                <tr>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
</svg></td>
                                    <td>
  @if($telefono!= '0')
                                        {{$telefono->telefono}}
   @endif 
                                    </td>
                                </tr>
                                <tr>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
</svg></td>
                                    <td>
  @if($correo!= '0')
                                        {{$correo->correo}}
   @endif 
                                    </td>
                                </tr>
                                    
                                </table>
                            </div>


                          

                        </div>
                       
                    </div>
 <div class="m-5" style="text-align:center;width: 100%;">
   <h4>Av.Venezuela Torre CIIP, Sector el Rosal.Chacao, Caracas, Venezuela</h4>
<h4>Contactos@ciip.com.ve</h4>
<h5>www.ciip.com.ve</h5>
</div>

</div>




    @endsection