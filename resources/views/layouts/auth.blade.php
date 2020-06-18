<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CodersFree | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .header_principal{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
        }

        main{
            position: relative;
            top: 60px;
            padding-bottom: 50px;
        }

        .auth{
            display: flex;
            justify-content: center;
        }

        .footer_principal{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            z-index: 100;
        }

    </style>


    @yield('style')

</head>
<body>

    <header class="header_principal bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <div class="cabecera col">
                    
                    {{-- Logotipo --}}
                    <a class="navbar-brand text-secondary d-flex align-items-center" href="{{ url('/') }}">
                        <img src="{{asset('img/layouts/logo.png')}}" alt="" height="24px">
                        <span class="font-weight-bold ml-1">Coders</span>Free
                    </a>
    
                    {{-- Botones de acción --}}
                    <div>
   
                        {{-- Botones de login --}}
                        <a href="{{ route('login') }}" class="btn btn-outline-dark font-weight-bold">
                            Iniciar sesión
                        </a>
            
                        <a href="{{ route('register') }}" class="btn btn-danger font-weight-bold ml-2">
                            Registrarse
                        </a>
                        
    
                    </div>
    
                </div>
            </div>
        </div>
    
    </header>
    

    <main class="my-5 my-lg-4 auth">
        
        @yield('content')
        
    </main>
    
    
    @include('layouts.partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>
</html>
