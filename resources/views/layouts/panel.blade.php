<!DOCTYPE html>
<html lang="en">


   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Sistema de Potenciales Inversionistas</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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



      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <style type="text/css">
      body{background-color: none;}
      th{text-align: center;}
    /* HTML: <div class="loader"></div> */
.loader {
  width: 20px;
  aspect-ratio: 1;
  border: 5px solid none;
  border-radius: 50%;
  position: relative;
  transform: rotate(220deg);
}
.loader::before {
  content: "";
  top: 100%;
  position: absolute;
  inset:-5px;
  border-radius: 50%;
  border: 5px solid #1a76b8;
  animation: l18 3s linear;
}
@keyframes l18 {
    0%   {clip-path:polygon(50% 50%,0 0,0    0,0    0   ,0    0   ,0    0   )}
    25%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 0   ,100% 0   ,100% 0   )}
    50%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,100% 100%,100% 100%)}
    75%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,0    100%,0    100%)}
    100% {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,0    100%,0    0   )}
}

.stronger{
 position: relative;}

.stronger:before{
    top: 100%;
position: absolute;
}
.preview{
   width: 100%;
   max-width: 100%;
}
.preview-container, .preview-container img{

   width: 100%;
   max-width: 100%;
}

   </style>
   
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="{{route('dashboard')}}"><img class="logo_icon img-responsive" src="assets/Img/Logo.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                   
                     <div class="user_profle_side">
                        <div class="user_img" style="  display: flex;
  align-items: center;
  justify-content: center;"><img class="img-responsive" style="aspect-ratio: 1"  src="{{session('usuario')->file}}" alt="#" /></div>
                        <div class="user_info">
                           <h6>{{session('usuario')->name}}</h6>
                           
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                    
                     <li><a href="{{route('search')}}"><i class="fa fa-search "></i> <span>Busqueda</span></a></li>
                     @if(session('usuario')->role >= 7)
                      <li><a href="{{route('users')}}"><i class="fa fa-users "></i> <span>Usuarios</span></a></li>
                      @endif
                      <li><a href="{{route('enterprises')}}"><i class="fa fa-building "></i> <span>Empresas</span></a></li>
                      <li><a href="{{route('delegates')}}"><i class="fa fa-user "></i> <span>Representantes</span></a></li>
                      <li><a href="{{route('sectores')}}"><i class="fa fa-cubes "></i> <span>Sectores</span></a></li>
                     @if(session('usuario')->role >= 8) <li><a href="{{route('logss')}}"><i class="fa fa-pie-chart "></i> <span>Registros</span></a></li>
                     
                     @endif
                      <li> @if (session('status'))


<div class="container w-100">
    <div id="alerta" class="alert alert-primary  fade show"  role="alert">
        {{ session('status') }}
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0"   
 aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>   

</div>

<script>
    window.onload = function() {
        var alerta = document.getElementById('alerta');
        var progressBar = document.querySelector('.progress-bar');
        var width = 0;

        var interval = setInterval(function() {
            width = width + 15;
            progressBar.style.width = width + '%';
            if (width >= 150) {
                clearInterval(interval);
                alerta.remove();
            }
        }, 200);
    };
</script>
@endif   </li>
 <div class="container " style="position: absolute;bottom: 1%;margin: 1%;left: 1%;text-align: left; vertical-align: middle">

    <button id="cambiarColor" class="btn btn-primary" style="vertical-align:middle;text-align:center: center;aspect-ratio: 1;border: solid 1px white;"> 
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
                    
               </div>
              
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="{{route('dashboard')}}"><img class="img-responsive" src="asset_original/logo-blanco-01.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                            
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-responsive rounded-circle" src="{{session('usuario')->file}}" style="aspect-ratio: 1"  alt="#" /><span class="name_user">{{session('usuario')->name}}</span></a>
                                    <div class="dropdown-menu ">
                                       <a class="dropdown-item" href="{{route('configurations')}}">Configuracion</a>
                                       <a class="dropdown-item" href="{{route('logout')}}"><span>Cerrar Sesion</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
<div style="height:100%;width:100%;background-color:none;margin: 0;padding: 0;">

                 @yield('content')
  

    @yield('usuarios')



</div>
 
              
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>

@if(session('status'))
      <script>
        $(document).ready(function() {
            $('.alert').fadeIn(100);
            $('.alert').delay(2800);

            // Start the progress bar animation
            $('.loader').animate({
               
            }, 5000, 'linear', function() {
                // Hide the alert after the animation completes
                $('.alert').fadeOut(250);
            });
        });
    </script>
    @endif
      <!-- owl carousel -->
      
      <!-- nice scrollbar -->
     
      
      <!-- custom js -->
      <script src="js/print.min.js"></script>
      <script src="js/custom.js"></script>
      
   </body>
</html>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


 
  

<script>
    const boton = document.getElementById('cambiarColor');
     const titulo = document.getElementsByClassName('page_title');
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