@extends('admin.layouts.app')

@section('title', 'Roles')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lista de usuarios</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
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
                        <table class="table table-striped" id="users">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>ID</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->rol}}</td>
                                            <td>
                                                <div class="d-flex flex-nowrap justify-content-end">
                
                                                    <a href="{{route('admin.users.show', $user)}}" class="btn btn-info btn-sm" role="button">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                
                                                    <a href="{{route('admin.users.edit', $user)}}" class="btn btn-success btn-sm mx-1" role="button">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    
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
        $('#users').DataTable({
        "responsive": true,
        "autoWidth": false,
        });
    </script>
@endsection