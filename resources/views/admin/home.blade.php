@extends('admin.layouts.app')

@section('title', 'Home')

@section('style')
    <style>

    </style>
@endsection

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>

@endsection


@section('content')
{{-- <div class="card">
    <div class="card-header">
    <h3 class="card-title">Title</h3>

    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
    </div>
    <div class="card-body">
    Start creating your amazing application!
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    Footer
    </div>
    <!-- /.card-footer-->
</div> --}}

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                <h3>{{$usuarios->count()}}</h3>

                <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route("admin.users.index")}}" class="small-box-footer">Lista de usuarios <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$cursos->count()}}{{-- <sup style="font-size: 20px">%</sup> --}}</h3>

              <p>Cursos publicados</p>
            </div>
            <div class="icon">
              <i class="fas fa-laptop-code"></i>
            </div>
            <a href="{{route('admin.cursos.index')}}" class="small-box-footer">Lista de cursos <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$manuales->count()}}</h3>

              <p>Manuales</p>
            </div>
            <div class="icon">
              <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <a href="{{route('admin.manuales.index')}}" class="small-box-footer">Lista de manuales <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$posts->count()}}</h3>

              <p>Post publicados</p>
            </div>
            <div class="icon">
              <i class="fas fa-blog"></i>
            </div>
            <a href="{{route('admin.posts.index')}}" class="small-box-footer">Lista de posts <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
</div>

@endsection

@section('script')
    <script>
        
    </script>
@endsection