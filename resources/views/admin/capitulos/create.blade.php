<div class="card" id="capitulosStore">
    <form v-on:submit.prevent = "capitulosStore">
        <div class="card-header">
            <h1 class="h5 mb-0">
                Agregar capítulo
            </h1>
        </div>

        <div class="card-body">
            <input type="text" class="form-control" placeholder="Ingrese el nombre del tema" v-model = "name" required>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-block btn-primary">
                <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                Agregar
            </button>
        </div>
    </form>
</div>