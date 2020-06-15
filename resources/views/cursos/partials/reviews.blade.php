<h1 class="h2 pl-2 text-secondary mb-3">Valoraciones</h1>

@can('matriculado', $curso)

    @can('valorado', $curso)

        <div class="py-3 pl-3 text-primary mb-3 bg-white shadow-sm">
            Ya has valorado este curso
        </div>
    @else

        <div class="border-top border-bottom py-4 mb-4">

            {!! Form::open(['route' => ['cursos.review', $curso]]) !!}

                <div class="media">

                    <img class = "mr-3 img-thumbnail rounded-circle" src="{{asset(auth()->user()->avatar)}}" alt="" style="width:  60px">

                    <div class="media-body">
                        {!! Form::textarea('comentario', null, ['class' => 'form-control mb-2', 'rows' => "3", 'placeholder' => 'Ingresa un comentario', 'required']) !!}

                        <div class="d-flex justify-content-between align-items-center">

                            {!! Form::hidden('rating', 5, ['id' => 'rating']) !!}
                            <ul class="list-inline estrellas">

                                <li class="list-inline-item" data-number = "1">
                                    <i class="fas fa-star text-warning"></i>
                                </li>
                    
                                <li class="list-inline-item" data-number = "2">
                                    <i class="fas fa-star text-warning"></i>
                                </li>
                    
                                <li class="list-inline-item" data-number = "3">
                                    <i class="fas fa-star text-warning"></i>
                                </li>
                    
                                <li class="list-inline-item" data-number = "4">
                                    <i class="fas fa-star text-warning"></i>
                                </li>
                    
                                <li class="list-inline-item" data-number = "5">
                                    <i class="fas fa-star text-warning"></i>
                                </li>
                    
                            </ul>

                            {!! Form::submit('Valorar', ['class' => 'btn btn-primary']) !!}
                        </div>

                    </div>


                </div>

            {!! Form::close() !!}

        </div>

    @endcan
@endcan


<div>
    <p class="pl-3 lead text-secondary">
        {{$curso->reviews->count()}} valoracion(es)
    </p>

    <ul class="list-unstyled">

        @forelse ($curso->reviews as $review)

            <li class="mb-3 border-bottom">

                <div class="media">
                    <img class = "mr-3 img-thumbnail rounded-circle" src="{{asset($review->user->avatar)}}" alt="" style="width:  60px">
                    
                    <div class="media-body text-secondary">
                        <p class="mb-1"><span class="font-weight-bold">{{$review->user->name}} </span> <i class="fas fa-star text-warning"></i> ({{$review->rating}}) <small>{{$review->created_at->diffForHumans()}}</small></p>
                        <p class="">{{$review->comentario}}</p>
                    </div>

                </div>

            </li>

        @empty

            <li>
                <div class="card">
                    <div class="card-body">
                        <p class="lead mb-0">Este curso no tiene ninguna reseña</p>
                    </div>
                </div>
            </li>

        @endforelse

    </ul>
</div>