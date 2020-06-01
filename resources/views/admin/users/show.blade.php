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
                <li class="breadcrumb-item active">Legacy User Menu</li>
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
                        <p><strong>Nombre: </strong>{{$user->name}}</p>
                        <p><strong>Email: </strong>{{$user->email}}</p>
                        <p><strong>Roles: </strong>{{$user->rol}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

   
@endsection