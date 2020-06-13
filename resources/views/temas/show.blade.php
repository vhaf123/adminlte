@extends('layouts.app')

@section('title')
    {{$manual->name}}
@endsection

@section('style')

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

   


    </style>
    
@endsection

@section('content')

<div class="jumbotron jumbotron-fluid bg-info text-white">
    <div class="container">
      <h1 class="display-4">{{$manual->name}}</h1>
      <p class="lead">{{$manual->descripcion}}</p>
    </div>
</div>

    <div class="container">
        <div class="row">

            <aside class="col-12 col-md-4 px-lg-4 mb-4">

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

            <div class="col-12 col-md-8">
                
                <div class="card">
                    <div class="card-body">

                        <h1>{{$actual->name}}</h1>
                        
                        {!!$actual->body!!}
                        
                    </div>
                </div>

            </div>

            
        </div>
    </div>

@endsection

