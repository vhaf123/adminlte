@extends('layouts.app')

@section('title', 'Contáctanos')

@section('style')
    
@endsection

@section('content')
<main class="pt-4">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-7 mb-3 mb-md-0">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h3 font-weight-bold card-title">Ponte en contácto</h1>
                        <p class="card-text">Complete el formulario y nos pondremos en contácto lo más pronto posible</p>

                        <form action="">
                            <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Excribe tu nombre" aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                                <label for="nombre">Correo</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Excribe tu correo" aria-describedby="helpId">
                            </div>

                            <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Escribe tu teléfono" aria-describedby="helpId">
                            </div>


                            <div class="form-group">
                                <label for="">Mensaje</label>
                                <textarea class="form-control" name="" id="" rows="3" placeholder="Escribe tu mensaje"></textarea>
                            </div>

                            <button type="submit" class="btn btn-danger font-weight-bold">Envíar mensaje</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5 px-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h4 cart-title font-weight-bold">Contáctanos</h1>
                        <p class="card-text mb-2">Si deseas, también puedes escribirnos a nuestro correo electrónico</p>
                        <address>
                            <a href="">victor.aranaf92@gmail.com</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
    
@endsection