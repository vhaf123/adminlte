<div class="modal" id="capitulosEdit" tabindex="-1" role="dialog" aria-labelledby="capitulosEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

      <div class="modal-content">
        <form v-on:submit.prevent = "capitulosUpdate">
            <div class="modal-header">
            <h5 class="modal-title" id="capitulosEditLabel">Editar capítulo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>

            <div class="modal-body">
            <input class="form-control" v-model = "capitulo_name" placeholder="Ingrese el nombre del cápitulo" required>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-block">
                <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                Actualizar
              </button>
            </div>
        </form>
      </div>
    </div>
</div>
  