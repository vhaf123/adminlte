@extends('admin.layouts.app')

@section('title')
    {{$tema->name}}
@endsection

@section('style')

    <style>

        .img-tema{
            position: relative;
            width: 100%;
        }

        .img-tema:before{
            content: '';
            display: block;
            /* padding-top: 56.25%; */
            padding-top: 75%;
        }

        .img-tema > img{
            position: absolute;
            z-index: 100;
            width: 100%;
            height: 100%;
            object-fit: cover;
            top: 0;
            left: 0;
        }

        .img-tema .iconos{
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 200;
        }

        .img-tema figcaption{
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            display: block;
            z-index: 200;
            overflow-y: scroll;
        }
       
    </style>
@endsection

@section('breadcrumbs')

    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.manuales.show', $tema->capitulo->manual)}}">{{$tema->capitulo->manual->name}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.capitulos.show', $tema->capitulo)}}">{{$tema->capitulo->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$tema->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col">

                <div class="card">
                    <div class="card-body">

                        {!! Form::model($tema, ['route' => ['admin.temas.update', $tema], 'method' => 'put', 'id' => 'formulario']) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Tema') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('descripcion', 'Descripcion') !!}
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('body', 'Cuerpo') !!}
                                {!! Form::textarea('body', null, ['class' => 'form-control my-editor', 'rows' => '16']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::submit('Acualizar', ['class' => 'btn btn-block btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                

            </div>


        </div>
    </div>

@endsection

@section('script')

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>

        var editor_config = {
            path_absolute : "/",
            selector: "textarea.my-editor",
            plugins: [
            "autosave",
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | restoredraft",
            relative_urls: false,
            autosave_interval: "5s",
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

        

        
        function autoload(){
            form = $('#formulario');

            $.ajax({
                type: form.attr("method"),
                url: form.attr("action"),
                data: form.serialize(),
                
                
                success: function(data){
                    
                },
                
            });


        }


        setInterval(autoload, 5000);

       
    </script>
 
    
@endsection