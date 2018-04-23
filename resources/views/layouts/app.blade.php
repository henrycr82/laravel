<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <!-- instalamos todas las dependencias por consola "npm instal" y se crea automaticamente el folder node_modules, "laravel-mix" es una dependencia. NPM es como el composer de javascript. También compilamos las dependencias que descargamos con el siguiente comando "npm run dev"-->

     <!-- ahora los links para ccs y js queda asi: -->

     <!-- <link rel="stylesheet" href="/css/app.css" /> -->

     <!-- Ahora los estilos se ven un poco diferente, si queremos que se vea como estaba anteriormente podemos borrar el archivo _variables.scss, pero las variables que se encuentran en este archivo le dan una mejora significativa a los estilos de boostrap, por lo que se recomienda no borrarlos-->

     <!-- Las funciones que coloque en el archivo app.js las voy a tener dispon ibles en todos los archivos en donde instancie el mencionado fichero   -->

     <!-- con el comando "npm run watch" conpilo todos mis assets y una vez que compilo este se queda escuchando por si hay algun cambio en nuestros archivos y cuando detecta un cambio vuelve a compilar automaticamente-->
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <!-- Request::is() me permite saber si una ruta coincide con la ruta que le paso como parametro -->
            <!--<li class="{ Request::is('notes') ? 'active' : '' }"><a href="/notes">Notas <span class="sr-only">(current)</span></a></li>-->
            <li class="{{ Request::is('notes') ? 'active' : '' }} dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notas<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/notes">Ver</a></li>
                <li><a href="/notes/create">Crear</a></li>
              </ul>    
            </li>
            <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contacto</a></li>
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @guest
                  <li><a class="nav-link" href="{{ route('login') }}">{{ __('Inicio de Sesión') }}</a></li>
                  <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a></li>
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Cerrar Sesión') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
      <!-- aqui va el contenido de las vistas -->
      @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- incluimos nuestros javascript -->
    @yield('script')
    
    <!--  <script src="/js/app.js" ></script> -->
</body>
</html>