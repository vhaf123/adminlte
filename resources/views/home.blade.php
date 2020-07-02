@extends('layouts.app')

@section('title', 'Los mejores cursos de programación gratis | Coders Free')

@section('meta')
    
    <meta name="description" content="En Coders Free encontrarás los mejores cursos de programación gratis en español. Nuestro objetivo es convertirnos en la comunidad de programadores más gramde de latinoametica."/>
    <meta name="keywords" content="Cursos de programación, cursos de programación gratis,  cursos de desarrollo web, cursos de desarrollo web gratis, codersfree, coders free"/>
    <meta name="author" content="Victor Arana" />

    <meta property="og:title" content="Cursos de programación gratis | Coders Free" />
    <meta property="og:description" content="En Coders Free encontrarás los mejores cursos de programación gratis en español. Nuestro objetivo es crear una gran comunidad de programadores." />
    <meta property="og:image" content="https://codersfree.com/img/home/computer-767776_1280.jpg" />

@endsection

@section('style')
    <style>
        .bg-degradado i{
            font-size: 32px;
        }
    </style>
@endsection

@section('content')

    {{-- Portada --}}
    <section class="portada">
        <img src="{{asset('img/home/computer-767776_1280.jpg')}}" alt="Portada">

        <div class="portada-text">
            
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-7 align-self-center">
                        <h1 class=" text-white font-weight-bold">
                            Los mejores cursos de programación gratis en español
                        </h1>

                        <p class="text-white lead">
                            Nuestro objetivo es convertirnos en la comunidad de programadores más gramde de latinoametica.
                        </p>

                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" id= "search" placeholder="¿Qué quieres aprender?" aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="button">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Degradado --}}
    <section class="bg-degradado mb-5 py-4 d-none d-md-block">
        <div class="container">
            <div class="row text-white">
                <div class="col-4">
                    <div class="media">
                        <i class="fas fa-laptop-code mr-4 mt-1 d-sm-none d-lg-block"></i>
                        <div class="media-body">
                            <h5 class="mb-0">Cursos online</h5>
                            Cursos de programación gratis
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="media">
                        <i class="fas fa-chalkboard-teacher mr-4 mt-1 d-sm-none d-lg-block"></i>
                        {{-- <i class="fas fa-broadcast-tower mr-4 mt-1 d-sm-none d-lg-block"></i> --}}
                        <div class="media-body">
                            <h5 class="mb-0">Manueles online</h5>
                            Actualizados constantemente
                        </div>
                    </div>
                </div>


                <div class="col-4">
                    <div class="media">
                        <i class="fas fa-blog mr-4 mt-1 d-sm-none d-lg-block"></i>
                        <div class="media-body">
                            <h5 class="mb-0">Articulos</h5>
                            Nuevos post todos los días
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- contenido --}}
    <section class="contenido pt-5 text-secondary">
                
        <h1 class="text-center mb-4 h2">CONTENIDO</h1>

        <div class="container">

            <div class="row">

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">

                    <div class="card-img">
                        <img src="{{asset('img/home/work4-460x263.jpg')}}" alt="">
                    </div>

                    <h4 class="text-center mt-3">Cursos online</h4>
                    <p>Encuentra una gran variedad de cursos de programación gratis. Consulta el catalogo completo de cursos <a href="{{route('cursos.index')}}" class="text-warning">aquí</a>.</p>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                    
                    <div class="card-img">
                        <img src="{{asset('img/home/work1-460x263.jpg')}}" alt="">
                    </div>

                    <h4 class="text-center mt-3">Manuales</h4>
                    <p>Contamos con varios manuales actualizados constantemente. Consulta el catalogo completo <a href="{{route('manuales.index')}}" class="text-warning">aquí</a>.</p>
                </div>
                
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                    
                    <div class="card-img">
                        <img src="{{asset('img/home/work2-460x263.jpg')}}" alt="">
                    </div>

                    <h4 class="text-center mt-3">Diseño web</h4>
                    <p>¿Quieres que diseñemos tu página web por ti?. Ponte en contacto con nosotros y te ayudaremos. <a href="{{route('contactanos.index')}}" class="text-warning">Contáctanos</a>.</p>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                    
                    <div class="card-img">
                        <img src="{{asset('img/home/work3-460x263.jpg')}}" alt="">
                    </div>

                    <h4 class="text-center mt-3">Blog</h4>
                    <p>Escribimos articulos de programación e informática todos los días. Dirigete al blog haciendo click <a href="{{route('blog.index')}}" class="text-warning">aquí</a>.</p>
                </div>
                
            </div>
        </div>

    </section>

    {{-- Ayuda --}}
    <section class="ayuda my-5 bg-oscuro">
            
        <div class="container d-flex">

            <div class="col-12 py-5">
                <h2 class="text-white text-center"><strong>¿No sabes por donde empezar?</strong></h2>
                <p class="text-white text-center">Responde unas cuantas preguntas y nosotros te ayudamos en el proceso</p>

                <div class="d-flex justify-content-center">
                    <button class="btn btn-danger">Inicia ahora</button>
                </div>
            </div>

        </div>

    </section>

    {{-- Cursos --}}
    <section class="cursos pt-5">
        <div class="container">
            <div class="row">
                <div class="col">

                    <h1 class="h2 text-center mb-0 text-secondary">ALGUNO DE LOS CURSOS</h1>
                    <p class="text-center mb-4">Trabajo duro para seguir subiendo cursos</p>

                    <div class="row">
                        @foreach ($cursos as $curso)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                @include('cursos.partials.card-curso')
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- Ventajas --}}
    <section class="ventajas my-5 pt-5 bg-gris text-secondary">
        <h1 class="text-center h2 mb-4">VENTAJAS</h1>

        <div class="container">
            <div class="row">
                
                <div class="col-12 col-sm-6 col-md-4 mb-5">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            
                            <i class="fas fa-chart-pie text-info d-block text-center mb-2" style="font-size:32px"></i>

                            <h5 class="mt-0 text-center">A tu propio ritmo</h5>
                            Disfruta de acceso de por vida a cursos en el sitio web y la aplicación de AdminLTE
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-chart-pie text-info d-block text-center mb-2" style="font-size:32px"></i>
                            <h5 class="mt-0 text-center">A tu propio ritmo</h5>
                            Escoge entre los mejores instructores del mundo.
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-chart-pie text-info d-block text-center mb-2" style="font-size:32px"></i>
                            <h5 class="mt-0 text-center">A tu propio ritmo</h5>
                            Crea una biblioteca para tu carrera y crecimiento personal
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Nuevo contenido --}}
    <section class="nuevo_contenido py-5">
                

        <div class="container-fluid bg-oscuro">
            <div class="row">
                <div class="col-12 col-lg-6 px-0">
                    <img src="{{asset('img/home/stripeimg.jpg')}}" alt="Card image cap" style="width:100%">
                </div>

                <div class="col-12 col-lg-6  py-5 py-lg-0 align-self-center">

                    <h2 class="text-center text-white">
                        Contenido nuevo todos los días
                    </h2>

                    <p class="text-center text-white">
                        La formación online es el presente
                    </p>

                    <div class="d-flex">
                        <div class="mx-auto">
                            <div class="bg-danger mb-5" style="height:2px; width:110px"></div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div class="border border-white py-2">
                                <h1 class="text-white text-center mb-1">{{$cursos_publicados}}</h1>
                                <p class="text-white text-center m-0">Cursos subidos</p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div class="border border-white py-2">
                                <h1 class="text-white text-center mb-1">{{$manuales_publicados}}</h1>
                                <p class="text-white text-center m-0">Manuales</p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="border border-white py-2">
                                <h1 class="text-white text-center mb-1">{{$posts_publicados}}</h1>
                                <p class="text-white text-center m-0">Artículos</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    {{-- informacion --}}
    <section class="informacion mt-5 pb-5 text-secondary">

        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-12 col-md-6 col-lg-7">
                    <h2 class="text-center text-md-left">¿Qué es CodersFree?</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab quasi totam veniam magni id. Reprehenderit porro rem pariatur. Maxime veritatis molestiae dolores omnis qui eaque ipsam officia ullam quae voluptas?</p>
                </div>

                <div class="col-8 col-md-6 col-lg-4 col-xl-3 offset-lg-1 mt-5">
                    <img class="img-fluid" src="{{asset('img/home/Recurso 2.png')}}" alt="">
                </div>
                
            </div>
        </div>

    </section> 

@endsection