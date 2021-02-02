<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <script src="https://kit.fontawesome.com/f0f2121b70.js" crossorigin="anonymous"></script>
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

  <meta name="theme-color" content="#fafafa">
</head>

<body>

    <div class="navegacion-principal">
        <nav>
        <a href="{{route('alumnos.index')}}">Crea tu cuenta</a>
        <a href="{{route('maestros.index')}}">Registra Maestro</a>
        <a href="/">Inicio</a>
        <a href="{{route('maestros.loginView')}}">Inicia Sesion(Maestro)</a>
        <a href="{{route('alumnos.loginView')}}">Inicia Sesion</a>
        {{-- <a href="{{route('pacientes.edit',1)}}">Haz tu cita</a>
         --}}
        </nav>
    </div> 
@yield('content')
    <footer class="footer-principal">
        <div class="seccion">
          <p>itc@edu.mx.com</p>
          <p style="font-size: 20px">Instituto Tecnológico de Cancún</p>
          <nav>
            <a href="https://www.facebook.com/TECNMcampusCancun"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </nav>
        </div>
      </footer>
      
        <script src="js/vendor/modernizr-3.11.2.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="js/jquery.lettering.js"></script>
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
         integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
         crossorigin=""></script>
        <script src="js/main.js"></script>
      
        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
          window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
          ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async></script>
        
      </body>
      
      </html>