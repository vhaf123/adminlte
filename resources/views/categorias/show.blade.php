@extends('layouts.app')

@section('title')Cursos de {{strtolower($categoria->name)}} gratis @endsection

@section('meta')
<meta name="description" content="{{$categoria->descripcion}}"/>
@endsection

@section('style')
    <style>
        .filtro{
            background-color: #F0F0F1;
        }

        .filtro .nav-item > a{
            background-color: white;
            margin-right: 10px;
            color: #636b6f;
        }

        .filtro i{
            margin-right: 5px;
        }
    </style>
@endsection

@section('content')
    
    <section class="portada">
        <img src="{{asset($categoria->picture)}}" alt="">

        <div class="portada-text">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-7 align-self-center">
                        <h1 class="text-white font-weight-bold">
                            Los mejores cursos de {{strtolower($categoria->name)}} gratis
                        </h1>

                        <p class="text-white lead">
                            Accede a todos los cursos de programación de Coders Free ¡GRATIS!
                        </p>

                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control"  id= "search" placeholder="¿Qué quieres aprender?" aria-label="" aria-describedby="basic-addon1">
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

    <section class="filtro shadow-sm d-none d-md-block">

        <div class="container">

            <div class="row">
                <nav class="col">
                    
                    <ul class="nav nav-pills py-3">

                        {{-- Todos los cursos --}}
                        <li class="nav-item mb-2 mb-lg-0">
                            <a href="{{route('cursos.index')}}" class="nav-link shadow-sm">
                                <i class="fas fa-layer-group"></i>
                                Todos los cursos
                            </a>
                        </li>

                        {{-- Categorias --}}
                        <li class="nav-item dropdown mb-2 mb-lg-0">
                            <a class="nav-link dropdown-toggle dropdown-toggle shadow-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tags"></i>
                                Categoría
                            </a>

                            <div class="dropdown-menu">

                                @foreach ($categorias as $categoria)
                                    <a class="dropdown-item @if (Request::url() == route('categorias.show', $categoria->slug)) active @endif" href="{{route('categorias.show', $categoria->slug)}}">{{$categoria->name}}</a>

                                    {{-- <a class="dropdown-item" href="{{route('cursos.index').'?categoria_id='.$categoria->id}}">{{$categoria->name}}</a>     --}}
                                @endforeach
                                
                            </div>
                        </li>

                        {{-- Nivel --}}
                        <li class="nav-item dropdown mb-2 mb-lg-0">
                            <a class="nav-link dropdown-toggle dropdown-toggle shadow-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-glasses"></i>
                                Nivel
                            </a>

                            <div class="dropdown-menu">

                                @foreach ($niveles as $nivel)
                                    <a class="dropdown-item" href="{{route('cursos.index').'?nivel_id='.$nivel->id}}">{{$nivel->name}}</a>
                                @endforeach
                                
                            </div>
                        </li>

                        {{-- Estado --}}
                        <li class="nav-item dropdown mb-2 mb-lg-0">
                            <a class="nav-link dropdown-toggle dropdown-toggle shadow-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cogs"></i>
                                Estado    
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('cursos.index').'?status=2'}}">En elaboración</a>
                                <a class="dropdown-item" href="{{route('cursos.index').'?status=3'}}">Culminado</a>
                                
                            </div>
                        </li>

                        {{-- Tipo --}}
                        <li class="nav-item dropdown mb-2 mb-lg-0">
                            <a class="nav-link dropdown-toggle dropdown-toggle shadow-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-thumbtack"></i>
                                Tipo
                            </a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('cursos.index').'?tipo_id=2'}}">Cursos premium</a>
                                <a class="dropdown-item" href="{{route('cursos.index').'?tipo_id=1'}}">Cursos gratis</a>
                            </div>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>
    </section>

    <main class="my-5">

        <div class="container">
            
            <h1 class="h2 mb-3 d-md-none text-secondary">Lista de cursos</h1>
            <div class="row">

                @forelse ($cursos as $curso)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">

                        @include('cursos.partials.card-curso')

                    </div>
                @empty
                    
                    <h2 class="h3 mb-3">Actualmente no se ha subido ningún curso en esta categoría</h2>

                @endforelse
               
                    
            </div>

            {{$cursos->links()}}
        </div>

    </main>

@endsection