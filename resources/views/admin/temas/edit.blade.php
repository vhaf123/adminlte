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
            padding-top: 56.25%;
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
            top: 20px;
            right: 20px;
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

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-3">
            <a href="{{route('admin.manuales.show', $tema->capitulo->manual)}}" class="btn btn-primary">Volver al manual</a>
        </div>

        <div class="col-sm-9">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.manuales.show', $tema->capitulo->manual)}}">{{$tema->capitulo->manual->name}}</a></li>
            <li class="breadcrumb-item active">{{$tema->name}}</li>
            </ol>
        </div>
    </div>
</div>

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-8">

                <div class="card bg-info">
                    <div class="card-body">
                        <h1 class="h4">Manual: {{$tema->capitulo->manual->name}}</h1>
                        <h2 class="h5">Capitulo: {{$tema->capitulo->name}}</h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        {!! Form::model($tema, ['route' => ['admin.temas.update', $tema], 'method' => 'put']) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Tema') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('slug', 'Slug') !!}
                                {!! Form::text('slug', null, ['class' => 'form-control', 'required']) !!}
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

            <div class="col-4">
                <form action="{{route('admin.temas.dropzone', $tema)}}" method="POST" class="dropzone mb-4" id="my-dropzone">
                </form>

                @foreach ($tema->images as $image)
                    <figure class="img-tema" id="{{$image->id}}">

                        <div class="iconos" onclick="copy('{{$image->picture}}')">
                            <button class="btn btn-secondary btn-sm">
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

               
                @endforeach


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
            dictDefaultMessage: 'Arrastre una foto para agregar o cambiar de foto',
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