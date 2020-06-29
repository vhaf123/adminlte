@extends('layouts.app')

@section('title')
    {{$post->name}}
@endsection

@section('style')
    <style>

        
      
        .portada{
            position: relative;
        }

        .fecha{
            position: absolute;
            right: 0;
            display: flex;
            align-items: center;
        }

        .numero{
            font-size: 36px;
            border-right: 1px solid white;
            
        }

        main{
            z-index: 800;

            position: relative;
            top: -80px;
        }

        main p{
            font-size: 16px;
            
        }

        .redes{
            display: flex;
        }

        .redes > a{
            height: 40px;
            width: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
@endsection

@section('content')

<section class="portada">
    <img src="{{asset($post->picture)}}" alt="">

    <div class="portada-text">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-9">

                    <div class="d-flex">
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

                                    <p class="lead mb-0 mr-3">
                                        <span class="badge badge-info">
                                            {{$tag->name}}
                                        </span>
                                    </p>


                                    @break
                                @default
                                    
                            @endswitch
                        @endforeach
                    </div>
                    
                    <hgroup>
                        <h1 class="display-4 text-white font-weight-bold">
                            {{$post->name}}
                        </h1>
                    </hgroup> 

                    <div class="media align-items-center">

                        <img class = "rounded-circle shadow-lg mr-3" src="{{asset($post->blogger->user->avatar)}}" alt="" width="40px">

                        <div class="media-body">
                            <p class="text-white mt-3">Escrito por {{$post->blogger->user->name}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-2 bg-dark shadow fecha text-white">

                   <div class="numero pr-3">
                        {{$post->created_at->format('d')}}
                   </div>

                   <div class="pl-3">
                        <span>{{$post->created_at->format('M')}}</span>
                        <br>
                        <span>{{$post->created_at->format('Y')}}</span>
                   </div>

                </div>
            </div>
        </div>
    </div>
        
    {{-- <div class="portada-text">
        
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-9 align-self-center">
                    
                    <h1 class="display-3 text-white font-weight-bold">
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

                                    <p class="lead mb-0 mr-3">
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
                            {{$post->created_at->toFormattedDateString()}}
                        </span>

                        
                    </div>

                    <div class="media align-items-center mt-5">

                        <img class = "rounded-circle shadow-lg mr-3" src="{{asset($post->blogger->user->avatar)}}" alt="" width="40px">

                        <div class="media-body">
                            <p class="text-white mt-3">Escrito por {{$post->blogger->user->name}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
    
</section>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-body pt-4">

                        <article class="">
                            {{-- <header>
                                <h1 class="text-center card-title">{{$post->name}}</h1>
                            </header> --}}
    
                            {!!$post->body!!}
                        </article>

                        <hr>

                        <div class="redes">
                            <a href="" class="btn-facebook rounded-circle">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="">
                                
                            </a>
                            <a href="">
                                
                            </a>
                            <a href="">
                                
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')
   
@endsection
