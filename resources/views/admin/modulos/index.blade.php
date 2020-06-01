<h1 class="h2 pl-2 text-secondary">Temario</h1>

<div class="card mb-3 modulos shadow-sm"  v-for = "(modulo, index) in curso.modulos">
    <div class="card-header bg-dark d-flex">

        <h1 class="mb-0 h5">
            @{{index + 1 + '. ' +modulo.name}}
        </h1>

        <div class="ml-auto">

            <a :href="'/admin/modulos/' + modulo.id" class="btn btn-primary btn-sm">
                <i class="fas fa-eye"></i>
            </a>

            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modulosEdit" v-on:click = 'modulosEdit(modulo)'>
                <i class="fas fa-edit"></i>
            </button>

            <button class="btn btn-sm btn-danger" v-on:click = "modulosDestroy(modulo)">
                <i class="fas fa-eraser"></i>
            </button>
        </div>
    </div>
</div>