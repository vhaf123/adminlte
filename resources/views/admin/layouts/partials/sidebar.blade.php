<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('img/layouts/logo2.png')}}" alt="CodersFree Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Coders Free</span>
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
                            <i class="nav-icon fas fa-users"></i>
                            <p>Usuarios</p>
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
                            <i class="nav-icon fas fa-laptop-code"></i>
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
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
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

                    <li class="nav-item has-treeview {{setOpen('admin.tags.*')}}">
                        <a href="#" class="nav-link {{setactive('admin.tags.*')}}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Tags
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.tags.index')}}" class="nav-link {{setactive('admin.tags.index')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista de tags</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{route('admin.tags.create')}}" class="nav-link {{setactive('admin.tags.create')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear nuevo tag</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

            </ul>
           
        </nav>
    </div>
    
</aside>