<div class="container">
    <div class="row align-items-center py-5">
        <div class="col">
            <div class="card-img">
                <img src="{{asset($curso->picture)}}" alt="" class="rounded">
            </div>
        </div>

        <div class="col-12 col-lg-7 col-xl-6 text-white">
            <h1 class="h2 mt-3 mt-lg-0">{{$curso->name}}</h1>

            <p>
                <i class="fas fa-chart-line"></i>
                Nivel: {{$curso->nivel->name}}
            </p>

            <p>
                <i class="far fa-calendar-alt"></i>
                Fecha de lanzamiento: {{$curso->created_at->toFormattedDateString()}}
            </p>

            <p>
                <i class="fas fa-code"></i>
                Estado: @switch($curso->status)
                    @case(1)
                        Borrador
                        @break
                    @case(2)
                        Elaboración
                        @break
                    @case(3)
                        Culminado
                        @break
                        
                @endswitch
            </p>

            <p>
                <i class="fas fa-users"></i>
                Matriculados: {{$curso->users_count + 100}}
            </p>

            <p>
                <i class="far fa-star"></i>
                Calificación: {{$curso->rating}}
            </p>

            @can('matriculado', $curso)

                <a href="{{route('course-status.index', $curso)}}" class="btn btn-danger">
                    Continuar con el curso
                </a>

            @else

                {!! Form::open(['route' => ['cursos.matricular', $curso]]) !!}

                    {!! Form::submit('Llevar este curso', ['class' => 'btn btn-danger']) !!}
                
                {!! Form::close() !!}
            @endcan

        </div>
    </div>
</div>