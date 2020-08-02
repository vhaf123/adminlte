@extends('admin.layouts.app')

@section('title', 'Crear tags')

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.tags.index')}}">Tags</a></li>
                    <li class="breadcrumb-item active">Nuevo tag</li>
                </ol>
            </div>
        </div>
    </div>

@endsection

@section('content')
    

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.tags.store']) !!}
                            @include('admin.tags.partials.form')

                            {!! Form::submit('Crear tag', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection