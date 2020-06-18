<!-- Modal -->
<div class="modal" id="videosCreate" tabindex="-1" role="dialog" aria-labelledby="videosCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <form v-on:submit.prevent = "videosStore">

                <div class="modal-header">
                    <h5 class="modal-title" id="videosCreateLabel">Agregar video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input v-model = "video_name" class="form-control" placeholder="Agregar el nombre del video" required>
                    </div>

                    <div class="form-group">
                      <label>Descripción</label>
                      <textarea v-model = "video_descripcion" class="form-control" rows="3" placeholder="Agrega una breve descripción" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Iframe</label>
                        <textarea v-model = "video_iframe" class="form-control" placeholder="Ingrese el iframe del video" rows="3" required></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-primary">
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