@extends('layouts.app')

@section('title')
    {{$manual->name}}
@endsection

@section('style')

    <style>

        /* .indice > li > h1{
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

        .subindice .activo:before{
            border: 3px solid #facf5a!important;
        }

        .subindice li:not(:first-of-type){
            margin: 10px 0;
        }

        .subindice li h2{
            padding-left: 38px;
            
        } */

   


    </style>
@endsection

@section('content')
{{-- <div id="app">

    <section class="py-4 mb-4 bg-oscuro">
        <div class="container">
            <h1 class="text-white">{{$manual->name}}</h1>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">@{{tema.name}}</h1>

                        <div v-html = "tema.body">
                        </div>
                        
                    </div>
                </div>


            </div>

            <aside class="col-12 col-md-4 px-lg-4 mb-4">
                @include('manuales.partials.indice')
            </aside>
        </div>
    </div>

</div> --}}

<div class="jumbotron jumbotron-fluid bg-info text-white">
    <div class="container">
      <h1 class="display-3">{{$manual->name}}</h1>
      <p class="lead">{{$manual->descripcion}}</p>
    </div>
</div>

<main>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="text-secondary h2 mb-0">
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
                                <h4>
                                    <a href="{{route('temas.show', [$manual, $tema])}}" class="text-decoration-none text-primary">{{$tema->name}}</a>
                                </h4>
                                <p class="lead">{{$tema->descripcion}}</p>
                            </div>
                        </li>

                    @endforeach
                </ul>

            </div>

            <div class="col-4">

                @if ($manual->picture)
                    <figure class="img-curso">
                        <img src="{{asset($manual->picture)}}" alt="" class="rounded">
                    </figure>
                @endif


            </div>
        </div>
    </div>
</main>





@endsection

@section('script')
{{-- <script>

    new Vue({
        el: '#app',
        data:{
            tema: "",
        },
        created(){
            this.getTema();
            
        },
        methods: {
            getTema() {

                axios
                .get("/api/temas/" + "{{$manual->capitulos[0]->temas[0]->id}}")
                .then(response => {
                    this.tema = response.data
                })
            },
            cambiarTema(id){
                axios
                .get("/api/temas/" + id)
                .then(response => {
                    this.tema = response.data;
                    $(".subindice > li").removeClass('activo');
                    $("#" + id).addClass('activo');
                })
            }
            
        }
    });
    
</script> --}}
@endsection