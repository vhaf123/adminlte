@extends('admin.layouts.app')

@section('title', 'Editar post')

@section('style')
    <link rel="stylesheet" href="{{asset('plugins/dropzone-5.7.0/dist/min/dropzone.min.css')}}">

    <style>
        .img-curso{
            position: relative;
            width: 100%;
        }

        .img-curso:before{
            content: '';
            display: block;
            padding-top: 56.25%;
        }

        .img-curso > img{
            position: absolute;
            z-index: 100;
            width: 100%;
            height: 100%;
            object-fit: cover;
            top: 0;
            left: 0;
        }

    </style>
@endsection

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar post</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                <li class="breadcrumb-item active">{{$post->name}}</li>
                </ol>
            </div>
        </div>
    </div>

@endsection



@section('content')

<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                
                    {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' => 'put']) !!}

                        <div class="form-row">

                            <div class="form-group col-12">
                                {!! Form::label('name', 'Escriba el nombre del post') !!}
                                {!! Form::text('name', null, ['class' => 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ), 'placeholder' => 'Escriba el título del post', 'required']) !!}

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                {!! Form::label('extracto', 'Extracto del post') !!}
                                {!! Form::textarea('extracto', null, ['class' => 'form-control'. ( $errors->has('extracto') ? ' is-invalid' : '' ), 'rows' => "3", 'placeholder' => 'Escriba un pequeño extrecto del post', 'required']) !!}
                                @error('extracto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @foreach ($tags as $tag)
                                <div class="form-group col-4 mb-0">
                                    <label>
                                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                                        {{$tag->name}}
                                    </label>
                                </div>
                            @endforeach

                            <div class="form-group col-12">
                                @error('tags')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-12 mt-3">
                                {!! Form::label('body', 'Contenido de la publicación') !!}
                                {!! Form::textarea('body', null, ['class' => 'form-control'. ( $errors->has('body') ? ' is-invalid' : '' ), 'placeholder' => 'Escriba el contenido principal del post', 'required']) !!}
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-12">
                                {!! Form::submit('Actualizar Post', ['class' => 'btn btn-primary btn-block']) !!}
                            </div>

                        </div>

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-4">

                @if ($post->picture)
                    <figure class="img-curso">
                        <img src="{{asset($post->picture)}}" alt="" class="rounded">
                    </figure>
                @endif

                <form action="{{route('admin.posts.dropzone', $post)}}" method="POST" class="dropzone mb-4" id="my-dropzone">
                </form>


                @if ($post->status == 1)
                
                    {!! Form::open(['route' => ['admin.posts.status', $post]]) !!}
                        {!! Form::submit('Publicar', ['class' => 'btn btn-lg btn-dark']) !!}
                    {!! Form::close() !!}

                    @else

                    <div class="card">
                        <div class="card-body">
                            <p class="lead mb-0"><strong>Estado: </strong>Publicado</p>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</main>


@endsection

@section('script')

    <script src="{{asset('plugins/dropzone-5.7.0/dist/min/dropzone.min.js')}}"></script>
    <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
    {{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}
    {{-- <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script> --}}

    

    <script>
        //CKEDITOR
        CKEDITOR.replace('body',{
            height: 500
        });

        //Dropzone
        Dropzone.options.myDropzone = {
            dictDefaultMessage: 'Arrastre una foto para agregar o cambiar de foto',
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            },
            acceptedFiles: 'image/*',
            maxFilesize: 1,
            maxFiles: 1,
            paramName: 'picture',
        };


    </script>

    @if (session('info'))
        <script>
            toastr.info("{{session('info')}}")
        </script>
    @endif
@endsection