<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AlmacenMUNI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style3.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg" style="background-color: #540013;">

            <ul class="nav navbar-nav ml-auto" style="background-color: #540013;">
                <!-- Authentication Links -->
                <a href="{{ url('/') }}" style="color: white;">

                    INICIO
                </a>
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block" style="background-color:  ; float: right;" >
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: white;">Inicio</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" style="color: white;">Entrar </a>
                        <!--@ if (Route::has('register'))
                            <a href="{ { route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline" style="color: white;">Registrarse</a>
                        @ endif-->
                    @endauth
                </div>
                @endif
            </ul>
        </nav>
        <div align="center">
            <img src="{{asset('images/almacen.png')}}" width="50%" height="50%">
        </div>

    </body>
</html>
