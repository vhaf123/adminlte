@extends('admin.layouts.app')

@section('title', 'Tags')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
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
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
    
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->name}}</td>
                                      
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
        "order": [ 0, 'desc' ]
        });

    </script>
@endsection