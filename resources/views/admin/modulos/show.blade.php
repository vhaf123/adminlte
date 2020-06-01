@extends('admin.layouts.app')

@section('title', 'Cursos')

@section('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.cursos.show', $modulo->curso)}}">{{$modulo->curso->name}}</a></li>
                    <li class="breadcrumb-item active">{{$modulo->name}}</li>
                </ol>
            </div>
        </div>
    </div>

@endsection


@section('content')

<div id="app">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">

                <div class="card" v-for = "video in modulo.videos">

                    <div class="card-header">
                        <h1 class="h4 mb-0">@{{video.name}}</h1>
                    </div>

                    <div class="card-body">
                        <p><strong>Descripción: </strong>@{{video.descripcion}}</p>

                        <div class="embed-responsive embed-responsive-16by9" v-html = "video.iframe">
                        </div>
                    </div>

                    <div class="card-footer d-flex">

                        <button type="button" class="btn btn-primary ml-auto mr-1" data-toggle="modal" data-target="#videosEdit" v-on:click = "videosEdit(video)">
                            Editar
                        </button>

                        <button class="btn btn-danger" v-on:click = "videosDestroy(video)">
                            Eliminar
                        </button>
                    </div>
                </div>
                
            </div>

            <div class="col-4">
                <form id = "videosCreate" v-on:submit.prevent = "videosStore">
                    <div class="card">
                        
                        <div class="card-header">
                            <h1 class="h5 mb-0">
                                Agregar video
                            </h1>
                        </div>

                        <div class="card-body">
                            
                            <div class="form-group">
                                <label>Nombre</label>
                                <input v-model = "name" class="form-control" placeholder="Agregar el nombre del video" required>
                            </div>

                            <div class="form-group">
                              <label>Descripción</label>
                              <textarea v-model = "descripcion" class="form-control" rows="3" placeholder="Agrega una breve descripción" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Iframe</label>
                                <input v-model = "iframe" class="form-control" placeholder="Ingrese el iframe del video" required>
                            </div>

                            <button type="submit" class="btn btn-block btn-primary">
                                <div class="spinner-border spinner-border-sm text-light d-none" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                Agregar
                            </button>
                            
                        </div>
                        
                        
                    </div>
                </form>                

            </div>
        </div>
    </div>

    @include('admin.videos.edit')

</div>

@endsection

@section('script')
<script>

    new Vue({
        el: '#app',
        data:{
            modulo: "",
            name: "",
            descripcion: "",
            iframe: "",

            name_edit: "",
            descripcion_edit: "",
            iframe_edit: "",

            video_id: ""
        },
        created(){
            this.getModulo();
        },
        methods:{
            getModulo(){
                axios.post("{{route('api.modulos', $modulo->id)}}")
                .then(response => {
                    this.modulo = response.data
                })
            },
            videosStore(){
                $('#videosCreate .spinner-border').removeClass('d-none');

                axios.post('/admin/videos', {

                    modulo_id: "{{$modulo->id}}",
                    name: this.name,
                    descripcion: this.descripcion,
                    iframe: this.iframe,

                }).then(response => {
                    
                    this.getModulo();

                    this.name = "";
                    this.descripcion = "";
                    this.iframe = "";

                    $('#videosCreate .spinner-border').addClass('d-none');

                    Swal.fire({
                        icon: 'success',
                        title: '¡Creado con éxito!',
                        text: 'Su archivo se creó con exito',
                    })

                }).catch(error => {

                    $('#videosCreate .spinner-border').addClass('d-none');
                
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '¡Algo salió mal!',
                    })

                })
            },
            videosEdit(video){
                this.name_edit = video.name;
                this.descripcion_edit = video.descripcion;
                this.iframe_edit = video.iframe;

                this.video_id = video.id;
            },

            videosUpdate(){
                /* alert('/admin/videos/' + this.video_id); */

                $('#videosEdit .spinner-border').removeClass('d-none');

                axios.put('/admin/videos/' + this.video_id, {
                   
                    name: this.name_edit,
                    descripcion: this.descripcion_edit,
                    iframe: this.iframe_edit,

                }).then(response => {
                    
                    $('#videosEdit').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                    $('#videosEdit .spinner-border').addClass('d-none');

                    this.getModulo();

                    Swal.fire({
                        icon: 'success',
                        title: '¡Actualizado!',
                        text: 'Su archivo se actualizó con exito',
                    })  

                }).catch(error => {

                    $('#videosCreate .spinner-border').addClass('d-none');
                
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '¡Algo salió mal!',
                    })

                })
            },

            videosDestroy(video){

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

                        var url = "/admin/videos/" + video.id;

                        axios.delete(url).then(response => {

                            this.getModulo();

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
            }
        }
    })


</script>
@endsection