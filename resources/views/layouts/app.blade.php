<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PROYECTO :: NE-II</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
           
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">Luxury Watches :: NE-II</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @else
                        @if (Auth::user()->role == 1)
                            <li><a href="{{url('admin')}}">Inicio</a></li>
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/registrarUsuarios') }}" target="_blank">Nuevo Usuario</a></li>
                                        <li><a href="{{ url('/consultarUsuarios') }}" target="_blank">Consultar Usuarios</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Articulos<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/registroArticulo')}}" target="_blank">Nuevo Articulo</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/consultarArticulo')}}" target="_blank">Inventario</a></li>
                                 <li><a href="{{ url('/articulos')}}" target="_blank">Enviar Promociones</a></li>
                                @else
                                <li><a href="{{ url('/') }}">Inicio</a></li>
                                <li><a href="{{ url('/mostarArticulo')}}" target="_blank">Articulos</a></li>
                                
                        @endif

                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="text-transform: uppercase;">
                                        {{ Auth::user()->name }}<b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('logout') }}"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Salir</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
    @yield('content')
  &nbsp;&nbsp;<br><br><br>
<hr>
  <!--information-starts-->
    <div class="information">
        <div class="container">
            <div class="infor-top">
                <div class="col-md-3 infor-left">
                    <h4>Siguenos</h4>
                    <ul>
                        <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                        <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                        <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                    </ul>
                </div>
                <div class="col-md-2 infor-left"> 
                    <h4>Contactanos</h4>
                    <h6>Telefono: +955 123 4567</h6>
                    <p>Email: <a href="mailto:example@email.com">contact@example.com</a></p>

                </div>
                <div class="col-md-2 infor-left">
                </div>
                <div class="col-md-2 infor-left">
                    <h4>Información de la pagina</h4>
                    <h6>La empresa Luxury Watches,
                        <span>es especialista en relojes,</span>
                        especial para cada persona.</h6>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--information-end-->
    <!--footer-starts-->
   
        <hr>
        <div class="content">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>&copy; 2017 ITC | Negocios Electronicos II </b> 
            <p class="pull-right"><a href="#">Regresar arriba</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>