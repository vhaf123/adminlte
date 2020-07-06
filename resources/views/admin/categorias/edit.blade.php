@extends('admin.layouts.app')

@section('title', 'Editar categorías')

@section('style')
    <link rel="stylesheet" href="{{asset('plugins/dropzone-5.7.0/dist/min/dropzone.min.css')}}">

    <style>
        .img-categoria{
            position: relative;
            width: 100%;
        }

        .img-categoria:before{
            content: '';
            display: block;
            padding-top: 56.25%;
        }

        .img-categoria > img{
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
                <h1>Editar categorías</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.categorias.index')}}">Categorias</a></li>
                <li class="breadcrumb-item active">Editar</li>
                </ol>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title mb-0">Crear nueva categoría</h1>
                    </div>

                    <div class="card-body">
                        
                        {!! Form::model($categoria, ['route'=>['admin.categorias.update', $categoria], 'method' => 'PUT']) !!}
                            <div class="form-group form-row">
                                
                                <div class="col-4 d-flex justify-content-end align-items-center">
                                    {!! Form::label('name', 'Nombre de la categoría:', ['class' => 'text-secondary pr-3']) !!}
                                </div>

                                <div class="col-8">
                                    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') , 'placeholder' => 'Nombre de la categoría', 'required']) !!}

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="form-group form-row">
                                <div class="col-4 d-flex justify-content-end">
                                    {!! Form::label('descripcion', 'Descripción:', ['class' => 'text-secondary pr-3']) !!}
                                </div>

                                <div class="col-8">
                                    {!! Form::textarea('descripcion', null, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'rows' => "3", 'placeholder' => 'Ingrese una breve descripción de la categoría', 'required']) !!}

                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-4"></div>
                                <div class="col-8">
                                    {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-4">

                @if ($categoria->picture)
                    <figure class="img-categoria">
                        <img src="{{asset($categoria->picture)}}" alt="" class="rounded">
                    </figure>
                @endif

                <form action="{{route('admin.categorias.dropzone', $categoria)}}" method="POST" class="dropzone mb-4" id="my-dropzone">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('plugins/dropzone-5.7.0/dist/min/dropzone.min.js')}}"></script>
    
    <script>

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

@endsection