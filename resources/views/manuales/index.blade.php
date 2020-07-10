@extends('layouts.app')

@section('title', '▷ Manuales de informática ONLINE en español')

@section('meta')
    <meta name="description" content="Encuentra los mejores manuales de informática online. 🤩 Contamoscon manuales de programación, ofimática, desarrollo web.">
@endsection

@section('content')

    <section class="buscador bg-oscuro">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 py-5">
                    <h1 class="text-white text-md-center h2">¿Estás buscando algún tema en particular?</h1>
                    <p class="text-white text-md-center">Escribe en el buscador y nosotros te ayudamos a encontrarlo</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control"  id= "search" placeholder="Escribe el nombre del artículo" aria-label="" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <main class="mt-5">
        <div class="container">

            <div class="row">

                @forelse ($manuales as $manual)
                    <article class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card h-100">
                            <div class="card-body">

                                @switch($manual->categoria_id)
                                    @case(1)
                                        <span class="badge badge-primary">{{$manual->categoria->name}}</span>
                                        @break
                                    @case(2)
                                        <span class="badge badge-success">{{$manual->categoria->name}}</span>
                                        @break
                                    @case(3)
                                        <span class="badge badge-danger">{{$manual->categoria->name}}</span>
                                        @break
                                    @case(4)
                                        <span class="badge badge-warning">{{$manual->categoria->name}}</span>
                                        @break
                                    @case(5)
                                        <span class="badge badge-info">{{$manual->categoria->name}}</span>
                                        @break
                                    @default
                                        
                                @endswitch

                                <h1 class="cart-title h4 mt-2 text-secondary"><strong>{{Str::limit($manual->name, 30)}}</strong></h1>
                                <p class="card-text">{{Str::limit($manual->descripcion, 75)}}</p>
                                <a href="{{route('manuales.show', $manual)}}" class="btn btn-block btn-primary">Ver manual</a>
                            </div>
                        </div>
                    </article>    
                @empty
                    
                @endforelse
            
            </div>

            {{$manuales->links()}}
        </div>
    </main>

@endsection

@section('script')
    
@endsection