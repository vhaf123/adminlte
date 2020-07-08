@extends('admin.layouts.app')

@section('title', 'Posts')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listado de mis posts</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Posts</li>
                </ol>
            </div>
        </div>
    </div>

@endsection



@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                
                <div class="card-body">

                    <table id="posts" class="table table-striped table-hover">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Estado</th>
                                <th>Vistas</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->name}}</td>
                                    <td>

                                        @switch($post->status)
                                            @case(1)
                                                <span class="badge badge-info">Borrador</span>        
                                                @break
                                            @case(2)
                                                <span class="badge badge-primary">Publicado</span>        
                                                @break
                                            @default
                                                
                                        @endswitch
                                        
                                    </td>
                                    <td>{{$post->contador}} vistas</td>
                                    <td>
                                        <div class="d-flex flex-nowrap justify-content-end">
                
                                           {{--  <a href="{{route('admin.posts.show', $post)}}" class="btn btn-info btn-sm" role="button">
                                                <i class="fas fa-eye"></i>
                                            </a> --}}
                                        
                                            <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-success btn-sm mx-1" role="button">
                                                {{-- <i class="fas fa-edit"></i> --}}
                                                Editar
                                            </a>
                                           

                                            {!! Form::open(['route' => ['admin.posts.destroy', $post], 'class' => 'd-inline, formulario', 'method' => 'DELETE', 'id' => 'formulario']) !!}
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    {{-- <i class="fas fa-eraser"></i> --}}
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
        $('#posts').DataTable({

        "responsive": true,
        "autoWidth": false,
        "order": [ 0, 'desc' ]
        });

        $('#formulario button').click(function(e){
            
            e.preventDefault();

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

                    $('#formulario').submit();
                                  
                }

            })
        })

    </script>
@endsection