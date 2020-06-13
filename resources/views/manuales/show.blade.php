@extends('layouts.app')

@section('title')
    {{$manual->name}}
@endsection


@section('content')

<div class="jumbotron jumbotron-fluid bg-info text-white">
    <div class="container">
      <h1 class="display-4">{{$manual->name}}</h1>
      <p class="lead">{{$manual->descripcion}}</p>
    </div>
</div>

<main>
    <div class="container">
        <div class="row">
            

            <div class="col-12 col-lg-4 order-lg-2">
                @if ($manual->picture)
                    <figure class="img-curso">
                        <img src="{{asset($manual->picture)}}" alt="" class="rounded">
                    </figure>
                @endif

            </div>

            <div class="col-12 col-lg-8">
                <h1 class="text-secondary mb-0">
                    Contenido del manual
                </h1>

                <hr>

                <ul class="list-unstyled">
                    @foreach ($manual->temas as $tema)
                    
                        <li class="media">

                            <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center text-white mr-2" style="height: 30px; width: 30px; font-size:20px;">
                                {{$loop->index+1}}
                                
                            </div>

                            <div class="media-body">
                                <h2 class="h4">
                                    <a href="{{route('temas.show', [$manual, $tema])}}" class="text-decoration-none text-primary">{{$tema->name}}</a>
                                </h2>
                                <p class="lead">{{$tema->descripcion}}</p>
                            </div>
                        </li>

                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</main>

@endsection