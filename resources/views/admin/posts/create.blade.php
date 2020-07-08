@extends('admin.layouts.app')

@section('title', 'Nuevo post')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
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
                <li class="breadcrumb-item active">Nuevo Post</li>
                </ol>
            </div>
        </div>
    </div>

@endsection



@section('content')
<main>
    {!! Form::open(['route' => 'admin.posts.store']) !!}
    <div class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">


                        <h1 class="h5">
                            Nombre:
                        </h1>

                        <div class="form-group">
                            
                            {!! Form::text('name', null, ['class' => 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ), 'placeholder' => 'Escriba el título del post']) !!}

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <h1 class="h5">
                            Extracto:
                        </h1>

                        <div class="form-group">
                            
                            {!! Form::textarea('extracto', null, ['class' => 'form-control'. ( $errors->has('extracto') ? ' is-invalid' : '' ), 'placeholder' => 'Escriba un pequeño extrecto del post', 'rows' => '3']) !!}
                            @error('extracto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <h1 class="h5">
                            Categorias:
                        </h1>

                        <div class="card shadow @error('tags') border border-danger mb-0 @enderror">
                            
                            <div class="card-body">
                                <div class="form-row">
                                    @foreach ($tags as $tag)
                                        <div class="form-group col-4 mb-0">
                                            <label>
                                                {!! Form::checkbox('tags[]', $tag->id, null) !!}
                                                {{$tag->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        @error('tags')
                            <small class="text-danger">
                                <strong>Tienes que seleccionar al menos una categoría</strong>
                            </small>    
                            <br>
                            <br>
                        @enderror

                            
                        <div class="form-group col-12">
                            {!! Form::submit('Crear Post', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>

                        
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    {!! Form::close() !!}
</main>
@endsection