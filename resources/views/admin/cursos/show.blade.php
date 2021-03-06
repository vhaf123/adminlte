@extends('admin.layouts.app')

@section('title')
{{$curso->name}}
@endsection

@section('style')
    
    <link rel="stylesheet" href="{{asset('plugins/dropzone-5.7.0/dist/min/dropzone.min.css')}}">

    <style>
        .img-curso{
            position: relative;
            width: 100%;
        }

        .img-curso:before{
            content: '';
            display: block;
            padding-top: 56.25%;
        }

        .img-curso > img{
            position: absolute;
            z-index: 100;
            width: 100%;
            height: 100%;
            object-fit: cover;
            top: 0;
            left: 0;
        }
    </style>

@endsection

@section('breadcrumbs')

<div class="jumbotron bg-info">

    @if ($curso->status == 3)
        <div class="ribbon-wrapper ribbon-xl">
            <div class="ribbon bg-warning text-lg">
            Culminado
            </div>
        </div>
    @endif
    
    <h1><strong>Curso:</strong> {{$curso->name}}</h1>
    <p class="lead mb-1"><strong>Categoria:</strong> {{$curso->categoria->name}}</p>

    <p class="lead"><strong class="mr-2">Estado:</strong>
        
        @switch($curso->status)

            @case(1)
                
                <span class="badge badge-danger">Borrador</span>

                @break

            @case(2)
                
                <span class="badge badge-warning">Elaboración</span>

                @break

            @case(3)

                <span class="badge badge-primary">Culminado</span>

                @break
            
        @endswitch
    
    </p>
    
    <a href="{{route('admin.cursos.edit', $curso)}}" class="btn btn-success mb-0">Editar información</a>

    @switch($curso->status)
        @case(1)

            {!! Form::open(['route' => ['admin.cursos.status', $curso], 'class' => 'd-inline']) !!}
                {!! Form::submit('Publicar curso', ['class' => 'btn btn-dark']) !!}
            {!! Form::close() !!}

            @break
        @case(2)
            
            {!! Form::open(['route' => ['admin.cursos.status', $curso], 'class' => 'd-inline']) !!}
                {!! Form::submit('Marcar como culminado', ['class' => 'btn btn-dark']) !!}
            {!! Form::close() !!}

            @break


        @default

         
            
    @endswitch
    
</div>

@endsection


@section('content')

<div id="app">
    <div class="container-fluid">

        <div class="row">

            <div class="col-12 col-lg-4 order-lg-2">
                @if ($curso->picture)
                    <figure class="img-curso">
                        <img src="{{asset($curso->picture)}}" alt="" class="rounded">
                    </figure>
                @endif

                <form action="{{route('admin.cursos.dropzone', $curso)}}" method="POST" class="dropzone mb-4" id="my-dropzone">
                </form>

                

                <button type="button" class="btn btn-primary btn-block mb-2" data-toggle="modal" data-target="#requisitosCreate">
                    Agregar un nuevo requisito
                </button>
                

                <section class="mt-4">
                    @include('admin.requisitos.show')
                </section>

            </div>


            <div class="col-12 col-lg-8">
                <section>
                    @include('admin.metas.index')
                </section>

                <section>
                    @include('admin.modulos.index')
                </section>
                
            </div>

            
        </div>
    </div>


    @include('admin.metas.create')
    @include('admin.metas.edit')

    @include('admin.modulos.create')
    @include('admin.modulos.edit')

    @include('admin.requisitos.create')
    @include('admin.requisitos.edit')

    @include('admin.videos.create')

</div>

@endsection

@section('script')

<script src="{{asset('plugins/dropzone-5.7.0/dist/min/dropzone.min.js')}}"></script>

<script>

    new Vue({
        el: '#app',
        data:{
            curso: "",

            meta_name: "",
            meta_id: "",

            requisito_name: "",
            requisito_id: "",

            modulo_name: "",
            modulo_id: "",

            video_name: "",
            video_descripcion: "",
            video_iframe: "",
        },
        created(){

            this.getCurso();

        },
        methods:{

            getCurso(){
                axios.post("{{route('api.cursos', $curso)}}")
                .then(response => {
                    this.curso = response.data
                })
            },

            /* -------------------------------------------------------------- */

            metasStore() {

                $('#metasCreate .spinner-border').removeClass('d-none');

                axios.post('/admin/metas', {
                    curso_id: "{{$curso->id}}",
                    name: this.meta_name,

                }).then(response => {
                    
                    this.meta_name = "";
                    this.creado_exito('#metasCreate')

                }).catch(error => {

                    this.mensaje_error('#metasCreate')

                })
              

            },
            
            metasEdit(meta){
                this.meta_name = meta.name;
                this.meta_id = meta.id;
            },
            
            metasUpdate(){

                $('#metasEdit .spinner-border').removeClass('d-none');

                axios.put('/admin/metas/' + this.meta_id, {
                    
                    name: this.meta_name,

                }).then(response => {
                    
                    this.meta_name = "";
                    this.meta_id = "";
                    
                    this.actualizado_exito('#metasEdit')

                }).catch(error => {

                    this.mensaje_error('#metasEdit')

                })
            },

            metasDestroy(meta){

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

                        var url = "/admin/metas/" + meta.id;

                        axios.delete(url).then(response => {

                            this.getCurso();

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

            /* -------------------------------------------------------------- */

            modulosStore() {

                $('#modulosCreate .spinner-border').removeClass('d-none');
                
                axios.post("/admin/modulos", {
                    curso_id: "{{$curso->id}}",
                    name: this.modulo_name,
                }).then(response => {

                    this.modulo_name = "";
                    this.creado_exito('#modulosCreate');

                }).catch(error => {

                    this.mensaje_error('#modulosCreate');
                    
                })

            },

            modulosEdit(modulo){
                this.modulo_name = modulo.name;
                this.modulo_id = modulo.id;
            },

            modulosUpdate(){

                $('#modulosEdit .spinner-border').removeClass('d-none');
                
                axios.put('/admin/modulos/' + this.modulo_id, {
                    name: this.modulo_name,
                }).then(response => {

                    this.modulo_name = "";
                    this.modulo_id = "";

                    this.actualizado_exito('#modulosEdit')

                }).catch(error => {
                    this.mensaje_error('#modulosEdit')
                })
            },

            modulosDestroy(modulo){

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

                        var url = "/admin/modulos/" + modulo.id;

                        axios.delete(url).then(response => {

                            this.getCurso();

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

            
            /* -------------------------------------------------------------- */

            requisitosStore() {

                $('#requisitosCreate .spinner-border').removeClass('d-none');

                axios.post("/admin/requisitos", {
                    curso_id: "{{$curso->id}}",
                    name: this.requisito_name,
                }).then(response => {
                    
                    this.requisito_name = "";
                    this.creado_exito('#requisitosCreate')

                }).catch(error => {
                    this.mensaje_error('#requisitosCreate')
                })

            },

            requisitosEdit(requisito){
                this.requisito_name = requisito.name;
                this.requisito_id = requisito.id;
            },

            requisitosUpdate(){

                $('#requisitosEdit .spinner-border').removeClass('d-none');

                axios.put('/admin/requisitos/' + this.requisito_id, {
                    name: this.requisito_name,
                }).then(response => {

                    this.requisito_name = "";
                    this.requisito_id = "";

                    this.actualizado_exito('#requisitosEdit')

                }).catch(error => {
                    this.mensaje_error('#requisitosEdit')
                })
            },


            requisitosDestroy(requisito){

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

                        var url = "/admin/requisitos/" + requisito.id;

                        axios.delete(url).then(response => {

                            this.getCurso();

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


            /* -------------------------------------------------------------- */

            videosStore(){

                $('#videosCreate .spinner-border').removeClass('d-none');

                axios.post('/admin/videos', {

                    modulo_id: this.modulo_id,
                    name: this.video_name,
                    descripcion: this.video_descripcion,
                    iframe: this.video_iframe,

                }).then(response => {

                    this.video_name = "";
                    this.video_descripcion = "";
                    this.video_iframe = "";
                    this.modulo_id = "";

                    this.creado_exito('#videosCreate');

                }).catch(error => {

                    this.mensaje_error('#videosCreate');
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

                        var url = "/admin/videos/" + video.slug;

                        axios.delete(url).then(response => {

                            this.getCurso();

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

            /* -------------------------------------------------------------- */

            creado_exito(create){

                this.getCurso();

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

                this.getCurso();

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
    })

    //dropzone
    Dropzone.options.myDropzone = {
        dictDefaultMessage: 'Arrastre una foto para agregar o cambiar de foto',
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}"
        },
        acceptedFiles: 'image/*',
        maxFilesize: 1,
        maxFiles: 1,
        paramName: 'picture',
    };

</script>

@endsection