<article class="card h-100 shadow">

    <div class="card-img">
        <img class="" src="{{asset($curso->picture)}}" alt="Card image cap">

        <div class="card-text">
            <div class="container">
                @switch($curso->categoria_id)
                    @case(1)
                
                        <p class="pt-2 lead">
                            <span class="badge badge-primary">{{$curso->categoria->name}}</span>
                        </p>

                        @break

                    @case(2)
                            
                        <p class="pt-2 lead">
                            <span class="badge badge-success">{{$curso->categoria->name}}</span>
                        </p>

                        @break

                    @case(3)
                            
                        <p class="pt-2 lead">
                            <span class="badge badge-danger">{{$curso->categoria->name}}</span>
                        </p>

                        @break

                    @case(4)
                            
                        <p class="pt-2 lead">
                            <span class="badge badge-warning">{{$curso->categoria->name}}</span>
                        </p>

                        @break
                    
                    @case(5)    

                        <p class="pt-2 lead">
                            <span class="badge badge-info">{{$curso->categoria->name}}</span>
                        </p>

                        @break
                        
                @endswitch
            </div>
        </div>

    </div>

    <div class="card-body">
        <h1 class="card-title h6">
            <strong>{{Str::limit($curso->name, 40)}}</strong>
        </h1>
        <p class="mb-1 text-secondary">Estado: 
            
            @switch($curso->status)
                @case(2)
                    En elaboración
                    @break
                @case(3)
                    Culminado
                    @break
                @default
                    
            @endswitch

        </p>
        <p class="card-subtitle mb-1 text-muted">Prof. {{$curso->profesor->user->name}}</p>

        <div class="d-flex justify-content-between">
            <ul class="list-inline estrellas">

                <li class="list-inline-item">
                    <i class="fas fa-star text-{{$curso->rating >= 1 ? 'warning' : ''}}"></i>
                </li>
    
                <li class="list-inline-item">
                    <i class="fas fa-star text-{{$curso->rating >= 2 ? 'warning' : ''}}"></i>
                </li>
    
                <li class="list-inline-item">
                    <i class="fas fa-star text-{{$curso->rating >= 3 ? 'warning' : ''}}"></i>
                </li>
    
                <li class="list-inline-item">
                    <i class="fas fa-star text-{{$curso->rating >= 4 ? 'warning' : ''}}"></i>
                </li>
    
                <li class="list-inline-item">
                    <i class="fas fa-star text-{{$curso->rating >= 5 ? 'warning' : ''}}"></i>
                </li>
    
            </ul>

            <p class="text-secondary"><span class="fas fa-user mr-1"></span>({{$curso->users_count}})</p>
        </div>

        

        <a href="{{route('cursos.show', $curso)}}" class="btn btn-block btn-primary">Más información</a>
    </div>
</article>