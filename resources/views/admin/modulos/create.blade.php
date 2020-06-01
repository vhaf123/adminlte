<div class="modal" id="modulosCreate" tabindex="-1" role="dialog" aria-labelledby="modulosCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

      <div class="modal-content">

        <form v-on:submit.prevent = "modulosStore">

          <div class="modal-header">

            <h5 class="modal-title" id="modulosCreateLabel">Nuevo módulo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>

          </div>

          <div class="modal-body">
            <div class="form-input">
              <input type="text" class="form-control" v-model = "modulo_name" placeholder="Ingrese un módulo" required>
            </div>
          </div>

          <div class="modal-footer">

            <div class="spinner-border text-primary mr-auto d-none" role="status">
              <span class="sr-only">Loading...</span>
            </div>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

        </form>

      </div>
    </div>
</div>
