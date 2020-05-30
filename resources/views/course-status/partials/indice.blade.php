<div class="card shadow">

    <div class="card-body">

        <h1 class="h4 text-center">
            {{$curso->name}}
        </h1>

        <div class="media mb-3">

            <img class = "rounded-circle shadow mr-3" src="{{asset($curso->profesor->user->picture)}}" style="width: 60px">

            <div class="media-body mt-1">
                <p class="bold mb-0">Prof. {{$curso->profesor->user->name}}</p>
                <a href="" class="text-primary">{{"@" . $curso->profesor->user->slug}}</a>
            </div>
        </div>


        <div class="progreso mb-3">
            <p class="mb-0">@{{avance}}% completado</p>

            <div class="progress">
                <div class="progress-bar" role="progressbar" :style="'width: ' + avance + '%'" :aria-valuenow="avance" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>

        <ul  class="list-unstyled indice">

            <li v-for = "modulo in curso.modulos">

                <h2  class="h6 font-weight-bold mb-3">
                    @{{modulo.name}}
                </h2>

                <ul class="subindice">
                    <li v-for = "video in modulo.videos" :class="video.visto && video.actual? 'cursado actual': video.visto? 'cursado' : video.actual? 'actual' : ''" >
                        
                        <h3 class="h6 text-secondary" v-on:click="cambiarActual(video.id)">
                            @{{video.name}}
                        </h3>
                    </li>
                </ul>

            </li>
            
        </ul>

    </div>
</div>