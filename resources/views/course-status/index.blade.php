@extends('layouts.app')

@section('title', 'Course-Status')

@section('style')
    <style>

        .subindice{
            position: relative;
            list-style-type: none;
            padding-left: 0;
            cursor: pointer;
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

        .subindice li:not(:first-of-type){
            margin: 15px 0;
        }
        
        

        .subindice li:before{
            content: ' ';
            display: inline-block;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 50%;
            background: #7F8588;
            border: 3px solid #7F8588;
            width: 20px;
            height: 20px;
            z-index: 400;
        }

        .subindice li.cursado:before{
            border: 3px solid #facf5a;
            background: #facf5a;
        }

        .subindice li.actual:before{
            background-color: white;
        }


        .subindice li h3{
            padding-left: 30px;
        }

    </style>
@endsection


@section('content')
<div id="app">
    <div class="container mt-4">
        <div class="row">

            <div class="col-12 col-lg-8">
                <main class="video">
                    @include('course-status.partials.video')
                </main>
            </div>

            <aside class="col-12 col-lg-4 px-lg-4 indice">
                @include('course-status.partials.indice')
            </aside>

        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    
    var urlAvance = "{{route('course-status.avance', $curso)}}";
    var urlActual = "{{route('course-status.actual', $curso)}}";
    var urlCursado = "{{route('course-status.cursado', $curso)}}";

    new Vue({
        el: '#app',
        data:{
            avance: "",
            curso: "",
            actual: "",
            checked: ""
        },
        created(){
            this.getAvance();
            this.getActual();
        },

        methods: {
            getAvance() {
                axios
                .post(urlAvance)
                .then(response => (this.avance = response.data))
            },

            getActual() {
                axios
                .post(urlActual)
                .then(response => {
                    this.actual = response.data;
                    this.checked = response.data.actual;
                })
            },

            cambiarActual(id){
                axios
                .post(urlActual,{
                    id: id
                })
                .then(response => {
                    this.actual = response.data;
                    this.checked = response.data.actual;

                    $('.subindice > li').removeClass('actual');
                    $('#' + id).addClass('actual');
                })
                
            },

            cursado(){

                axios
                .post(urlCursado,{
                    id: this.actual.id,
                    checked: this.checked

                })
                .then(response => {
                    
                    this.getAvance();

                    if(this.checked){
                        $('#' + this.actual.id).addClass('cursado');
                    }else{
                        $('#' + this.actual.id).removeClass('cursado');
                    }

                })
            }
           
        }
    });
</script>
@endsection