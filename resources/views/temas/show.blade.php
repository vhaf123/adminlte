@extends('layouts.app')

@section('title')
    {{$manual->name}}
@endsection

@section('style')

{{-- <link rel="stylesheet"
      href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.1.1/build/styles/default.min.css"> --}}
    <link rel="stylesheet" href="{{asset('plugins/highlight/styles/agate.css')}}">
{{-- <link rel="stylesheet" href="{{asset('plugins/highlight/styles/monokai-sublime.css')}}"> --}}

    <style>

        .indice > li > h1{
            padding-left: 38px;
        }

        .subindice{
            position: relative;
            list-style-type: none;
            padding-left: 0;
        }

        .subindice:before{
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            top: 0;
            left: 9px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        .subindice li{
            position: relative;
        }

        .subindice li:before{
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 50%;
            border: 3px solid #3598FF;
            width: 20px;
            height: 20px;
            z-index: 400;
        }

        .subindice .active:before{
            border: 3px solid #facf5a!important;
        }

        .subindice li:not(:first-of-type){
            margin: 10px 0;
        }

        .subindice li h2{
            padding-left: 38px;
            
        }

        .principal p, .principal li{
            color: #636b6f;
        }

        .fa-angle-left, .fa-angle-right{
            font-size: 24px;
        } 

    </style>
    
@endsection

@section('content')

<div class="jumbotron jumbotron-fluid bg-info text-white">
    <div class="container">
      <h1 class="display-4">{{$manual->name}}</h1>
      <p class="lead">{{$manual->descripcion}}</p>
    </div>
</div>

<div class="container mb-5">
    <div class="row">

        <aside class="col-12 col-lg-4 px-lg-4 mb-4 order-lg-2">

            <div class="card shadow">

                <div class="card-body">

                    <ul class="list-unstyled indice">
            
                        @foreach ($manual->capitulos as $capitulo)
                            <li>
                                <h1 class="h6 font-weight-bold">{{$capitulo->name}}</h1>
            
                                <ul class="subindice">
                                    
            
                                    @foreach ($capitulo->temas as $tema)

                                        <li @if (Request::url() == route('temas.show', [$manual, $tema])) class="active" @endif>
                                            <h2 class = "h6">
                                                <a href="{{route('temas.show', [$manual, $tema])}}" class="text-secondary text-decoration-none" v-on:click.prevent = "cambiarTema({{$tema->id}})">
                                                    {{$tema->name}}
                                                </a>
                                            </h2>
                                        </li>
                                        
                                    @endforeach
                                    
                                </ul>
            
                            </li>
            
                            
                        @endforeach
                    </ul>
            
                </div>
            </div>

        </aside>

        <div class="col-12 col-lg-8">
            <div class="card">

                <header class="card-header">
                    <h1 class="text-center text-secondary">{{$actual->name}}</h1>
                </header>

                <article class="card-body principal">
                                
                    {!!$actual->body!!}

                </article>
            </div>

            <div class="card mt-3">
                <div class="card-body row justify-content-between align-items-center">
                    

                    @if ($actual->previous)
                        <a href="{{route('temas.show', [$manual, $actual->previous])}}" class="d-flex align-items-center text-decoration-none col-6 text-info">
                            <i class="fas fa-angle-left mr-2"></i>
                            {{$actual->previous->name}}
                        </a>
                    @else
                        <div class="col-6"></div>
                    @endif

                    @if ($actual->next)
                        <a href="{{route('temas.show', [$manual, $actual->next])}}" class="d-flex align-items-center justify-content-end text-decoration-none col-6 text-info">
                            {{$actual->next->name}}
                            <i class="fas fa-angle-right ml-2"></i>
                        </a>
                    @endif
                </div>
            </div>

        </div>
        
    </div>
</div>

@endsection

@section('script')
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.1.1/build/highlight.min.js"></script>
    
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection