<ul class="navbar-nav">
                            
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize nombre-usuario" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img src="{{asset(auth()->user()->picture)}}" alt="" class="img-thumbnail rounded-circle shadow-sm mr-1 user-img" id="">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right menu-usuario" aria-labelledby="navbarDropdown">

            <a class="dropdown-item" href="{{-- {{route('perfil.index', auth()->user())}} --}}">
                <i class="far fa-user"></i>
                Mi perfil
            </a>

            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                Cerrar sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
    
</ul>