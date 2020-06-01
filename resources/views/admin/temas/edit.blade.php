@extends('admin.layouts.app')

@section('title')
    {{$tema->name}}
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
            <div class="col">

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
    {{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}

    <script>

        //CKEDITOR
        CKEDITOR.replace('body',{
            height: 500
        });
       
    </script>
 
    
@endsection