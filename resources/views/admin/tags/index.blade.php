@extends('admin.layouts.app')

@section('title', 'Tags')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2 flex-wrap">
            <div class="col-12 col-md-4">
                <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Nuevo tag</a>
            </div>

            <div class="col-12 col-md-8">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                    {{-- <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Posts</a></li> --}}
                    <li class="breadcrumb-item active">Post</li>
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

                        <table id="tags" class="table table-striped table-hover">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Background</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
    
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->name}}</td>
                                        <td>{{$tag->slug}}</td>
                                        
                                        <td><span class="badge {{$tag->background}}">{{$tag->background}}</span></td>
                                      
                                        <td>
                                            <div class="d-flex flex-nowrap justify-content-end">
                    
                                               
                                            
                                                <a href="{{route('admin.tags.edit', $tag)}}" class="btn btn-success btn-sm mx-1" role="button">
                                                    Editar
                                                </a>
                                               
    
                                                {!! Form::open(['route' => ['admin.tags.destroy', $tag], 'class' => 'd-inline, formulario', 'method' => 'DELETE', 'id' => 'formulario']) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Eliminar
                                                    </button>
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
    <!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <script>

        $('#tags').DataTable({

        "responsive": true,
        "autoWidth": false,
        
        });

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