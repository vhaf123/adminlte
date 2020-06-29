@extends('layouts.app')

@section('title')
    {{$post->name}}
@endsection

@section('meta')

<meta property="og:title" content="{{$post->name}}" />
<meta property="og:description" content="{{$post->extracto}}" />
<meta property="og:image" content="{{asset($post->picture)}}" />


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

        .contenido{
            z-index: 800;
            position: relative;
            top: -40px;
        }

        .contenido p{
            font-size: 16px;
            line-height: 28px;
            
        }

        .redes{
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .redes > a{
            font-size: 32px;
            margin-left: 10px;
        }

        .social{
            position: fixed;
            left: 0;
            top: 200px;
            z-index: 200;
        }

        .social ul li{
            width: 50px;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .social ul li a{
            color: white;
            font-size: 24px;
        }

    </style>
@endsection

@section('content')

<div id="fb-root"></div>

<div class="social">
    <ul class="list-unstyled">
        <li class="bg-facebook">
            <a href="">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li class="bg-twitter">
            <a href="">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="bg-linkedin">
            <a href="">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </li>
        <li class="bg-whatsApp">
            <a href="">
                <i class="fab fa-whatsapp"></i>
            </a>
        </li>
        <li class="bg-pinterest">
            <a href="">
                <i class="fab fa-pinterest-p"></i>
            </a>
        </li>
    </ul>
</div>




<section class="portada-post">
    <img src="{{asset($post->picture)}}" alt="">

    <div class="portada-post-text">
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

                <div class="col-2 bg-dark shadow-lg fecha text-white rounded-left">

                   <div class="numero px-3">
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

</section>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 px-0 contenido">


                <div class="card shadow">
                    <div class="card-body pt-4">

                        <article class="">
                            {!!$post->body!!}
                            <hr>

                            <footer class="redes">

                                <p class="lead mb-0 font-weight-bold mr-2 text-secondary">Compartir: </p>
    
                                <a  href=""
                                    id="shareBtn"                                    
                                    title="Compartir en Facebook"
                                    class="text-facebook">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
    
                                <a href=""
                                    title="Compartir en Twitter"
                                    class="text-twitter">
                                    <i class="fab fa-twitter-square"></i>
                                </a>
    
                                <a href=""
                                    title="Compartir en Linkedin"
                                    class="text-linkedin">
                                    <i class="fab fa-linkedin"></i>
                                </a>
    
                                <a href=""
                                    title="Compartir en WhatsApp"
                                    class="text-whatsApp">
                                    <i class="fab fa-whatsapp-square"></i>
                                </a>
                            </footer>



                        </article>

                        

                        

                    </div>
                </div>
            </div>

            <aside class="col-12 col-lg-4 pt-5">
                <div class="fb-page" data-href="https://www.facebook.com/codersfree/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/codersfree/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/codersfree/">Coders Free</a></blockquote></div>
            </aside>
        </div>
    </div>
</main>

@endsection

@section('script')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0&appId=264847741428588&autoLogAppEvents=1" nonce="hnF0HBgN"></script>

    <script>
        document.getElementById('shareBtn').onclick = function() {
          FB.ui({
            display: 'popup',
            method: 'share',
            href: '{{request()->fullUrl()}}',
          }, function(response){});
        }
    </script>

@endsection
