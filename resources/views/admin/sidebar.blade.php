<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header">
        <a class="fw-semibold text-dual" href="{{ url('/') }}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">ADMINISTRATION</span>
        </a>
        <div>
            <!--button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                data-action="dark_mode_toggle">
                <i class="far fa-moon"></i>
            </button-->
            <div class="dropdown d-inline-block ms-1">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-circle"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm smini-hide border-0"
                    aria-labelledby="sidebar-themes-dropdown">
                   <div class="text-muted text-xs p-1 px-3">

                    THEME
                   </div>
                    <!--a class="dropdown-item d-flex align-items-center justify-content-between fw-medium active"
                        data-toggle="theme" data-theme="default"
                        href="https://demo.pixelcave.com/oneui/be_pages_dashboard.html#">
                        <span>Default</span>
                        <i class="fa fa-circle text-default"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/amethyst.min-5.1.css"
                        href="https://demo.pixelcave.com/oneui/be_pages_dashboard.html#">
                        <span>Amethyst</span>
                        <i class="fa fa-circle text-amethyst"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/city.min-5.1.css"
                        href="https://demo.pixelcave.com/oneui/be_pages_dashboard.html#">
                        <span>City</span>
                        <i class="fa fa-circle text-city"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/flat.min-5.1.css"
                        href="https://demo.pixelcave.com/oneui/be_pages_dashboard.html#">
                        <span>Flat</span>
                        <i class="fa fa-circle text-flat"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/modern.min-5.1.css"
                        href="https://demo.pixelcave.com/oneui/be_pages_dashboard.html#">
                        <span>Modern</span>
                        <i class="fa fa-circle text-modern"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/smooth.min-5.1.css"
                        href="https://demo.pixelcave.com/oneui/be_pages_dashboard.html#">
                        <span>Smooth</span>
                        <i class="fa fa-circle text-smooth"></i>
                    </a-->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_light"
                        href="javascript:void(0)">
                        <span>Menu Claire</span>
                    </a>
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_dark"
                        href="javascript:void(0)">
                        <span>Menu sombre</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_light"
                        href="javascript:void(0)">
                        <span>Entête Claire</span>
                    </a>
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_dark"
                        href="javascript:void(0)">
                        <span>Entête sombre</span>
                    </a>
                </div>
            </div>
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
        </div>
    </div>
    <div class="js-sidebar-scroll" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <div class="content-side">
                                <ul class="nav-main">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link {{ (isset($page) && $page=="tb") ?"active":NULL }}"
                                            href="{{ url('admin')}}">
                                            <i class="nav-main-link-icon si si-speedometer"></i>
                                            <span class="nav-main-link-name">Tableau de bord</span>
                                        </a>
                                    </li>
                                    @foreach ($laravelAdminMenus->menus as $section)
                                    @if ($section->items && $section->section!='Gestions des utilisateurs')
                                    
                                    <li class="nav-main-heading"> {{ $section->section }}</li>
                                    @foreach ($section->items as $menu)
                                        <li class="nav-main-item ">
                                        <a class="nav-main-link nav-main-link-submenu_ {{ (isset($page) && $page==$menu->menu) ?"active":NULL }}" 
                                            href="{{ url($menu->url) }}">
                                            
                                            {!! isset($menu->icone)?"<i class='nav-main-link-icon ".$menu->icone."'></i>":"<i class='nav-main-link-icon  si si-layers'></i>" !!}
                                            <span class="nav-main-link-name">{{ isset($menu->title)?$menu->title:'' }}</span>
                                        </a>                                       
                                        </li>
                                        @endforeach  
                                        @elseif($section->items && $section->section=='Gestions des utilisateurs' && (Auth::user()->hasRole('SuperU') || Auth::user()->hasRole('Admin')))                                   
                                        <li class="nav-main-heading"> {{ $section->section }}</li>
                                        @foreach ($section->items as $menu)
                                        <li class="nav-main-item ">
                                        <a class="nav-main-link nav-main-link-submenu_ {{ (isset($page) && $page==$menu->menu) ?"active":NULL }}" 
                                            href="{{ url($menu->url) }}">
                                            
                                            {!! isset($menu->icone)?"<i class='nav-main-link-icon ".$menu->icone."'></i>":"<i class='nav-main-link-icon  si si-layers'></i>" !!}
                                            <span class="nav-main-link-name">{{ isset($menu->title)?$menu->title:'' }}</span>
                                        </a>                                       
                                        </li>
                                        @endforeach  
                                        @endif
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 695px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                style="height: 693px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
</nav>
<!--div class="col-md-3">
    @foreach ($laravelAdminMenus->menus as $section)
        @if ($section->items)
            <div class="card">
                <div class="card-header">
                    {{ $section->section }}
                </div>

                <div class="card-body">
                    <ul class="nav flex-column" role="tablist">
                        @foreach ($section->items as $menu)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{ url($menu->url) }}">
                                    {{ $menu->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br/>
        @endif
    @endforeach
</div-->
