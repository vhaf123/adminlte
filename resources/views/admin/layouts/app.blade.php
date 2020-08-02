<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Administrador | @yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/adminlte.css')}}">
        

        {{-- favicon --}}
        <link rel="icon" href="{{asset('img/layouts/favicon.ico')}}">

        @yield('style')

    </head>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
        
        <div class="wrapper">
            
            @include('admin.layouts.partials.nav')

            @include('admin.layouts.partials.sidebar')

            <div class="content-wrapper">

                <section class="content-header">

                    @yield('breadcrumbs')

                </section>

                @yield('jumbotron')


                <section class="content">

                
                    @yield('content')
                
                </section>
                
            </div>

            @include('admin.layouts.partials.footer')

        
        </div>

        <script src="{{asset('js/adminlte.js')}}"></script>

        <!-- overlayScrollbars -->
        <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

        @if (session('info'))
            <script>
                toastr.info("{{session('info')}}")
            </script>
        @endif


        @yield('script')

    </body>

</html>