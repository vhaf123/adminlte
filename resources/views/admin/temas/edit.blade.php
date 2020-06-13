@extends('admin.layouts.app')

@section('title')
    {{$tema->name}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('plugins/dropzone-5.7.0/dist/min/dropzone.min.css')}}">

    <style>

        .img-tema{
            position: relative;
            width: 100%;
        }

        .img-tema:before{
            content: '';
            display: block;
            /* padding-top: 56.25%; */
            padding-top: 75%;
        }

        .img-tema > img{
            position: absolute;
            z-index: 100;
            width: 100%;
            height: 100%;
            object-fit: cover;
            top: 0;
            left: 0;
        }

        .img-tema .iconos{
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 200;
        }

        .img-tema figcaption{
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            display: block;
            z-index: 200;
            overflow-y: scroll;
        }

        /* 

        

         */


        /* .img-tema {
            border: thin #c0c0c0 solid;
            display: flex;
            flex-flow: column;
            padding: 5px;
            margin: auto;
        }

        .img-tema img {
            width: 100%;
        }

        .img-tema figcaption {
            background-color: #222;
            color: #fff;
            font: italic smaller sans-serif;
            padding: 3px;
            text-align: center;
            width: 100%;
            overflow-y: scroll;
        } */


    </style>
@endsection

@section('breadcrumbs')

    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.manuales.show', $tema->capitulo->manual)}}">{{$tema->capitulo->manual->name}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.capitulos.show', $tema->capitulo)}}">{{$tema->capitulo->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$tema->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

@endsection

@section('content')


    {{route('logout')}}

    <div class="container-fluid">
        <div class="row">

            <div class="col">


                <form action="{{route('admin.temas.dropzone', $tema)}}" method="POST" class="dropzone mb-4" id="my-dropzone">
                </form>

                <div class="row">

                    @foreach ($tema->images as $image)
                        <div class="col-2">
                            <figure class="img-tema border" id="{{$image->id}}">

                                <div class="iconos" >
                                    <button class="btn btn-secondary btn-sm" onclick="copy('{{$image->picture}}')">
                                        <i class="fas fa-copy"></i>
                                    </button>

                                    {!! Form::open(['route' => ['admin.images.destroy', $image], 'method' => "delete", 'class' => 'd-inline']) !!}

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-times"></i>
                                        </button>

                                    {!! Form::close() !!}

                                </div>

                                <img src="{{asset($image->picture)}}" alt="">
                                <figcaption class="overflow-auto bg-dark" id="{{$image->id}}">{{$image->picture}}</figcaption>
                            </figure>
                        </div>
                    @endforeach

                </div>


                <div class="card">
                    <div class="card-body">

                        {!! Form::model($tema, ['route' => ['admin.temas.update', $tema], 'method' => 'put', 'id' => 'formulario']) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Tema') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('descripcion', 'Descripcion') !!}
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('body', 'Cuerpo') !!}
                                {!! Form::textarea('body', null, ['required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Acualizar', ['class' => 'btn btn-block btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                

            </div>


        </div>
    </div>

@endsection

@section('script')

    {{-- <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script> --}}
    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    <script src="{{asset('plugins/dropzone-5.7.0/dist/min/dropzone.min.js')}}"></script>
    {{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}

    <script>

        //CKEDITOR
        CKEDITOR.replace('body',{
            height: 500
        });

        //dropzone
        Dropzone.options.myDropzone = {
            dictDefaultMessage: 'Arrastre una foto para agregar',
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            },
            acceptedFiles: 'image/*',
            maxFilesize: 1,
            paramName: 'picture',
        };

        function copy(picture){

          

            var $temp = $("<input>")
            $("body").append($temp);
            $temp.val(picture).select();
            document.execCommand("copy");
            $temp.remove();

            toastr.info("Se copió la url de la imagen con éxito")            
            
        }

      
       
    </script>
 
    
@endsection