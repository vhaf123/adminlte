@extends('layouts.app')

@section('title')
    {{$post->name}}
@endsection

@section('style')
    <style>

        main{

            z-index: 800;

            position: relative;
            top: -80px;
        }

      
    </style>
@endsection

@section('content')

<section class="portada">
    <img src="{{asset($post->picture)}}" alt="">
        
    <div class="portada-text">
        
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-7 align-self-center">
                    
                    <h1 class="text-white font-weight-bold">
                        {{$post->name}}
                    </h1>

                    <p class="text-white">
                        {{$post->extracto}}
                    </p>

                    <div class="d-flex align-items-center">

                        @foreach ($post->tags as $tag)
                            @switch($tag->id)
                                @case(1)
                                    
                                    <p class="lead mb-0 mr-3">
                                        <span class="badge badge-primary">
                                            {{$tag->name}}
                                        </span>
                                    </p>

                                    @break
                                @case(2)

                                    <p class="lead mb-0 mr-3">
                                        <span class="badge badge-success">
                                            {{$tag->name}}
                                        </span>
                                    </p>

                                    @break
                                @case(3)

                                    <p class="lead mb-0 mr-3">
                                        <span class="badge badge-danger">
                                            {{$tag->name}}
                                        </span>
                                    </p>

                                    @break

                                @case(4)

                                    <p class="lead mb-0 mr-3">
                                        <span class="badge badge-warning">
                                            {{$tag->name}}
                                        </span>
                                    </p>

                                    @break

                                @case(5)

                                    <p class="lead d-inline mr-2">
                                        <span class="badge badge-info">
                                            {{$tag->name}}
                                        </span>
                                    </p>

                                    @break
                                @default
                                    
                            @endswitch
                        @endforeach

                        <span class="text-white">
                            <i class="far fa-calendar-alt mr-1"></i>
                            01 may. 2020
                        </span>

                        
                    </div>

                    <div class="media align-items-center mt-5">

                        <img class = "rounded-circle shadow-lg mr-3" src="{{asset($post->blogger->user->picture)}}" alt="" width="40px">

                        <div class="media-body">
                            <p class="text-white mt-3">Escrito por {{$post->blogger->user->name}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</section>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body px-5 pt-5">

                        <h1 class="h2 text-center card-title">{{$post->name}}</h1>

                        {!!$post->body!!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')
   
@endsection
