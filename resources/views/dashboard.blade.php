@extends('layouts.panel')
   
@section('content')


 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


  <div class="container " style="position: absolute;margin: 1%;bottom: 1%;">
    <button id="cambiarColor" class="btn btn-primary" style="vertical-align:middle;text-align:center: center;aspect-ratio: 1;"> 
        <div id="Claro" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
  <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
</svg>
</div>
<div id="Oscuro" style="display: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16">
  <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/>
</svg>
</div>
</button>
  </div>
  

<script>
    const boton = document.getElementById('cambiarColor');
     const claro = document.getElementById('Claro');
      const oscuro = document.getElementById('Oscuro');
    const body = document.body;

    // Recuperar el color del localStorage al cargar la página
    let colorGuardado = localStorage.getItem('colorFondo');

       if(colorGuardado=='#212529')
       { claro.style.display='block';
oscuro.style.display='none';}
    else
    {oscuro.style.display='block';
claro.style.display='none';}

    // Inicializar el color si no está en el localStorage
    if (!colorGuardado) {
      colorGuardado = 'white'; // Por defecto, iniciamos con blanco
          if(colorGuardado=='#212529')
       { claro.style.display='block';
oscuro.style.display='none';}
    else
    {oscuro.style.display='block';
claro.style.display='none';}
    }

    body.style.backgroundColor = colorGuardado;
       if(colorGuardado=='#212529')
       { claro.style.display='block';
oscuro.style.display='none';}
    else
    {oscuro.style.display='block';
claro.style.display='none';}

    boton.addEventListener('click', () => {
      colorGuardado = colorGuardado === 'white' ? '#212529' : 'white';
      if(colorGuardado=='#212529')
       { claro.style.display='block';
oscuro.style.display='none';}
    else
    {oscuro.style.display='block';
claro.style.display='none';}
      body.style.backgroundColor = colorGuardado;
        if(colorGuardado=='#212529')
       { claro.style.display='block';
oscuro.style.display='none';}
    else
    {oscuro.style.display='block';
claro.style.display='none';}
      localStorage.setItem('colorFondo', colorGuardado);
          if(colorGuardado=='#212529')
       { claro.style.display='block';
oscuro.style.display='none';}
    else
    {oscuro.style.display='block';
claro.style.display='none';}
    });
  </script>
    @endsection
