@extends('admin.layouts.app')

@section('title')
    {{$manual->name}}
@endsection

@section('style')

@endsection

@section('breadcrumbs')

<div class="jumbotron bg-info">
    <p class="lead mb-1"><strong>Categoría:</strong> {{$manual->categoria->name}}</p>
    <p class="lead mb-1"><strong>Nombre:</strong> {{$manual->name}}</p>
    <p class="lead mb-1"><strong>Descripción:</strong> {{$manual->descripcion}}</p>
    <p class="lead mb-1"><strong>Estado:</strong> 
        @switch($manual->status)
            @case(1)
                <span class="badge badge-danger">Borrador</span>
                @break
            @case(2)
                <span class="badge badge-primary">Publicado</span>
                @break
            @default
                
        @endswitch
    </p>
</div>

@endsection

@section('content')

<div id="app">
    <div class="container-fluid">
        <div class="row">

            <div class="col-8">

                <div id="accordion" role="tablist">
                    
                    <div class="card" v-for = "(capitulo, i) in manual.capitulos">

                        <div class="card-header d-flex" role="tab" :id="'heading' + capitulo.id">

                            <h1 class="mb-0 h5">

                                <a class="collapsed text-secondary" data-toggle="collapse" :href="'#collapse' + capitulo.id" aria-expanded="false" aria-controls="'collapse' + capitulo.id">
                                    @{{capitulo.name}}
                                </a>

                            </h1>

                            <div class="ml-auto d-flex flex-nowrap align-items-start">
                                
                                <button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="#capitulosEdit" v-on:click = "capitulosEdit(capitulo)">
                                    <i class="fas fa-edit"></i>
                                </button>
                    
                                <button class="btn btn-sm btn-danger" v-on:click = "capitulosDestroy(capitulo)">
                                    <i class="fas fa-eraser"></i>
                                </button>
                            </div>
                        </div>

                        <div :id="'collapse' + capitulo.id" class="collapse" role="tabpanel" :aria-labelledby="'heading' + capitulo.id">
                            <div class="card-body">

                                <ul class="list-unstyled mb-0">
                                    <li v-for = "(tema, j) in capitulo.temas" class="mb-2 d-flex">
                                        <h2 class="h6">
                                            @{{tema.name}}
                                        </h2>

                                        <a :href="'/admin/temas/' + tema.id +'/edit'" class="btn btn-sm btn-primary ml-auto">
                                            Editar
                                        </a>

                                        <button class="btn btn-sm btn-danger ml-1" v-on:click = "temasDestroy(tema)" >Eliminar</button>
                                    </li>

                                    <li class="mt-4">
                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#temasCreate" v-on:click = "temaCreate(capitulo)">
                                            Agregar nuevo tema
                                        </button>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>

                </div>
                    

            </div>

            <div class="col-4">
                @include('admin.capitulos.create')
            </div>

        </div>
    </div>
    
    @include('admin.temas.create')

    @include('admin.capitulos.edit')
    
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
                tema_name: ""
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

                    }).then(response => {
                        
                        this.tema_name = "";
                        this.capitulo_id = "";
                        this.creado_exito('#temasCreate')

                    }).catch(error => {

                        this.mensaje_error('#temasCreate')

                    })
                },

                temasDestroy(tema){
                    
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

                            var url = "/admin/temas/" + tema.id;

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