<h1 class="h2 pl-2 text-secondary">Temario</h1>

<div class="card mb-3 modulos shadow-sm"  v-for = "(modulo, index) in curso.modulos">
    <div class="card-header bg-dark d-flex align-items-center">

        <h1 class="mb-0 h5">
            @{{index + 1 + '. ' +modulo.name}}
        </h1>

        <button class="btn btn-sm btn-danger ml-auto" v-on:click = "modulosDestroy(modulo)">
            <i class="fas fa-times"></i>
        </button>

    </div>

    <div class="card-body">
        <ul class="mb-0">
            <li v-for="video in modulo.videos">@{{video.name}}</li>

            <li v-if = "modulo.videos.length == 0">Aun no se ha agregado ningun subtema a este módulo</li>

        </ul>
    </div>

    <div class="card-footer d-flex align-items-center">

        <strong>
            @{{modulo.videos.length}} subtemas agregados
        </strong>


        <button type="button" class="btn btn-success ml-auto mr-1" data-toggle="modal" data-target="#modulosEdit" v-on:click = 'modulosEdit(modulo)'>
            Editar nombre
        </button>

        <a :href="'/admin/modulos/' + modulo.id" class="btn btn-primary">
            Ver subtemas
        </a>
        
    </div>
</div>