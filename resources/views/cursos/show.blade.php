@extends('layouts.app')

@section('title')
    {{$curso->name}}
@endsection

@section('style')
    <style>
        .modulos h1 a{
            display: block;
            color: #636b6f;
            text-decoration: none;
        }

        .estrellas li{
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <section class="bg-oscuro mb-4">
        @include('cursos.partials.jumbotron')
    </section>

    <main>
        <div class="container">
            <div class="row">

                <div class="col-12 mb-4 col-lg-4 order-lg-2">

                    <section>
                        @include('cursos.partials.matricula')
                    </section>
    
                    <section class="mt-4">
                        @include('cursos.partials.requisitos')
                    </section>
                    
                </div>

                <div class="col-12 col-lg-8">

                    <section class="mb-4">
                        @include('cursos.partials.metas')
                    </section>
    
                    <section class="mb-5">
                        @include('cursos.partials.temario')
                    </section>

                    <section>
                        @include('cursos.partials.reviews')
                    </section>

                </div>

                
            </div>
        </div>
    </main>
@endsection

@section('script')
<script>

    $('.estrellas li').click(function(){
        var rating = $(this).data('number');

        $('#rating').val(rating);

        $('.estrellas li').each(function(){
            if($(this).data('number') > rating){
                $(this).children('i').removeClass('text-warning');
            }else{
                $(this).children('i').addClass('text-warning');
            }
        });
        
    });
   
</script>
@endsection