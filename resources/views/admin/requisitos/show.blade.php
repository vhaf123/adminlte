<div class="card">
    <div class="card-body">
        <h1 class="h2 pl-2 text-secondary">Requisitos</h1>

            <ul class="mb-0 list-unstyled">
                <li v-for="requisito in curso.requisitos">
                    <p class="mb-2">@{{requisito.name}}</p>

                    @if ($curso->status != 3)
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#requisitosEdit" v-on:click = "requisitosEdit(requisito)">
                                Editar
                            </button>

                            <button class="btn btn-danger" v-on:click = "requisitosDestroy(requisito)">
                                Eliminar
                            </button>
                        </div>
                    @endif
                </li>
            </ul>
    </div>
</div>