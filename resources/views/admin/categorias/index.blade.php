@extends('admin.layouts.app')

@section('title', 'Categorias')

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categorías</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                <li class="breadcrumb-item active">Categorias</li>
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
                    <div class="card-header d-flex align-items-center">
                        <h1 class="card-title">
                            Categorías de los cursos
                        </h1>

                        <a href="{{route('admin.categorias.create')}}" class="btn btn-info btn-sm ml-auto">Nueva categoría</a>

                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categoria</th>
                                    <th></th>
                                </tr>
                            </thead>
    
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{$categoria->id}}</td>
                                        <td>{{$categoria->name}}</td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <a href="{{route('admin.categorias.edit', $categoria)}}" class="mr-2 btn btn-primary btn-sm">Editar</a>
                                                {!! Form::open(['route' => ['admin.categorias.destroy', $categoria], 'method' => 'delete', 'class' => 'd-inline formulario']) !!}
                                                    <button class="mr-2 btn btn-danger btn-sm" type="submit">Eliminar</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                             
                            </tbody>
                        </table>
                    </div>

                    



                </div>


            </div>
        </div>
    </div>
@endsection

@section('script')
    
    <script>
        $(".formulario button").click(function(e) {

            e.preventDefault();
            form = $(this).parent('form');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, elimínalo!',
                cancelButtonText: '¡No, cancelar!',
            }).then((result) => {

                if (result.value) {
                    form.submit();
                }

            })

        });
    </script>


@endsection