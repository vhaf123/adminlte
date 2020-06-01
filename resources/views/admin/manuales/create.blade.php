@extends('admin.layouts.app')

@section('title', 'Crear manuales')


@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.manuales.index')}}">Manuales</a></li>
                <li class="breadcrumb-item active">Nuevo manual</li>
                </ol>
            </div>
        </div>
    </div>

@endsection



@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">

                <div class="card-body">
                    {!! Form::open(['route' => 'admin.manuales.store']) !!}
                        <div class="form-row">
                            <div class="form-group col-12">
                                
                                {!! Form::label('name', 'Nombre del manual') !!}
                                {!! Form::text('name', null, ['class' => 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ), 'required', 'placeholder' => 'Escriba el nombre del manual']) !!}
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group col-12">
                                
                                {!! Form::label('descripcion', 'Descripción del manual') !!}
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control'. ( $errors->has('descripcion') ? ' is-invalid' : '' ), 'rows' => '3', 'required', 'placeholder' => 'Escriba una breve descripción sobre el manual']) !!}

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group col-12">
                                
                                {!! Form::label('categoria_id', 'Categoría') !!}
                                {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control'. ( $errors->has('categoria_id') ? ' is-invalid' : '' )]) !!}
                                
                                @error('categoria_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group col-12 mt-2">
                                {!! Form::submit('Crear manual', ['class' => 'btn btn-primary btn-block']) !!}
                            </div>

                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-4">

        </div>
    </div>
</div>
@endsection

@section('script')

   
@endsection