<footer class="bg-white shadow mt-5 py-2">

    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-between align-items-center">
                <a class="navbar-brand text-secondary d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{asset('img/layouts/logo.png')}}" alt="" height="24px">
                    <span class="font-weight-bold ml-1">Coders</span>Free
                </a>

                <ul class="d-flex list-unstyled mb-0">
                    <li class="mr-2">
                        <a class="text-info" href="{{route('politicas.index')}}">Políticas y privacidad</a>
                    </li>

                    <li>
                        <a class="text-info" href="{{route('condiciones.index')}}">Terminos y condiciones</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


</footer>