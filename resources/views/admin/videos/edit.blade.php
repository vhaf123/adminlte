@extends('admin.layouts.app')

@section('title', 'Editar video')

@section('breadcrumbs')

    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{route('admin.cursos.show', $video->modulo->curso)}}">{{$video->modulo->curso->name}}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{$video->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">


                    <div class="card-header">
                        <h1 class="card-title">Actualizar la información del video</h1>
                    </div>

                    <div class="card-body">
                        {!! Form::model($video, ['route' => ['admin.videos.update', $video] ,'method' => 'put', 'files' => 'true']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre:') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del video', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('descripcion', 'Descripcion:') !!}
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripcion del video', 'required', 'rows' => '4']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('iframe', 'Iframe:') !!}
                                {!! Form::textarea('iframe', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el iframe del video', 'required', 'rows' => '3']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('file', 'Archivos:') !!}
                                <br>
                                {!! Form::file('file') !!}
                            </div>


                            <div class="form-group">
                                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary btn-block']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>

                    
                </div>

                @if ($video->file)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-save mr-2" style="font-size: 24px;"></i>
                                <p class="lead mb-0">
                                    <a href="{{route('recursos.download', $video)}}">Este video tiene recursos agregados</a>
                                </p>
                                {!! Form::open(['route'=>['admin.recursos.destroy', $video], 'method' => 'delete','class' => 'ml-auto']) !!}
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times"></i>
                                    </button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endif
     
            </div>

        </div>
    </div>


@endsection