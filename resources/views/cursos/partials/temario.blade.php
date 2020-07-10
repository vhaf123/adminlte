<h1 class="h2 pl-2 text-secondary">Temario</h1>

{{-- <div id="accordion" role="tablist">
    @forelse ($curso->modulos as $modulo)

        <div class="card mb-3 modulos shadow-sm">
            
            <div class="card-header bg-white" role="tab" id="heading{{$modulo->id}}">
                <h1 class="mb-0 h5">
                    <a class="collapsed" data-toggle="collapse" href="#collapse{{$modulo->id}}" aria-expanded="false" aria-controls="collapse{{$modulo->id}}">
                        <i class="fas fa-plus text-info mr-1"></i> {{$modulo->name}}
                    </a>
                </h1>
            </div>

            <div id="collapse{{$modulo->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$modulo->id}}">
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        @forelse ($modulo->videos as $video)
                            <li class="my-2">

                                <div class="media text-secondary">
                                    <i class="fas fa-play-circle mt-1 mr-2 text-secondary"></i>
                                    
                                    <div class="media-body">
                                        <p class="text-secondary">{{$video->name}}</p>
                                    </div>
                                </div>
                                
                            </li>
                        @empty
                            <li>No tiene ningun tema registrado en este módulo</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        
    @empty
        <div class="card shadow">
            <div class="card-body">
                No existe ningun módulo registrado
            </div>
        </div>
    @endforelse

</div> --}}

<div id="accordion" role="tablist">

    @foreach ($curso->modulos as $modulo)
        
        @if ($loop->first)

            <div class="card">
                <div class="card-header" role="tab" id="heading{{$modulo->id}}">
                    <h5 class="mb-0">
                        <a class="text-secondary d-block text-decoration-none" data-toggle="collapse" href="#collapse{{$modulo->id}}" aria-expanded="true" aria-controls="collapse{{$modulo->id}}">
                            {{$modulo->name}}
                        </a>
                    </h5>
                </div>
            
                <div id="collapse{{$modulo->id}}" class="collapse show" role="tabpanel" aria-labelledby="heading{{$modulo->id}}">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            @forelse ($modulo->videos as $video)
                                <li class="text-secondary">
                                    <i class="fas fa-check-circle text-info mr-2"></i>{{$video->name}}
                                </li>
                            @empty
                                <li>No tiene ningun tema registrado en este módulo</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

        @else

            <div class="card mt-2">
                <div class="card-header" role="tab" id="heading{{$modulo->id}}">
                    <h5 class="mb-0">
                    <a class="text-secondary collapsed d-block text-decoration-none" data-toggle="collapse" href="#collapse{{$modulo->id}}" aria-expanded="false" aria-controls="collapse{{$modulo->id}}">
                        {{$modulo->name}}
                    </a>
                    </h5>
                </div>
                <div id="collapse{{$modulo->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$modulo->id}}">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            @forelse ($modulo->videos as $video)
                                <li class="text-secondary">
                                    <i class="fas fa-check-circle text-info mr-2"></i>{{$video->name}}
                                </li>
                            @empty
                                <li>No tiene ningun tema registrado en este módulo</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        
        @endif

    @endforeach

</div>