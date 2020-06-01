<div class="modal" id="requisitosEdit" tabindex="-1" role="dialog" aria-labelledby="requisitosEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <form v-on:submit.prevent = "requisitosUpdate">
            <div class="modal-header">
                <h5 class="modal-title" id="requisitosEditLabel">Editar requisito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" required v-model = "requisito_name">
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