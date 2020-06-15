<div class="card shadow-sm">
    <div class="card-body">
        <div class="media mb-1">

            <img class="mr-3 img-thumbnail rounded-circle" src="{{asset($curso->profesor->user->avatar)}}" alt="Generic placeholder image" style="width: 70px">

            <div class="media-body pt-2">
                <h1 class="h5 bold">Prof. {{$curso->profesor->user->name}}</h1>
                <p>
                    <a href="">{{"@".$curso->profesor->user->slug}}</a>
                </p>
            </div>
        </div>

        @can('matriculado', $curso)

            <a href="{{route('course-status.index', $curso)}}" class="btn btn-primary btn-lg btn-block ">
                Continuar con el curso
            </a>

        @else

            {!! Form::open(['route' => ['cursos.matricular', $curso]]) !!}

                {!! Form::submit('Llevar este curso', ['class' => 'btn btn-primary btn-lg py-2 btn-block']) !!}
            
            {!! Form::close() !!}
        @endcan
    </div>
</div>