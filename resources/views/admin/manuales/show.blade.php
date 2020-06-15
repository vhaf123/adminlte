@extends('admin.layouts.app')

@section('title')
    {{$manual->name}}
@endsection

@section('style')

@endsection

@section('breadcrumbs')

<div class="jumbotron bg-info">
    <h1><strong>Manual:</strong> {{$manual->name}}</h1>
    <p class="lead mb-1"><strong>Categoría:</strong> {{$manual->categoria->name}}</p>
    <p class="lead mb-1"><strong>Descripción:</strong> {{$manual->descripcion}}</p>
    <p class="lead"><strong class="mr-2">Estado:</strong> 
        @switch($manual->status)
            @case(1)
                <span class="badge badge-warning">Borrador</span>

                @break
            @case(2)
                <span class="badge badge-primary">Publicado</span>
                @break
            @default
                
        @endswitch
    </p>

    <a href="{{route('admin.manuales.edit', $manual)}}" class="btn btn-danger mb-0">Editar información</a>

</div>

@endsection

@section('content')

<div id="app">
    <div class="container-fluid">
        <div class="row">


            <div class="col-12 col-lg-4 order-lg-2 mb-4">
                @include('admin.capitulos.create')

                @if ($manual->status == 1)

                    {!! Form::open(['route' => ['admin.manuales.status', $manual]]) !!}
                        {!! Form::submit('Publicar', ['class' => 'btn btn-block btn-info']) !!}
                    {!! Form::close() !!}

                @else

                    <div class="card">
                        <div class="card-body">
                            <p class="lead mb-0"><strong>Estado: </strong>Publicado</p>
                        </div>
                    </div>

                @endif


            </div>

            <div class="col-12 col-lg-8">

                
                <ul class="list-unstyled">
                    <li v-for = "capitulo in manual.capitulos" class="mb-3">
                        
                        
                        <div class="card">

                            <div class="card-header bg-dark d-flex align-items-center">
                                <h1 class="h5 mb-0">@{{capitulo.name}}</h1>


                                <button type="button" class="ml-auto btn btn-sm btn-success" data-toggle="modal" data-target="#capitulosEdit" v-on:click = "capitulosEdit(capitulo)">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="ml-1 btn btn-sm btn-danger" v-on:click = "capitulosDestroy(capitulo)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <div class="card-body">
                                <ul class="mb-0">
                                    <li v-for="tema in capitulo.temas">
                                        <a :href="'/admin/temas/' + tema.slug + '/edit'" class="text-secondary">@{{tema.name}}</a>
                                    </li>

                                    <li v-if = "capitulo.temas.length == 0">
                                        <span class="text-primary">Aun no se ha agregado ningun tema a este capítulo</span>
                                    </li>
                                </ul>

                                

                            </div>

                            <div class="card-footer d-flex align-items-center">

                                {{-- <strong class="text-secondary">Numero de temas agregados: @{{capitulo.temas.length}}</strong> --}}

                                <button type="button" class="btn btn-secondary ml-auto mr-1" data-toggle="modal" data-target="#temasCreate" v-on:click = "temaCreate(capitulo)">
                                    
                                    Agregar nuevo tema
                                </button>

                                <a :href="'/admin/capitulos/' + capitulo.id" class="btn btn-primary">Ver todos los temas</a>

                            </div>
                        </div>
                    </li>
                </ul>
                    

            </div>

            

        </div>
    </div>
    
    @include('admin.capitulos.edit')



    
      
    <!-- Modal -->
    <div class="modal" id="temasCreate" tabindex="-1" role="dialog" aria-labelledby="temasCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">

            <form v-on:submit.prevent = "temasStore">
                <div class="modal-header">
                    <h5 class="modal-title" id="temasCreateLabel">Nuevo tema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" v-model = "tema_name" placeholder="Escriba el nombre del tema" required>
                    </div>

                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea rows="3" class="form-control" v-model = "tema_descripcion" placeholder="Escriba una breve descripción sobre el tema" required></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">
                        <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        Agregar tema
                    </button>
                </div>
            </form>
          </div>
        </div>
    </div>


    
</div>

@endsection

@section('script')

    <script>
        new Vue({
            el: '#app',
            data:{
                manual: [],
                name: "",
                capitulo_name: "",
                capitulo_id: "",
                tema_name: "",
                tema_descripcion: ""
            },
            created(){
                this.getManual();
                
            },
            methods: {
                getManual() {
                
                    axios
                    .get("{{route('api.manuales', $manual)}}")
                    .then(response => {
                        this.manual = response.data
                    })
                },

                capitulosStore(){
                    $('#capitulosStore .spinner-border').removeClass('d-none');
                    
                    axios.post('/admin/capitulos', {

                        manual_id: this.manual.id,
                        name: this.name,

                    }).then(response => {
                        
                        this.name = "";
                        
                        this.creado_exito('#capitulosStore')

                    }).catch(error => {

                        this.mensaje_error('#capitulosStore')

                    })
                },

                capitulosEdit(capitulo){
                    this.capitulo_name = capitulo.name;
                    this.capitulo_id = capitulo.id;
                },

                capitulosUpdate(){
                
                    $('#capitulosEdit .spinner-border').removeClass('d-none');

                    axios.put('/admin/capitulos/' + this.capitulo_id, {
                        
                        name: this.capitulo_name,

                    }).then(response => {
                        
                        this.capitulo_name = "";
                        this.capitulo_id = "";
                        
                        this.actualizado_exito('#capitulosEdit')

                    }).catch(error => {

                        this.mensaje_error('#capitulosEdit')

                    })
                },

                capitulosDestroy(capitulo){
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '¡Si, elimínalo!',
                        cancelButtonText: '¡No, cancelar!',
                    }).then((result) => {

                        if (result.value) {

                            var url = "/admin/capitulos/" + capitulo.id;

                            axios.delete(url).then(response => {

                                this.getManual();

                                Swal.fire(
                                    '¡Eliminado!',
                                    'Su archivo ha sido eliminado.',
                                    'success'
                                )

                            }).catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '¡Algo salió mal!',
                                })
                            })
                        
                        }

                    })
                },

                /* -------------------------------------------------- */


                temaCreate(capitulo){
                    this.capitulo_id = capitulo.id
                },

                temasStore(){

                    $('#temasCreate .spinner-border').removeClass('d-none');
                    
                    axios.post('/admin/temas', {

                        capitulo_id: this.capitulo_id,
                        name: this.tema_name,
                        descripcion: this.tema_descripcion,

                    }).then(response => {
                        
                        this.tema_name = "";
                        this.capitulo_id = "";
                        this.tema_descripcion,
                        this.creado_exito('#temasCreate')

                    }).catch(error => {

                        this.mensaje_error('#temasCreate')

                    })
                },

                /* -------------------------------------------------- */


                creado_exito(create){

                    this.getManual();

                    $(create).modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    $(create + ' .spinner-border').addClass('d-none');


                    Swal.fire({
                        icon: 'success',
                        title: '¡Creado con éxito!',
                        text: 'Su archivo se creó con exito',
                    })
                },

                actualizado_exito(edit){

                    this.getManual();

                    $(edit + ' .spinner-border').addClass('d-none');

                    $(edit).modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();


                    Swal.fire({
                        icon: 'success',
                        title: '¡Actualizado!',
                        text: 'Su archivo se actualizó con exito',
                    })   
                },

                mensaje_error(error){
                    $(error + ' .spinner-border').addClass('d-none');

                    $(error).modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '¡Algo salió mal!',
                    })
                }
            }
        });

    </script>

    
    
@endsection