@extends('layouts.app')

@section('title')
    {{$post->name}}
@endsection

@section('meta')

    <meta name="description" content="{{$post->extracto}}"/>
    <meta name="keywords" content="www.codersfree.com, codersfree, coders free, coders, free, {{$post->keywords}}"/>
    <meta name="author" content="{{$post->blogger->user->name}}" />

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

        @media (max-width: 767px){
            .social{
                position: fixed;
                left: 0;
                bottom: 0px;
                z-index: 1000;
                width: 100%;
            }

            .social ul{
                display: flex;
                margin-bottom: 0!important;
            }

            .social ul li{
                width: 100%;
            }
            
            .social ul li a{
                display: block;
                
                text-align: center;
                padding-top: 5px;
                padding-bottom: 5px;
                color: white;
                font-size: 16px;
            }
        }

        @media (min-width: 768px){
            .social{
                position: fixed;
                left: 0;
                top: 200px;
                z-index: 1000;
            }

            .social ul li a{
                text-align: center;
                padding-top: 5px;
                padding-bottom: 5px;
                display: block;
                color: white;
                font-size: 20px;
                width: 50px;
            }
        }

        .fan-page{
            text-align: center;
        }

    </style>
@endsection

@section('content')

<div id="fb-root"></div>

@include('blog.partials.social-bar')

<section class="portada-post">
    <img src="{{asset($post->picture)}}" alt="">

    <div class="portada-post-text">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-9">

                    @include('blog.partials.categorias-post')
                    
                    <hgroup>
                        <h1 class="text-white font-weight-bold">
                            {{$post->name}}
                        </h1>
                    </hgroup>

                    <p class="text-white d-none d-lg-block">{{$post->extracto}}</p>

                    <div class="media align-items-center">

                        <img class = "rounded-circle shadow-lg mr-3" src="{{asset($post->blogger->user->avatar)}}" alt="" width="40px">

                        <div class="media-body">
                            <p class="text-white mt-3">Escrito por {{$post->blogger->user->name}}</p>

                        </div>
                    </div>
                </div>

                <div class="col-2 bg-secondary shadow-lg fecha text-white rounded-left d-none d-lg-flex">

                   <div class="numero px-3">
                        {{$post->created_at->format('d')}}
                   </div>

                   <div class="pl-3">
                        <b class="">{{$post->created_at->format('M')}}</b>
                        <br>
                        <b class="">{{$post->created_at->format('Y')}}</b>
                   </div>

                </div>
            </div>
        </div>
    </div>

</section>

<main>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 px-lg-0 contenido">

                <div class="card shadow-lg">
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

            <aside class="col-12 col-lg-4 pt-lg-4 mb-5 fan-page">
                <div class="fb-page w-100" data-href="https://www.facebook.com/codersfree/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/codersfree/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/codersfree/">Coders Free</a></blockquote></div>
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
