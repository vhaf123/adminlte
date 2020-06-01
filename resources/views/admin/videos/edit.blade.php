<div class="modal" id="videosEdit" tabindex="-1" role="dialog" aria-labelledby="videosEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form v-on:submit.prevent = "videosUpdate">
                <div class="modal-header">
                    <h5 class="modal-title" id="videosEditLabel">Editar video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Nombre</label>
                        <input v-model = "name_edit" class="form-control" placeholder="Agregar el nombre del video" required>
                    </div>

                    <div class="form-group">
                      <label>Descripción</label>
                      <textarea v-model = "descripcion_edit" class="form-control" rows="3" placeholder="Agrega una breve descripción" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Iframe</label>
                        <input v-model = "iframe_edit" class="form-control" placeholder="Ingrese el iframe del video" required>
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-primary">
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
  