<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-accordion-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            
            @can('users.index', 'roles.index', 'business.index', 'business.create', 'business.destroy')
            <li class="nav-item start {{    request()->is('users*') ||
                                            request()->is('roles*') ||
                                            request()->is('business') ||
                                            request()->is('business/create')

                                            ? 'active open' : '' }}">

                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-desktop"></i>
                    <span class="title">Administración</span>
                    <span class="arrow {{   request()->is('users*') ||
                                            request()->is('roles*') ||
                                            request()->is('business') ||
                                            request()->is('business/create')

                                            ? 'open' : '' }}"></span>
                </a>

                <ul class="sub-menu">
                    @can('roles.index')
                    <li class="nav-item {{ request()->is('roles*') ? 'active open' : '' }}">
                        <a href="{{ route('roles.index') }}" class="nav-link ">
                            <span class="title">Roles</span>
                        </a>
                    </li>
                    @endcan

                    @can('users.index')
                    <li class="nav-item start {{ request()->is('users*') ? 'active open' : '' }}">
                        <a href="{{ route('users.index') }}" class="nav-link ">
                            <span class="title">Usuarios</span>
                        </a>
                    </li>
                    @endcan

                    @can('business.index')
                    <li class="nav-item {{  request()->is('business') ||
                                            request()->is('business/create') ? 'active open' : '' }}">
                        <a href="{{ route('business.index') }}" class="nav-link ">
                            <span class="title">Empresas</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('business.edit')
            <li class="nav-item start {{    request()->is('announcements*')||
                                            request()->is('info') 
                                            ? 'active open' : '' }}">

                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-desktop"></i>
                    <span class="title">Administración</span>
                    <span class="arrow {{   request()->is('announcements*') ||
                                            request()->is('info')         
                                            ? 'open' : '' }}"></span>
                </a>

                <ul class="sub-menu">
                    @can('announcements.index')
                    <li class="nav-item {{ request()->is('announcements*') ? 'active open' : '' }}">
                        <a href="{{ route('announcements.index') }}" class="nav-link ">
                            <span class="title">Convocatorias</span>
                        </a>
                    </li>
                    @endcan

                    @can('business.edit')
                    <li class="nav-item {{ request()->is('info') ? 'active open' : '' }}">
                        <a href="{{ route('business.edit') }}" class="nav-link ">
                            <span class="title">Empresa</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('applicants.edit', 'education.index', 'trainings.index', 'experiences.index')
            <li class="nav-item {{  request()->is('about')         ||
                                    request()->is('education*')   ||
                                    request()->is('trainings*')   ||
                                    request()->is('experiences*')     
                                    
                                    ? 'active open' : '' }}">

                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">Perfil</span>
                    <span class="arrow {{   request()->is('about')         ||
                                            request()->is('education*')   ||
                                            request()->is('trainings*')   ||
                                            request()->is('experiences*') 
                                            
                                            ? 'active open' : '' }}"></span>
                </a>

                <ul class="sub-menu">
                    @can('applicants.edit')
                    <li class="nav-item {{ request()->is('about') ? 'active open' : '' }}">
                        <a href="{{ route('applicants.edit') }}" class="nav-link ">
                            <span class="title">Datos</span>
                        </a>
                    </li>
                    @endcan

                    @can('education.index')
                    <li class="nav-item {{ request()->is('education*') ? 'active open' : '' }}">
                        <a href="{{ route('education.index') }}" class="nav-link ">
                            <span class="title">Estudios</span>
                        </a>
                    </li>
                    @endcan

                    @can('trainings.index')
                    <li class="nav-item {{ request()->is('trainings*') ? 'active open' : '' }}">
                        <a href="{{ route('trainings.index') }}" class="nav-link ">
                            <span class="title">Capacitaciones</span>
                        </a>
                    </li>
                    @endcan

                    @can('experiences.index')
                    <li class="nav-item {{ request()->is('experiences*') ? 'active open' : '' }}">
                        <a href="{{ route('experiences.index') }}" class="nav-link ">
                            <span class="title">Experiencia Laboral</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan

            @can('documents.edit', 'records.index', 'announcements.index')
            <li class="nav-item {{  request()->is('documents')     ||    
                                    request()->is('announcements') ||    
                                    request()->is('curriculum')    ||
                                    request()->is('applications')
                                    ? 'active open' : '' }}">

                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-folder-open"></i>
                    <span class="title">Portafolio</span>
                    <span class="arrow {{   request()->is('documents')     ||
                                            request()->is('announcements') ||    
                                            request()->is('curriculum')    || 
                                            request()->is('applications')
                                            ? 'active open' : '' }}"></span>
                </a>

                <ul class="sub-menu">

                    @can('announcements.index')
                    <li class="nav-item {{ request()->is('announcements') ? 'active open' : '' }}">
                        <a href="{{ route('announcements.index') }}" class="nav-link ">
                            <span class="title">Convocatorias</span>
                        </a>
                    </li>
                    @endcan

                    @can('records.index')
                    <li class="nav-item {{ request()->is('applications') ? 'active open' : '' }}">
                        <a href="{{ route('records.see') }}" class="nav-link ">
                            <span class="title">Postulaciones</span>
                        </a>
                    </li>
                    @endcan

                    @can('documents.edit')
                    <li class="nav-item {{ request()->is('documents') ? 'active open' : '' }}">
                        <a href="{{ route('documents.edit') }}" class="nav-link ">
                            <span class="title">Documentos</span>
                        </a>
                    </li>
                    @endcan
                    
                    @can('records.index')
                    <li class="nav-item {{ request()->is('curriculum') ? 'active open' : '' }}">
                        <a href="{{ route('records.index') }}" class="nav-link ">
                            <span class="title">Curriculum</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->