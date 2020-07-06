<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">

        {{-- <img src="{{asset('img/layouts/logo.png')}}" alt="" height="40px"> --}}
        <img src="{{asset('img/layouts/logo_2.png')}}"
            alt="AdminLTE Logo"
            class="brand-image"
            style="opacity: .8">
        {{-- <span class="brand-text font-weight-light">CodersFREE</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{route('admin.home')}}" class="nav-link {{setactive('admin.home')}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                @can('admin.users.index')

                    <li class="nav-item">
                        <a href="{{route('admin.users.index')}}" class="nav-link {{setactive('admin.users.*')}}">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>Asignar un rol</p>
                        </a>
                    </li>

                @endcan

                @can('admin.users.index')

                    <li class="nav-item">
                        <a href="{{route('admin.categorias.index')}}" class="nav-link {{setactive('admin.categorias.*')}}">
                            <i class="nav-icon fas fa-brain"></i>
                            <p>Categorías</p>
                        </a>
                    </li>

                @endcan

                <li class="nav-header">ROLES DE USUARIO</li>

                @can('admin.cursos.index')
                    <li class="nav-item has-treeview {{setOpen2('admin.cursos.*', 'admin.modulos.*')}}">
                        <a href="#" class="nav-link {{setactive2('admin.cursos.*', 'admin.modulos.*')}}">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                Cursos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.cursos.index')}}" class="nav-link {{setactive('admin.cursos.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista de cursos</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{route('admin.cursos.create')}}" class="nav-link {{setactive('admin.cursos.create')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear nuevo curso</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                    
                @can('admin.manuales.index')
                    <li class="nav-item has-treeview {{setOpen2('admin.manuales.*', 'admin.temas.*')}}">
                        <a href="#" class="nav-link {{setactive2('admin.manuales.*', 'admin.temas.*')}}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Manuales
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.manuales.index')}}" class="nav-link {{setactive('admin.manuales.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista de manuales</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{route('admin.manuales.create')}}" class="nav-link {{setactive('admin.manuales.create')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear nuevo manual</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                    
                @can('admin.posts.index')
                    <li class="nav-item has-treeview {{setOpen('admin.posts.*')}}">
                        <a href="#" class="nav-link {{setactive('admin.posts.*')}}">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                Blog
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.posts.index')}}" class="nav-link {{setactive('admin.posts.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista de posts</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{route('admin.posts.create')}}" class="nav-link {{setactive('admin.posts.create')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear nuevo post</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

            </ul>
           
        </nav>
    </div>
    
</aside>