<nav class="border-top d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col">

                {{-- Menu --}}
                <ul class="nav nav-principal">

                    {{-- Home --}}
                    <li class="nav-item {{setActive('home')}}">
                      <a class="nav-link" href="{{route('home')}}">
                        <i class="fas fa-laptop-house"></i>
                        Home
                      </a>
                    </li>

                    {{-- Cursos --}}
                    <li class="nav-item {{setActive('cursos.*')}}">
                        <a class="nav-link" href="{{route('cursos.index')}}">
                          <i class="fas fa-laptop"></i>
                          Cursos
                        </a>
                    </li>

                    {{-- Manuales --}}
                    <li class="nav-item {{setActive('manuales.*')}}">
                      <a class="nav-link" href="{{route('manuales.index')}}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Manuales
                      </a>
                    </li>

                   

                    {{-- Contáctanos --}}
                    <li class="nav-item {{setActive('contactanos.index')}}">
                      <a class="nav-link" href="{{route('contactanos.index')}}">
                        <i class="far fa-address-card"></i>
                        Contáctanos
                      </a>
                    </li>

                    {{-- Blog --}}
                    <li class="nav-item {{setActive('blog.*')}}">
                      <a class="nav-link" href="{{route('blog.index')}}">
                        <i class="fas fa-blog"></i>
                        Blog
                      </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>