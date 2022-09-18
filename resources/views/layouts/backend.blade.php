<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') - Administration du site</title>

    <!-- Styles -->
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"-->

    <link rel="shortcut icon" href="{{ asset('storage/favicon.png')}}">

    <link rel="stylesheet" href="{{ asset('storage/assets/admin/css/backend.css') }}">

</head>

<body>

    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow side-trans-enabled">
        <div id="page-overlay"></div>
        
        @include('admin.sidebar')
        @section('header')
            <header id="page-header">
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout"
                            data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block"
                            data-toggle="layout" data-action="sidebar_mini_toggle">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-alt-secondary d-md-none" data-toggle="layout"
                            data-action="header_search_on">
                            <i class="fa fa-fw fa-search"></i>
                        </button>
                        <!--form class="d-none d-md-inline-block"
                            action="https://demo.pixelcave.com/oneui/be_pages_generic_search.html" method="POST">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-alt" placeholder="Search.."
                                    id="page-header-search-input2" name="page-header-search-input2">
                                <span class="input-group-text border-0">
                                    <i class="fa fa-fw fa-search"></i>
                                </span>
                            </div>
                        </form-->
                    </div>
                    @if(Auth::check())
                    <div class="d-flex align-items-center">
                        <div class="dropdown d-inline-block ms-2">
                            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                                id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img class="rounded-circle" src="{{ asset('storage/assets/admin/images/avatar10.jpg') }}"
                                    alt="Header Avatar" style="width: 21px;">
                                <span class="d-none d-sm-inline-block ms-2">{{ Auth::user()->name }} </span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                                aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb"
                                        src="{{ asset('storage/assets/admin/images/avatar10.jpg') }}" alt="">
                                    <p class="mt-2 mb-0 fw-medium">{{ Auth::user()->name }} <span class="caret"></span></p>
                                    <p class="mb-0 text-muted fs-sm fw-medium">
                                        @foreach(Auth::user()->roles as $key => $value)
                                            <span class="badge bg-secondary px-2 rounded-pill"> {{ $value->label }}</span>
                                        @endforeach    
                                    </p>
                                </div>
                                <!--div class="p-2">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                        href="https://demo.pixelcave.com/oneui/be_pages_generic_inbox.html">
                                        <span class="fs-sm fw-medium">Inbox</span>
                                        <span class="badge rounded-pill bg-primary ms-2">3</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                        href="https://demo.pixelcave.com/oneui/be_pages_generic_profile.html">
                                        <span class="fs-sm fw-medium">Profile</span>
                                        <span class="badge rounded-pill bg-primary ms-2">1</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                        href="javascript:void(0)">
                                        <span class="fs-sm fw-medium">Settings</span>
                                    </a>
                                </div-->
                                <div role="separator" class="dropdown-divider m-0"></div>
                                <div class="p-2">
                                    <!--a class="dropdown-item d-flex align-items-center justify-content-between"
                                        href="https://demo.pixelcave.com/oneui/op_auth_lock.html">
                                        <span class="fs-sm fw-medium">Lock Account</span>
                                    </a-->
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <span class="fs-sm fw-medium">Déconnexion</span>
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown d-inline-block ms-2">
                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-fw fa-bell"></i>
                                <span class="text-primary">•</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 border-0 fs-sm"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                                    <h5 class="dropdown-header text-uppercase">Notifications</h5>
                                </div>
                                <ul class="nav-items mb-0">
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-check-circle text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">You have a new follower</div>
                                                <span class="fw-medium text-muted">15 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">1 new sale, keep it up</div>
                                                <span class="fw-medium text-muted">22 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-times-circle text-danger"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">Update failed, restart server</div>
                                                <span class="fw-medium text-muted">26 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">2 new sales, keep it up</div>
                                                <span class="fw-medium text-muted">33 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-user-plus text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">You have a new subscriber</div>
                                                <span class="fw-medium text-muted">41 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                            <div class="flex-shrink-0 me-2 ms-3">
                                                <i class="fa fa-fw fa-check-circle text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 pe-2">
                                                <div class="fw-semibold">You have a new follower</div>
                                                <span class="fw-medium text-muted">42 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="p-2 border-top text-center">
                                    <a class="d-inline-block fw-medium" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-arrow-down me-1 opacity-50"></i> Load More..
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div id="page-header-search" class="overlay-header bg-body-extra-light">
                    <div class="content-header">
                        <form class="w-100" action="https://demo.pixelcave.com/oneui/be_pages_generic_search.html"
                            method="POST">
                            <div class="input-group">
                                <button type="button" class="btn btn-alt-danger" data-toggle="layout"
                                    data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.."
                                    id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
                <div id="page-header-loader" class="overlay-header bg-body-extra-light">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                </div>
            </header>
        @show
        
        <main id="main-container">
            @if (Session::has('flash_message'))
                <div class="rowmt-0 mt-0">
                    <div class="col-md-12">
                        <div class="alert alert-success mb-0 d-flex align-items-center" role="alert">
                            <div class="flex-shrink-0">
                                <i class="fa fa-fw fa-info-circle"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <p class="mb-0">
                                    {!! Session::get('flash_message') !!}
                                </p>
                              </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                         
                    </div>
                </div>
            @endif
            
            <div class="content">
                
            @section('sidebar')
                    <div
                        class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
                        <div class="flex-grow-1 mb-1 mb-md-0">
                            <h1 class="h3 fw-bold mb-2">
                                Tableau de bord
                            </h1>
                            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                                Soyez la Bienvenue <a class="fw-semibold"
                                    href="{{ url('profile') }}">{{ Auth::user()->name }}</a>.
                            </h2>
                        </div>
                    </div>
                    @show
                </div>
            
            <div class="content mb-5">
                @yield('content')
                
            </div>
        </main>
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                       Conçu avec <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
                            href="https://facebook.com/eteka.wilfried" target="_blank">Wilfried ETEKA</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        ©  <a class="fw-semibold" href="http://univ-parakou.bj" target="_blank">Université de Parakou</a> 
                        {{ date('Y') }}.
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('storage/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/app.js') }}"></script>
    <script src="{{ asset('storage/assets/admin/js/oneui.app.min-5.1.js') }}"></script>
    <script src="{{ asset('storage/assets/admin/js/chart.min.js') }}"></script>
    <script src="{{ asset('storage/assets/admin/js/be_pages_dashboard.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/ckeditor.js') }}"></script>
    <script>One.helpersOnLoad(['js-ckeditor5']);</script>
   
    @yield('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.1/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '.crud-richtext'
        });
    </script>
    <script type="text/javascript">
        $(function() {
            // Navigation active
            $('ul.navbar-nav a[href="{{ "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" }}"]').closest('li')
                .addClass('active');
        });
    </script>*
</body>

</html>

<!--body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        <li><a href="{{ url('/admin') }}">Dashboard <span class="sr-only">(current)</span></a></li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                                <li><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                                <li><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                        @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if (Session::has('flash_message'))
                <div class="container">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('flash_message') }}
                    </div>
                </div>
            @endif

           
        </main>

        <hr/>

        <div class="container">
            &copy; {{ date('Y') }}. Created by <a href="http://www.appzcoder.com">AppzCoder</a>
            <br/>
        </div>

    </div>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.1/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '.crud-richtext'
        });
    </script>
    <script type="text/javascript">
        $(function() {
            // Navigation active
            $('ul.navbar-nav a[href="{{ "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" }}"]').closest('li')
                .addClass('active');
        });
    </script>

-->
