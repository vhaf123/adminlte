@extends('admin.layouts.app')

@section('title', 'Crear categoría')

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Nueva categoría</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.categorias.index')}}">Categorias</a></li>
                <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title mb-0">Crear nueva categoría</h1>
                    </div>

                    <div class="card-body">
                        {!! Form::open(['route'=>'admin.categorias.store']) !!}
                            <div class="form-group form-row">
                                
                                <div class="col-4 d-flex justify-content-end align-items-center">
                                    {!! Form::label('name', 'Nombre de la categoría:', ['class' => 'text-secondary pr-3']) !!}
                                </div>

                                <div class="col-8">
                                    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') , 'placeholder' => 'Nombre de la categoría']) !!}

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
                                    {!! Form::textarea('descripcion', null, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'rows' => "3", 'placeholder' => 'Ingrese una breve descripción de la categoría']) !!}

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
                                    {!! Form::submit('Crear categoría', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection