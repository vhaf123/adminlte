@extends('admin.layouts.app')

@section('title', 'Home')

@section('style')
    <style>

    </style>
@endsection

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.cursos.index')}}">Cursos</a></li>
                    <li class="breadcrumb-item active">{{$curso->name}}</li>
                </ol>
            </div>
        </div>
    </div>

@endsection


@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            
            <div class="card">
            
                <div class="card-body">
                    {!! Form::model($curso, ['route' => ['admin.cursos.update', $curso], 'method' => 'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Escriba el título del curso') !!}
                            {!! Form::text('name', null, ['class' => 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ), 'placeholder' => 'Título', 'required']) !!}

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                            {{-- {!! Form::label($for, $text, [$options]) !!} --}}

                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción') !!}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control'. ( $errors->has('descripcion') ? ' is-invalid' : '' ), 'rows' => "3", 'placeholder' => 'Escriba una pequeña descripción sobre el curso', 'required']) !!}
                            
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('keywords', 'Palabras claves') !!}
                            {!! Form::textarea('keywords', null, ['class' => 'form-control'. ( $errors->has('keywords') ? ' is-invalid' : '' ), 'rows' => "2", 'placeholder' => 'Escriba una serie de palabras claves separado por comas', 'required']) !!}
                            
                            @error('keywords')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6">
                                {!! Form::label('categoria_id', 'Categoria') !!}
                                {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control'. ( $errors->has('categoria_id') ? ' is-invalid' : '' )]) !!}
                            </div>

                            <div class="form-group col-6">
                                {!! Form::label('nivel_id', 'Nivel') !!}
                                {!! Form::select('nivel_id', $niveles, null, ['class' => 'form-control'. ( $errors->has('nivel_id') ? ' is-invalid' : '' )]) !!}
                            </div>
                        </div>
                        

                        <div class="form-group">
                            {!! Form::submit('Actualizar curso', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
                
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
    <script>
        
    </script>
@endsection