@extends('admin.layouts.app')

@section('title')
    {{$capitulo->name}}
@endsection

@section('style')

@endsection

@section('breadcrumbs')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="{{route('admin.manuales.show', $capitulo->manual)}}">{{$capitulo->manual->name}}</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$capitulo->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

@endsection

@section('content')

<div id="app">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                @include('admin.temas.create')
                
                <ul class="list-unstyled">
                    <li v-for = "tema in capitulo.temas" class="mb-3">
                        
                        
                        <div class="card">

                            <div class="card-header bg-dark d-flex align-items-center">

                                <h1 class="h5 mb-0">@{{tema.name}}</h1>


                                <a :href="'/admin/temas/' + tema.slug + '/edit'" class="btn btn-primary ml-auto btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button class="btn btn-danger ml-2 btn-sm" v-on:click = "temasDestroy(tema)">
                                    <i class="fas fa-times"></i>
                                </button>


                            </div>

                            <div class="card-body" v-html = "tema.body">
                            </div>

                            <div class="card-footer d-flex">
                                <a :href="'/admin/temas/' + tema.slug + '/edit'" class="btn btn-primary btn-block">Editar</a>
                    
                                
                            </div>
                        </div>

                    </li>
                </ul>

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
            capitulo: [],
            name: "",
            descripcion: ""
        },
        created(){
            this.getCapitulo();
        },
        methods: {
            getCapitulo() {
            
                axios
                .get("{{route('api.capitulos', $capitulo)}}")
                .then(response => {
                    this.capitulo = response.data
                })
            },
            
            temasStore(){
                $('#temasCreate .spinner-border').removeClass('d-none');

                
                
                axios.post('/admin/temas', {

                    capitulo_id: "{{$capitulo->id}}",
                    name: this.name,
                    descripcion: this.descripcion,

                }).then(response => {
                    
                    this.name = "";
                    this.descripcion = "";
                    
                    $('#temasCreate .spinner-border').addClass('d-none');

                    Swal.fire({
                        icon: 'success',
                        title: '¡Creado con éxito!',
                        text: 'Su archivo se creó con exito',
                    });

                    this.getCapitulo();                    

                }).catch(error => {

                    $('#temasCreate .spinner-border').addClass('d-none');

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '¡Algo salió mal!',
                    })

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

                        var url = "/admin/temas/" + tema.slug;

                        axios.delete(url).then(response => {

                            this.getCapitulo();

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

        }
    });

</script>

    
    
@endsection