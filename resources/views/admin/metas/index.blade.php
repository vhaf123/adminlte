<div class="card shadow-sm">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center">

            <h1 class="h3 text-secondary">Metas del curso</h1>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#metasCreate">
                Agregar meta
            </button>
            
        </div>

        <hr>

        <ul class="mb-0 list-unstyled">

            <li v-for = "meta in curso.metas">

                <div class="media">

                    <div class="media-body">

                        <p class="text-secondary mb-2">@{{meta.name}}</p>
                            
                        <div class= "mb-3">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#metasEdit" v-on:click = 'metasEdit(meta)'>
                                Editar
                            </button>

                            <button type="button" class="btn btn-danger btn-sm" v-on:click = "metasDestroy(meta)">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>