@extends('layouts.app')

@section('title', 'Recursos')

@section('style')
    <style>
        .footer_principal{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        body{
            background-color: #233142;
        }
    </style>
@endsection

@section('content')
<main class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5 pt-5">
                
                <div class="card bg-dark text-white shadow mb-3">
                    <div class="card-body py-4">
                        {{-- <h1 class="text-center h4 mb-4">{{$video->name}}</h1> --}}

                        <p class="lead text-center text-white mb-4">Archivos base</p>

                        <a href="{{route('recursos.download', $video)}}" class="btn btn-danger btn-block">
                            Descargar archivo
                        </a>

                    </div>
                </div>
                <h2 class="h5 text-white">{{$video->modulo->curso->name}}</h2>
                <hr class="bg-white">
                <p class="text-white mb-1">Módulo: {{$video->modulo->name}}</p>
                <p class="text-white">Capítulo: {{$video->name}}</p>
            </div>
        </div>
    </div>
</main>

@endsection