<div class="card shadow-sm">

    <div class="card-body">

        <h1 class="h2 mb-3">¿Qué aprenderás?</h1>

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