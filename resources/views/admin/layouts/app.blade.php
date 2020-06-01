<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Administrador | @yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.css')}}">

        <!-- Toastr -->
        <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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
        

        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- overlayScrollbars -->
        <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

        <!-- AdminLTE App -->
        <script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>

        <script src="{{asset('plugins/vue/vue.min.js')}}"></script>
        <script src="{{asset('plugins/vue/axios.min.js')}}"></script>
        <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>

        <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>


        <script>

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });


            
        </script>

        @if (session('info'))
            <script>
                toastr.info("{{session('info')}}")
            </script>
        @endif

        {{-- @if (session('info'))
            <script>
                Toast.fire({
                icon: 'success',
                title: "{{session('info')}}"
                });
            </script>
        @endif --}}


        @yield('script')

    </body>

</html>