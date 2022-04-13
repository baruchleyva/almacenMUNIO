<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{env("APP_NAME")}}">
    <meta content="{{csrf_token()}}" name="csrf-token">
    <meta name="author" content="Parzibyte">
    <title>@yield("titulo")</title>
     <link rel="shortcut icon" type="image/png" href="../img/logots.png"/>
    <link href="{{url("/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{url("/css/all.min.css")}}" rel="stylesheet">
    <style>
        .fa-facebook {
  background: #3B5998;
  color: white;
}
        .navbar-custom{
                background-color: #ffffff;
            }

        body {
            padding-top: 70px;
            /*Para la barra inferior fija*/
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-custom fixed-top">
    <a class="navbar-brand" href="{{route('home')}}"><img src="/img/logots.png" style="width: 120px; height: 60px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            id="botonMenu" aria-label="Mostrar u ocultar menú">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav mr-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        Registro
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route("home")}}">Inicio&nbsp;<i class="fa fa-home"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("vender.index")}}">Vender&nbsp;<i class="fa fa-cart-plus"></i></a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link" href="{{route("clientes.index")}}">Clientes&nbsp;<i class="fa fa-users"></i></a>
                </li>              
                <li class="nav-item">
                    <a class="nav-link" href="{{route("productos.index")}}">Productos&nbsp;<i class="fa fa-box"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("compras.index")}}">Compras&nbsp;<i class="fa fa-shopping-bag"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("proveedors.index")}}">Proveedores&nbsp;<i class="fa fa-users"></i></a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link" href="{{route("ventas.index")}}">Reportes&nbsp;<i class="fa fa-list"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("usuarios.index")}}">Usuarios&nbsp;<i class="fa fa-user"></i></a>
                </li>
            @endguest
        </ul>
        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item">
                    <a href="{{route("logout")}}" class="nav-link">
                        Salir ({{ Auth::user()->name }})
                    </a>
                </li>
            @endauth
            <li class="nav-item">
                <a class="nav-link" href="{{route("soporte.index")}}">Soporte&nbsp;<i
                        class="fa fa-hands-helping"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://teamside.mx/" target="_blank">Sitio Web&nbsp;<i class="fa fa-info"></i></a>
            </li>
        </ul>
    </div>
</nav>
<script type="text/javascript">
    // Tomado de https://parzibyte.me/blog/2019/06/26/menu-responsivo-bootstrap-4-sin-dependencias/
    document.addEventListener("DOMContentLoaded", () => {
        const menu = document.querySelector("#menu"),
            botonMenu = document.querySelector("#botonMenu");
        if (menu) {
            botonMenu.addEventListener("click", () => menu.classList.toggle("show"));
        }
    });
</script>
<main class="container-fluid">
    @yield("contenido")
</main>
<footer class="px-2 py-3 fixed-bottom" align="right" style="background-color: #000000;">
    <span class="text-muted">Punto de venta Teamside Consulting
        &nbsp;|&nbsp;
    </span>
</footer>
</body>
</html>