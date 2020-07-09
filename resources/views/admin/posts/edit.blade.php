@extends('admin.layouts.app')

@section('title', 'Editar post')

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

        .info i{
            width: 20px;
            text-align: center;
        }

    </style>
@endsection

@section('breadcrumbs')

    <div class="container-fluid">
        <div class="row mb-2 flex-wrap">
            <div class="col-12 col-md-4">
                <h1>Detalle de post</h1>
            </div>

            <div class="col-12 col-md-8">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Posts</a></li>
                    <li class="breadcrumb-item active">{{$post->name}}</li>
                </ol>
            </div>
        </div>
    </div>

@endsection



@section('content')

<main>
    <div class="container-fluid">
        <div class="row" id="app">

            <div class="col-12 order-1 d-none alerta">
                <div class="alert alert-danger" role="alert">
                    <strong>Para poder publicar un post, primero debe completar todos los campos. Si ya los completó, asegurese de haber guardado los cambios</strong>
                </div>
            </div>

            <div class="col-12 col-lg-8 order-3 order-lg-2">

                {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' => 'put', 'id' => 'formulario']) !!}
                    <div class="card">
                        <div class="card-body">
                            
                            {{-- Titulo --}}
                            <h1 class="h5">
                                Título: 
                            </h1>

                            <div class="form-group">
                                {!! Form::text('name', null, ['class' => 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ), 'placeholder' => 'Escriba el título del post']) !!}
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Extracto --}}
                            <h1 class="h5">
                                Extracto:
                            </h1>

                            <div class="form-group">

                                {!! Form::textarea('extracto', null, ['class' => 'form-control'. ( $errors->has('extracto') ? ' is-invalid' : '' ), 'placeholder' => 'Escriba un pequeño extracto del post', 'required', 'rows' => '3']) !!}

                                @error('extracto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Body --}}
                            <h1 class="h5">
                                Contenido:
                            </h1>

                            <div class="form-group">
                                {!! Form::textarea('body', null, ['class' => 'form-control my-editor'. ( $errors->has('body') ? ' is-invalid' : '' ), 'placeholder' => 'Escriba el contenido principal del post']) !!}
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                                
                            {{-- Categorias --}}
                            <h1 class="h5">
                                Categorias:
                            </h1>

                            <div class="card shadow @error('tags') border border-danger @enderror" style="background-color: #D6DEE8">
                                
                                <div class="card-body">
                                    <div class="form-row">
                                        @foreach ($tags as $tag)
                                            <div class="form-group col-4 mb-0">
                                                <label>
                                                    {!! Form::checkbox('tags[]', $tag->id, null) !!}
                                                    {{$tag->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            @error('tags')
                                <small class="text-danger">
                                    <strong>Tiene que seleccionar al menos una categoría</strong>
                                </small>    
                            @enderror
                        
                        </div>
                    </div>

                    <h1 class="h4">
                        SEO:
                    </h1>

                    <div class="card">
                        <div class="card-body">
                            {{-- Title --}}

                            <h1 class="h5">
                                Title:
                            </h1>

                            <div class="form-group">
                                {!! Form::text('title', null, ['class' => 'form-control'. ( $errors->has('title') ? ' is-invalid' : '' ), 'placeholder' => 'Escriba el contenido de la etiqueta title', 'required']) !!}
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <h1 class="h5">
                                Description:
                            </h1>

                            <div class="form-group">

                                {!! Form::textarea('description', null, ['class' => 'form-control'. ( $errors->has('description') ? ' is-invalid' : '' ), 'placeholder' => 'Escriba el contenido de la metaetiqueta description', 'required', 'rows' => '3']) !!}

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>


            <div class="col-12 col-lg-4 order-2 order-lg-3">

                <div class="card info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <p class="mb-0">
                                <i class="fas fa-key mr-2" :class="estado=='Publicado'? 'text-success' : ''"></i>
                                Estado: <b>@{{estado}}</b>
                            </p>
                            <a href="" class="ml-3" v-on:click.prevent = "getstatus()">Cambiar</a>
                        </div>

                        <p class="mb-2">
                            <i class="far fa-eye mr-2"></i>
                            Visualizaciónes: <b>{{$post->contador}}</b>
                        </p>

                        <p class="mb-2">
                            <i class="far fa-calendar-alt mr-2"></i>
                            Fecha creación: <b>{{$post->created_at->format('d/m/y')}}</b>
                        </p>

                        <p>
                            <i class="fas fa-calendar-alt mr-2"></i>
                            Fecha modificación: <b>{{$post->updated_at->format('d/m/y')}}</b>
                        </p>

                        @if ($post->picture)
                            <figure class="img-curso">
                                <img src="{{asset($post->picture)}}" alt="" class="rounded">
                            </figure>
                        @endif

                        <button class="btn btn-block btn-primary" id="enviar_formulario">Actualizar</button>

                        <a href="{{route('admin.posts.vista', $post)}}" class="btn btn-success btn-block" target="_blank">Vista previa</a>

                        {!! Form::open(['route' => ['admin.posts.destroy', $post], 'method' => 'delete','class' => 'mt-2']) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                        
                    </div>
                </div>

                <form action="{{route('admin.posts.dropzone', $post)}}" method="POST" class="dropzone mb-4" id="my-dropzone">
                </form>

            </div>
        </div>
    </div>
</main>


@endsection

@section('script')

    <script src="{{asset('plugins/dropzone-5.7.0/dist/min/dropzone.min.js')}}"></script>
    
    {{-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> --}}
    <script src="{{asset('plugins/tinymce/tinymce.min.js')}}"></script>

    <script>
        
        var editor_config = {
            language: 'es',
            path_absolute : "/",
            selector: "textarea.my-editor",
            content_css: "{{ asset('css/app.css') }}",
            plugins: [
            "autosave",
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | restoredraft",
            relative_urls: false,
            autosave_interval: "30s",
            file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"});
            }
        };

        tinymce.init(editor_config);

        //Dropzone
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

        new Vue({
            el: '#app',
            data:{
                estado: "{{$post->estado}}",                
            },
            methods:{
                getstatus(){

                    
                    axios.post("{{route('admin.posts.status', $post)}}").then(response => {

                        if(response.data == "error"){
                            $('.alerta').removeClass('d-none');
                        }else{
                        
                            switch (this.estado) {
                                case "Publicado":
                                    this.estado = "Borrador"
                                    break;
                                
                                case "Borrador":
                                    this.estado = "Publicado"
                                    break;
                            }

                            $('.alerta').addClass('d-none');
                        }

                    }).catch(error => {

                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '¡Algo salió mal!',
                        })

                    })

                    
                },

                
            }
        })

        $('#enviar_formulario').click(function(){
            $('#formulario').submit();
        });

        

    </script>

    @if ($errors->any())
        <script>
            toastr.error("No puede dejar campos en blanco cuando el artículo esta publicado")
        </script>
    @endif

@endsection