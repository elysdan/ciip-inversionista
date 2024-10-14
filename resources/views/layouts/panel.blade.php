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
                     @if(session('usuario')->role > 2)
                      <li><a href="{{route('users')}}"><i class="fa fa-users "></i> <span>Usuarios</span></a></li>
                      <li><a href="{{route('enterprises')}}"><i class="fa fa-building "></i> <span>Empresas</span></a></li>
                      <li><a href="{{route('delegates')}}"><i class="fa fa-user "></i> <span>Representantes</span></a></li>
                     @if(session('usuario')->role > 8) <li><a href="{{route('stadistics')}}"><i class="fa fa-pie-chart "></i> <span>Estadisticas</span></a></li>
                     @endif
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
