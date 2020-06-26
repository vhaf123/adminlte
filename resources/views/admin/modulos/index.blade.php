<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h1 class="h2 pl-2 text-secondary">TEMARIO</h1>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modulosCreate">
                Agregar tema
            </button>
        </div>
    </div>
</div>

<div class="card mb-3 modulos shadow-sm"  v-for = "(modulo, index) in curso.modulos">
    <div class="card-header bg-dark d-flex align-items-center">

        <h1 class="mb-0 h5">
            @{{index + 1 + '. ' +modulo.name}}
        </h1>

        <button type="button" class="btn btn-success btn-sm ml-auto mr-1" data-toggle="modal" data-target="#modulosEdit" v-on:click = 'modulosEdit(modulo)'>
            <i class="fas fa-edit"></i>
        </button>

        <button class="btn btn-sm btn-danger" v-on:click = "modulosDestroy(modulo)">
            <i class="fas fa-times"></i>
        </button>

    </div>

    <div class="card-body">
        <ul class="mb-0 list-unstyled">
            <li v-for="video in modulo.videos" class="mb-1 d-flex align-items-center">

                <a :href="'/admin/videos/' + video.slug + '/edit'" class="text-secondary">@{{video.name}}</a>

                <button class="btn btn-danger btn-sm ml-auto" v-on:click = "videosDestroy(video)">
                    {{-- <i class="fas fa-times"></i> --}}
                    Eliminar
                </button>
                
            </li>
        

            <li v-if = "modulo.videos.length == 0">Aun no se ha agregado ningun subtema a este módulo</li>

        </ul>
    </div>

    <div class="card-footer d-flex align-items-center">

        <strong>
            @{{modulo.videos.length}} videos agregados
        </strong>
        
        <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#videosCreate" v-on:click = "modulo_id = modulo.id">
            Agregar video
        </button>

        {{-- <a :href="'/admin/modulos/' + modulo.id" class="btn btn-primary ml-auto">
            Ver subtemas
        </a> --}}
        
    </div>
</div>