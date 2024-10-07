@extends('layouts.panel')
@section('content')

  <style>
          .table td{vertical-align: inherit;"}
        </style>
        <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Registro de Empresas</h2>
                           </div>
                        </div>
                     </div>


<div class="col-md-12">
  <button type="button" class="btn btn-outline-success mt-3 mb-3 p-0"
        style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center; width: 3vw; height: 3vw;"
        data-toggle="modal" data-target="#RegModal" data-whatever="@mdo">
  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16"
       style="width: 2vw; height: 2vw;">
    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0"/>
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
  <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>

     </svg>
</button>


                           <div class="white_shd full margin_bottom_30">


                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Empresas</h2>
                                 </div>
                              </div>

<div class="table_section padding_infor_info">
    


   <div class="table-responsive-sm">
      <table class="table">
         <thead class="thead" >
            <tr style="background-color: #13579e;color: white;">
              <th  >#</th>

<th >Razon Social</th>
<th >Rif</th>
<th >Pais de Origen</th>
<th >Lugar de Registro</th>
<th >Direccion</th>
<th >Correo</th>
<th >Telefono</th>
<th >Redes Sociales</th>
<th colspan="2">Reporte</th>


<th>Foto</th>
@if(session('usuario')->role==9 )
<th>Status</th>
<th  colspan="2"> Administracion</th>
@endif
            </tr>
         </thead>
         <tbody style="color:black">
          @php $n=1; @endphp
           @if($empresas && session('usuario')->role==9)
             
             @foreach($empresas as $empresa)


<tr style="vertical-align: none;text-align: center;align-items: center;
justify-content: center;
align-content: center;" >
<td >@php echo $n; @endphp</td>


<td>{{$empresa->razonsocial}}</td>
<td>{{$empresa->identificador}}-{{$empresa->rif}}</td>

<td>{{$empresa->pais_origen}}</td>
<td>{{$empresa->lregistro}}</td>

<td>{{$empresa->direccion}}</td>
<td>{{$empresa->correo}}</td>
<td>{{$empresa->telefono}}</td>

<td><a href="{{route('add_web',$empresa->id)}}" class="btn btn-outline-primary mt-1 mb-1 p-0"  style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;text-align: center;">
                
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;text-align: center;
    align-items: center;
    justify-content: center;">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                    </svg>
               
              </a></td>

              <td><a href="{{route('previews',$empresa->id)}}"><button class="btn btn-primary">Generar</button></a></td>
                @if($generador > 0)
              <td><a href="{{route('elaborador',$empresa->id)}}"><button class="btn btn-primary">Visualizar</button></a></td>
              @endif
              <td style="vertical-align: top;align-items: center;
  justify-content: center;
  align-content: center;"> <img src="{{$empresa->foto}}" style="border-radius: 50%;
  align-items: center;
  justify-content: center;
  align-content: center;
  width: 3vw;"></td>
@if(session('usuario')->role==9 )
<td>
@if($empresa->status==1)
<form method="POST" action="{{route('suspend_enterprises',$empresa->id)}}">
  @csrf
  @method('PUT')
<button type="submit" 
                class="btn btn-outline-success mt-1 mb-1 p-0" 
                
                  style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;">
                     <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
</svg>
                </button>
              </form>
@endif

@if($empresa->status==0)
 <form method="POST" action="{{route('update_enterprises',$empresa->id)}}">
  @csrf
  @method('PUT')

<button type="submit" 
                class="btn btn-outline-danger mt-1 mb-1 p-0" 
                
                  style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;">
                      <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
</svg>
                </button></form>
                


@endif

</td>
              <td>
                <a href="{{route('edit_enterprises',$empresa->id)}}">
                <button type="button" 
                class="btn btn-outline-warning mt-1 mb-1 p-0" 
                
                  style="border-radius: 1rem; display: inline-flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;">
                       <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
  <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm4.386 1.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
</svg>
                </button>
                
              </a>
            </td>

              <td>
                
                <button type="button" 
class="btn btn-outline-danger mt-1 mb-1 p-0" 

  style="border-radius: 1rem; display: flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;"  
data-toggle="modal" data-target="#DelModal{{$empresa->id}}" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-dash" align="center" viewBox="0 0 16 16" style="width: 2vw;">
      <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
  <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm5 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
</svg>
</button>
<div class="modal fade" id="DelModal{{$empresa->id}}" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
       <h3>¿Desea Eliminar la Empresa</h3>
      </div>
      <div class="modal-footer">
        
       
        <form method="POST" action="{{route('delete_enterprises', $empresa->id)}}" > 
          @csrf 
          @method('PUT')
          <input class="btn btn-primary" type="submit" value="Si">
        </form>
      </div>
    </form>
    </div>

  </div>
</div>
                

                
              
              </td>

              @endif
              @php $n++; @endphp
              @endforeach
              
              @else
              @php $n=1; @endphp
@foreach($empresas as $empresa)
@if($empresa->status==1)


<tr style="vertical-align: none;text-align: center;align-items: center;
justify-content: center;
align-content: center;" >
<td >@php echo $n; @endphp</td>


<td>{{$empresa->razonsocial}}</td>
<td>{{$empresa->identificador}}-{{$empresa->rif}}</td>

<td>{{$empresa->pais_origen}}</td>
<td>{{$empresa->lregistro}}</td>

<td>{{$empresa->direccion}}</td>

<td><a href="{{route('add_web',$empresa->id)}}" class="btn btn-outline-primary mt-1 mb-1 p-0"  style="border-radius: 1rem; display: flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;text-align: center;">
                
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;text-align: center;
    align-items: center;
    justify-content: center;">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                    </svg>
               
              </a></td>

              <td><a href="{{route('previews',$empresa->id)}}"><button class="btn btn-primary">Ver Detalle</button></a></td>
              <td style="vertical-align: top;align-items: center;
  justify-content: center;
  align-content: center;"> <img src="{{$empresa->foto}}" style="border-radius: 50%;
  align-items: center;
  justify-content: center;
  align-content: center;
  width: 3vw;"></td>
@if(session('usuario')->role==9 )
<td>{{$empresa->status}}</td>
              <td>
                <a href="{{route('edit_enterprises',$empresa->id)}}">
                <button type="button" 
                class="btn btn-outline-warning mt-1 mb-1 p-0" 
                
                  style="border-radius: 1rem; display: flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;" > 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-gear" align="center" viewBox="0 0 16 16" style="width: 2vw;">
                       <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
  <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm4.386 1.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
</svg>
                </button>
                
              </a>
            </td>

              <td>
                
                <button type="button" 
class="btn btn-outline-danger mt-1 mb-1 p-0" 

  style="border-radius: 1rem; display: flex; align-items: center; justify-content: center;width: 3vw;height: 3vw;"  
data-toggle="modal" data-target="#DelModal{{$empresa->id}}" data-whatever="@mdo"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-fill-dash" align="center" viewBox="0 0 16 16" style="width: 2vw;">
      <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
  <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm5 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
</svg>
</button>
<div class="modal fade" id="DelModal{{$empresa->id}}" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
       <h3>¿Desea Eliminar la Empresa</h3>
      </div>
      <div class="modal-footer">
        
       
        <form method="POST" action="{{route('delete_enterprises', $empresa->id)}}" > 
          @csrf 
          @method('PUT')
          <input class="btn btn-primary" type="submit" value="Si">
        </form>
      </div>
    </form>
    </div>

  </div>
</div>
                

                
              
              </td>

              @endif
              @endif
              @php $n++; @endphp
              @endforeach
              
              @endif



         </tbody>
      </table>
   </div>
</div>
</div>
</div>
</div>






<div class="modal fade w-100" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="RegModal" aria-hidden="true" style="align-items: center;
  justify-content: center;
  align-content: center;">  
        <div class="modal-dialog w-100" role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Registro de Empresas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
<div class="modal-body">
              <form action="{{route('enterprises_register')}}" method="POST" enctype="multipart/form-data" id="miFormulario">
                @csrf
                <div class="form-group">
                  <label for="campo1" class="col-form-label">Razon Social:</label>
                  <input type="text" class="form-control" id="campo1" name="razon" pattern="[A-Za-z0-9áÁéÉíÍóÓúÚñÑ®©.' ']{4,100}" maxlength="100" required>
                    <label for="campo2" class="col-form-label">Rif:</label>
                    <div class="input-group">
                    <select class="form-control" id="campo2" name="identificador" required>
                        <option selected disabled>Seleccione una opcion</option>
                        <option value="V">Venezolano</option>
                        <option value="E">Extranjero</option>
                        <option value="J">Juridico</option>
                        <option value="G">Gubernamental</option>

                      </select>
               
                    
                    <input type="text" class="form-control" id="campo3" name="rif" pattern="[0-9]{9,9}" maxlength="9" required>
                  </div>
                    <label for="campo4" class="col-form-label" >Lugar de Origen:</label>
                    <select class="form-control" id="campo4" name="lorigen" required>
                        <option selected disabled>Seleccione una opcion</option>
                        @foreach ($pais as $p)
                        <option value="{{$p->id}}" >{{$p->paisnombre}}</option>
                        @endforeach
                      </select>


                    <label for="campo4" class="col-form-label" >Lugar de registro:</label>
                    <select class="form-control" id="campo4" name="lregistro" required>
                        <option selected disabled>Seleccione una opcion</option>
                        @foreach ($pais as $p)
                        <option value="{{$p->id}}" >{{$p->paisnombre}}</option>
                        @endforeach
                      </select>
                    
                    
                        <label for="campo10" class="col-form-label">Direccion:</label>
                        <textarea class="form-control" id="campo10" name="direccion" placeholder="Direccion de Habitacion" minlength="4" maxlength="1000" required>
                        </textarea>

                         <label for="campo12" class="col-form-label">Telefono:</label>
                  <input type="text" class="form-control" id="campo12" name="telefono" pattern="[0-9]{10,20}" maxlength="20" required>

                   <label for="campo11" class="col-form-label">correo:</label>
                  <input type="text" class="form-control" id="campo11" name="correo" pattern="[A-Za-z0@-9áÁéÉíÍóÓúÚñÑ®©.' ']{10,100}" maxlength="100" required>
                  
                    <label for="fileInput" class="col-form-label">Foto de Perfil:</label>
                    <input type="file" class="form-control" name="foto" id="fileInput" accept="image/*">
                  </div>
                  <div id="preview" class="w-25"></div>
                        <div class="alert alert-danger" role="alert" id="fileError">
                            Por Favor Seleccione una imagen no mayor a 20 mb, de no tener el sistema pondra una predeterminada.
                        </div>
                  
              
            </div>
            <div class="modal-footer">
              <input type="submit" value="Registrar" id="submitBtn" class="btn btn-primary" disabled>
           
            </div>
          </form>
          </div>
      
        </div>
      </div>









</body>


<script>

     var campo10 = document.getElementById('campo10'); //direccion
campo10.innerHTML=''

  function validarCampos() {
      var campo1 = document.getElementById('campo1');
      var campo2 = document.getElementById('campo2');
      var campo3 = document.getElementById('campo3');
      var campo4 = document.getElementById('campo4');
      var campo4 = document.getElementById('campo11');
      var campo4 = document.getElementById('campo12');
      
    
      var fileInput = document.getElementById('fileInput');
      var submitBtn = document.getElementById('submitBtn');
      var valido = campo1.checkValidity() && campo10.checkValidity() && campo11.checkValidity() && campo12.checkValidity() && campo3.selectedIndex != 0  && campo4.selectedIndex != 0 && campo2.selectedIndex != 0 ;

      submitBtn.disabled = !valido;
  }

  document.getElementById('miFormulario').addEventListener('input', function(event) {
      var campo = event.target;
      if (campo.id === 'campo1') {
          campo.value = campo.value.replace(/[^A-Za-z0-9áÁéÉíÍóÓúÚñÑ®©.' ']/g, '');
      }
      
      if (campo.id === 'campo3') {
          campo.value = campo.value.replace(/[^0-9]/g, '');
      }
      if (campo.id === 'campo10') {
          campo.value = campo.value.replace(/[^A-Za-z0-9' ',.#áÁéÉíÍóÓúÚñÑ]/g, '');
      }
       if (campo.id === 'campo11') {
          campo.value = campo.value.replace(/[^A-Za-z0-9@' ',.#áÁéÉíÍóÓúÚñÑ]/g, '');
      }
       if (campo.id === 'campo12') {
          campo.value = campo.value.replace(/[^0-9]/g, '');
      }
     
      validarCampos();
  });

  document.getElementById('fileInput').addEventListener('change', function(event) {
      var files = event.target.files;
      var preview = document.getElementById('preview');
      var fileError = document.getElementById('fileError');
      preview.innerHTML = '';
      fileError.style.display = 'none';
      var validFiles = true;

      Array.from(files).forEach(file => {
          if (file.type.startsWith('image/')) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  var container = document.createElement('div');
                  container.classList.add('preview-container');
                  var img = document.createElement('img');
                  img.src = e.target.result;
                  img.addEventListener('click', function() {
                      img.classList.toggle('maximized');
                  });
                  var span = document.createElement('span');
                  span.textContent = file.name.length > 20 ? file.name.substring(0, 20) + '...' : file.name;
                  container.appendChild(img);
                  container.appendChild(span);
                  preview.appendChild(container);
              };
              reader.readAsDataURL(file);
          } else {
              validFiles = false;
          }
      });

      if (!validFiles) {
          fileError.style.display = 'block';
          event.target.value = '';
      }

      validarCampos();
  });

  document.getElementById('miFormulario').addEventListener('submit', function(event) {
      var campo1 = document.getElementById('campo1');
      var campo2 = document.getElementById('campo2');
      var valido = true;

      if (!campo1.checkValidity()) {
          campo1.classList.add('error');
          valido = false;
      } else {
          campo1.classList.remove('error');
      }

      if (!campo2.checkValidity()) {
          campo2.classList.add('error');
          valido = false;
      } else {
          campo2.classList.remove('error');
      }

      if (!valido) {
          event.preventDefault();
      }
  });



</script>

   
    @endsection