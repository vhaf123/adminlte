<div class="modal" id="temasCreate" tabindex="-1" role="dialog" aria-labelledby="temasCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        
        <div class="modal-content">

            <form v-on:submit.prevent = "temasStore">
                <div class="modal-header">
                    <h5 class="modal-title" id="temasCreateLabel">Nuevo tema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input placeholder="Ingrese el nombre del tema" v-model="tema_name" class="form-control" required>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">
                        <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        Agregar
                    </button>
                </div>
            </form>
            
        </div>
        
    </div>
</div>
  