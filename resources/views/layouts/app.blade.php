<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    {{-- {{ config('app.name', 'Laravel') }} --}}
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="copyright" content="Coders Free" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @yield('meta')

    {{-- Open Graph --}}
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{request()->fullUrl()}}" />
    <meta property="og:site_name" content="CodersFree" />
    <meta property="og:image:width" content="828" />
    <meta property="og:image:height" content="450" />
    <meta property="fb:app_id" content="264847741428588" />

    

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">


    {{-- favicon --}}
    <link rel="icon" href="{{asset('img/layouts/favicon.ico')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('style')

</head>
<body>
    
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')

    @yield('content')

    @include('layouts.partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>

    @if (session('info'))
        <script>
            toastr.info("{{session('info')}}")
        </script>
    @endif

    @yield('script')
</body>
</html>
