<div class="card" id="temasCreate">
    {!! Form::open(['route' => 'admin.temas.store']) !!}
        <div class="card-header">
            <h1 class="h5 mb-0">
                Nuevo tema
            </h1>
        </div>

        <div class="card-body">

            {!! Form::hidden('capitulo_id', $capitulo->id) !!}

            <div class="form-group">
                {!! Form::text("name", null, ["class"=>"form-control", "placeholder"=>"Ingrese el nombre del tema"]) !!}
            </div>

            {!! Form::textarea("descripcion", null, ["class" => "form-control", "placeholder" => "Ingrese una breve descripción", "rows" => "3"]) !!}
        </div>

        <div class="card-footer">
            {!! Form::submit("Agregar", ['class' => 'btn btn-block btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    {{-- <form v-on:submit.prevent = "temasStore">
        <div class="card-header">
            <h1 class="h5 mb-0">
                Nuevo tema
            </h1>
        </div>

        <div class="card-body">
            <div class="form-group">
                <input class="form-control" placeholder="Ingrese el nombre del tema" v-model = "name" required>
            </div>

            <div class="form-group mb-0">
                <textarea class="form-control" placeholder="Ingrese una breve descripción" rows="3" v-model = "descripcion"></textarea>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-block btn-primary">
                <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                Agregar
            </button>
        </div>
    </form> --}}
    
</div>
  