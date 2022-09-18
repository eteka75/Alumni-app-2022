<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>@yield('title',"Accueil") - Plateforme des alumnis de l'Université de Parakou</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Cette plateforme vise à créer un réseau d'entraide entre les anciens étudiants de l'Université de Parakou">
    <meta name="keywords" content="Parakou, Etudiants, Association, Espace d'opportunité, formation, emplois, formation, études, Campus, Cohésion, partage, vie associative, distraction, aide et actions, cadre de l'administration">
    <meta name="author" content="ETEKA Wilfried">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/favicon-32x32.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/favicon-16x16.ico') }}">
    <!--link rel="manifest" href="site.webmanifest"-->
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!-- Page loading styles-->
    <style>
        .cs-footer{
            z-index: 200;
        }
        .bg-size-cover{z-index: 0;}
        .cs-page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }

        .cs-page-loading.active {
            opacity: 1;
            visibility: visible;
        }

        .cs-page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }

        .cs-page-loading.active>.cs-page-loading-inner {
            opacity: 1;
        }

        .cs-page-loading-inner>span {
            display: block;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: normal;
            color: #cf0d7f;
        }

        .cs-page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            border: .15em solid #cf0d7f;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }

        @-webkit-keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

    </style>
    <!-- Page loading scripts-->
    <script>
        (function() {
            window.onload = function() {
                var preloader = document.querySelector('.cs-page-loading');
                preloader.classList.remove('active');
                setTimeout(function() {
                    preloader.remove();
                }, 1000);
            };
        })();
    </script>
    <!-- Vendor Styles-->
    <!--link rel="stylesheet" media="screen"
        href="{{ asset('storage/assets/web/vendor/simplebar/dist/simplebar.min.css') }}" /-->
    <link rel="stylesheet" media="screen"
        href="{{ asset('storage/assets/web/vendor/tiny-slider/dist/tiny-slider.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('storage/assets/web/css/theme.min.css') }}">

</head>

<body>

    <div class="cs-page-loading active">
        <div class="cs-page-loading-inner">
            <div class="cs-page-spinner"></div><span>{{ __('Chargement') }}...</span>
        </div>
    </div>
    <style>
        .goog-te-banner-frame {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

        .goog-te-gadget-simple {
            /*background:#062c49 !important;border:0px none !important;*/
            background: #dadada33 !important;
            border: 1px solid #e6e6e624 !important;
            border-radius: 4px;
        }

        .goog-te-gadget img {
            height: 0px;
        }

        .goog-te-menu-value span {
            color: #ffffff;
        }

        .goog-te-menu-value span {
            color: #fff !important;
        }

    </style>


    <main id="main-app" class="cs-page-wrapper">
        <!-- Sign In Modal-->
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block rounded-0 mb-0">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('flash_message'))
<div class="alert alert-success alert-block rounded-0 mb-0">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block rounded-0 mb-0">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif



@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block rounded-0 mb-0">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif



@if ($message = Session::get('info'))
<div class="alert alert-info alert-block rounded-0 mb-0">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif

        @section('navbar')
            
        <div class="modal fade" id="modal-signin" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="cs-view show" id="modal-signin-view">
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" >
                            @csrf
                      
                        <div class="modal-header border-0 bg-darken px-4">
                            <h4 class="modal-title text-light">Se connecter</h4>
                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body px-4">
                            <p class="font-size-ms text-muted">Se cconnecter à votre compte en saisissant votre nom
                                d'utilisateur et mot de passe.</p>
                                <div class="input-group-overlay form-group">
                                    <div class="input-group-prepend-overlay"><span class="input-group-text"><i
                                                class="fe-mail"></i></span></div>
                                    <input id="email" type="email"
                                        class="form-control  prepended-form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                        required>
                                        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="input-group-overlay cs-password-toggle form-group">
                                    <div class="input-group-prepend-overlay"><span class="input-group-text"><i
                                                class="fe-lock"></i></span></div>
                                    <input
                                        class="form-control prepended-form-control @error('password') is-invalid @enderror"
                                        type="password" name="password" placeholder="Password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="fe-eye cs-password-toggle-indicator"></i><span
                                            class="sr-only">Afficher le mot de passe</span>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="keep-signed">
                                        <label class="custom-control-label" for="keep-signed">Rester connecté</label>
                                    </div><a class="nav-link-style font-size-ms" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Se connecter</button>
                                <p class="font-size-sm text-center pt-3 mb-0">Nouveau ? <a href='#'
                                        class='font-weight-medium' data-view='#modal-signup-view'>Créer un compte</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="cs-view" id="modal-signup-view">
                        <form method="POST" action="{{ route('register') }}" >
                            @csrf
                        <div class="modal-header border-0 bg-darken px-4">
                            <h4 class="modal-title text-light">Création de compte</h4>
                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body px-4">
                            <p class="font-size-ms text-muted">L'inscription est gratuite et ne prend que quelques minutes.</p>
                            
                                <div class="form-group">
                                    <input id="nom" type="text"
                                        class="form-control @error('nom') is-invalid @enderror" name="nom"
                                        value="{{ old('nom') }}" required autocomplete="nom"
                                        placeholder="Votre nom " autofocus>
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <input id="prenom" type="text"
                                        class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                        value="{{ old('prenom') }}" required autocomplete="prenom"
                                        placeholder="Votre prénom " autofocus>
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="email@domain.com" value="{{ old('email') }}" required
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="cs-password-toggle form-group">
                                    <input class="form-control" type="password"  id="password" type="password" placeholder="8caractères minimum" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="fe-eye cs-password-toggle-indicator"></i><span
                                            class="sr-only">Afficher le mot de passe</span>
                                    </label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="cs-password-toggle form-group">
                                    <input class="form-control"  id="password-confirm" type="password" placeholder="Confirmer le mot de passe" class="form-control @error('password') is-invalid @enderror"  type="password" placeholder="Confirmer mot de passe"  name="password_confirmation" required required>
                                    <label class="cs-password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="fe-eye cs-password-toggle-indicator"></i><span
                                            class="sr-only">Afficher le mot de passe</span>
                                    </label>
                                </div>
                  
                                <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                                <p class="font-size-sm text-center pt-3 mb-0">Already have an account? <a
                                        href='#' class='font-weight-medium'
                                        data-view='#modal-signin-view'>Sign in</a></p>
                                    </div>
                                </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Shopping cart off-canvas-->

        <!-- Navbar (Solid background + shadow)-->
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
        <header class="cs-header">
            <div class="topbar topbar-dark bg-darken">
                <div class="container d-md-flex align-items-center px-0 px-xl-3">
                    <div class="d-none d-md-block text-nowrap mr-3"><i
                            class="fe-phone font-size-base text-white mr-1 mt-n1"></i><span
                            class="text-white mr-2"></span><a class="topbar-link mr-1" href="tel:+22997000000">(+229) 97
                            00 00 00</a></div>
                    <div class="d-none d-md-block text-nowrap mr-3"><i
                            class="fe-mail font-size-base text-white mr-1 mt-n1"></i><span
                            class="text-white mr-2"></span><a class="topbar-link mr-1"
                            href="tel:9107848015">alunmiup@univ-parakou.bj</a></div>
                    <div class="d-flex text-md-right ml-md-auto"><a class="topbar-link pr-2 mr-4"
                            href="order-tracking.html"><i
                                class="fe-message-circle font-size-base opacity-60 mr-1"></i>Forum aux questions</a>
                        <div class="dropdown ml-auto ml-md-0 mr-3">
                            <div id="google_translate_element"></div>
                            <!--a class="topbar-link dropdown-toggle" href="#"
                                ><img class="mr-2" width="20"
                                    src="{{ asset('storage/assets/web/img/flags/fr.png') }}" alt="Français" />Français</a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><img
                                        class="mr-2" width="20"
                                        src="{{ asset('storage/assets/web/img/flags/en.png') }}"
                                        alt="English" />English</a>
                                <! ---a class="dropdown-item" href="#"><img class="mr-2" width="20"
                                        src="{{ asset('storage/assets/web/img/flags/de.png') }}"
                                        alt="Deutsch" />Deutsch</a-- >

                            </div-->
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="navbar navbar-expand-lg navbar-light bg-light navbar-box-shadow navbar-sticky"
                data-scroll-header>
                <form action="{{ route('search') }}" class="p-0 d-0 m-0" method="GET">
                    
                <div class="navbar-search bg-light">
                   
                    <div class="container d-flex flex-nowrap align-items-center"><i class="fe-search font-size-xl"></i>
                        <input autocomplete="OFF" class="form-control form-control-xl navbar-search-field" value="{{isset($search)?$search:''}}" name="search" type="text"
                            placeholder="Rechercher sur le site">
                        <div class="d-none d-sm-block flex-shrink-0 pl-2 mr-4 border-left border-right"
                            style="width: 10rem;">
                            <!--select class="form-control custom-select pl-2 pr-0" name="type">
                                <option value="all">Tout</option>
                                <option value="membre">Membres</option>
                                <option value="entreprise">Entreprises</option>
                                <option value="poste">Poste</option>
                            </select-->
                        </div>
                        <div class="d-flex align-items-center"><span
                                class="text-muted font-size-xs mt-1 d-none d-sm-inline">Fermer</span>
                            <button class="close p-2" type="button" data-toggle="search">&times;</button>
                        </div>
                    </div>
                  
                </div>
            </form>
                <div class="container px-0 px-xl-3">
                    <button class="navbar-toggler ml-n2 mr-4" type="button" data-toggle="offcanvas"
                        data-offcanvas-id="primaryMenu"><span class="navbar-toggler-icon"></span></button><a
                        class="navbar-brand order-lg-1 mx-auto ml-lg-0 pr-lg-2 mr-lg-4" href="{{url('/')}}"><img
                            class="d-none d-lg-block" width="153"
                            src="{{ asset('storage/assets/web/img/logo/logo-alumni-up.jpg') }}" alt="Aroussnd" /><img
                            class="d-lg-none" width="55"
                            src="{{ asset('storage/assets/web/img/logo/logo-alumni-mini.jpg') }}" alt="Around" /></a>
                            @Auth()
                            @php
                                $img=config('app.avatar.default');
                                if(Auth()->user()->profile_photo_path){
                                    $img=Auth()->user()->profile_photo_path;
                                }
                            @endphp
                            <div class="d-flex align-items-center order-lg-3 ml-lg-auto">
                                <div class="navbar-tool"><a class="navbar-tool-icon-box mr-2" href="#"
                                        data-toggle="search"><i class="fe-search"></i></a></div>
                                        <div class="border-left mr-2" style="height: 30px;"></div>
                            <div class="navbar-tool dropdown "><a class="navbar-tool-icon-box" href="{{ url('user/profil') }}"><img class="navbar-tool-icon-box-img_  img-fluid" src="{{ asset($img) }}" alt="Avatar"></a>
                                <a class="navbar-tool-label dropdown-toggle" href="{{ url('user/profil') }}"><small>{{ __('Bonjour') }},</small>{{ Auth()->user()->prenom }}</a>
                                <ul class="dropdown-menu dropdown-menu-right" style="width: 15rem;">
                                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('uprofil',Auth::user()->username) }}"><i class="fe-user font-size-base opacity-60 mr-2"></i>Mon profil</a></li>
                                    <!--li><a class="dropdown-item d-flex align-items-center" href="{{ url('notifications') }}"><i class="fe-message-square font-size-base opacity-60 mr-2"></i>Messages<span class="ml-auto font-size-xs text-muted">2</span></a></li-->
                                    <li><a class="dropdown-item d-flex align-items-center" href="{{ url('abonnees') }}"><i class="fe-users font-size-base opacity-60 mr-2"></i>Abonnées<span class="ml-auto font-size-xs text-muted">34</span></a></li>
                                    <li><a class="dropdown-item d-flex align-items-center" href="{{ url('opportunites') }}"><i class="fe-bookmark font-size-base opacity-60 mr-2"></i>Opportunités</a></li>
                                    <!--li><a class="dropdown-item d-flex align-items-center" href="{{ url('notifications') }}"><i class="fe-info font-size-base opacity-60 mr-2"></i>Notifications</a></li-->
                                    <li><a class="dropdown-item d-flex align-items-center" href="{{ url('favoris') }}"><i class="fe-heart font-size-base opacity-60 mr-2"></i>Favoris<!--span class="ml-auto font-size-xs text-muted">2</span--></a></li>
                                    <!--li><a class="dropdown-item d-flex align-items-center" href="{{ url('admin') }}"><i class="fe-shopping-bag font-size-base opacity-60 mr-2"></i>Administration</a></li-->
                                  <li class="dropdown-divider"></li>
                                  <!--li><a class="dropdown-item d-flex align-items-center" href="dashboard-sales.html"><i class="fe-dollar-sign font-size-base opacity-60 mr-2"></i>Sales<span class="ml-auto font-size-xs text-muted">$735.00</span></a></li>
                                  <li class="dropdown-divider"></li>
                                  <li><a class="dropdown-item d-flex align-items-center" href="dashboard-messages.html"><i class="fe-message-square font-size-base opacity-60 mr-2"></i>Messages<span class="nav-indicator"></span><span class="ml-auto font-size-xs text-muted">1</span></a></li>
                                  <li class="dropdown-divider"></li>
                                  <li class="dropdown-divider"></li>
                                  <li><a class="dropdown-item d-flex align-items-center" href="dashboard-reviews.html"><i class="fe-star font-size-base opacity-60 mr-2"></i>Reviews<span class="ml-auto font-size-xs text-muted">15</span></a></li>
                                  <li class="dropdown-divider"></li>
                                  <li><a class="dropdown-item d-flex align-items-center" href="dashboard-favorites.html"><i class="fe-heart font-size-base opacity-60 mr-2"></i>Favorites<span class="ml-auto font-size-xs text-muted">6</span></a></li>
                                  <li class="dropdown-divider"></li-->
                                  <li><a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fe-log-out font-size-base opacity-60 mr-2"></i>Se déconnecter</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                </ul>
                              </div>
                            </div>
                            @else
                            <div class="d-flex align-items-center order-lg-3 ml-lg-auto">
                        <div class="navbar-tool"><a class="navbar-tool-icon-box mr-2" href="#"
                                data-toggle="search"><i class="fe-search"></i></a></div>
                        <div class="border-left mr-2" style="height: 30px;"></div>
                        <a class="nav-link-style font-size-sm text-nowrap" href="{{ route('login') }}" data-toggle="modal_data-view=#modal-signin-view"><i class="fe-user font-size-xl mr-2"></i></a><a
                            class="btn btn-primary ml-grid-gutter d-none d-lg-inline-block" href="{{ route('register') }}"
                            data-toggle="modal_data-view=#modal-signup-view">Créer un compte</a>
                    </div>

                    @endauth


                    <div class="cs-offcanvas-collapse order-lg-2" id="primaryMenu">
                        <div class="cs-offcanvas-cap navbar-box-shadow">
                            <h5 class="mt-1 mb-0">Menu</h5>
                            <button class="close lead" type="button" data-toggle="offcanvas"
                                data-offcanvas-id="primaryMenu"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="cs-offcanvas-body">
                            <!-- Menu-->
                            <ul class="navbar-nav">
                                <li class="nav-item {{ isset($page) && $page == 'accueil' ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ url('/') }}"
                                        title="{{ 'Accueil' }}"><span class="fe-home d-none d-lg-inline"></span>
                                        <span class="d-lg-none d-inline">{{ __('Accueil') }}</span></a>
                                </li>
                                <li class="nav-item {{ isset($page) && $page == 'apropos' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('Apropos') }}"
                                        title="{{ __('A propos de la plateforme des Alumnis') }}">{{ __('A propos') }}</a>
                                </li>
                                <li class="nav-item {{ isset($page) && $page == 'annuaire' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('Annuaire') }}"
                                        title="{{ __('Annuaire') }}">{{ __('Annuaires') }}</a>
                                </li>
                                <li class="nav-item {{ isset($page) && $page == 'partenaires' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('Partenaires') }}"
                                        title="{{ __('Les partenaires') }}">{{ __('Partenaires') }}</a>
                                </li>
                                <li class="nav-item {{ isset($page) && $page == 'activites' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('Activites') }}"
                                        title="{{ __('Activités') }}">{{ __('Actualités') }}</a>
                                </li>
                                <!--li class="nav-item {{ isset($page) && $page == 'carrieres' ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('Carrieres') }}"
                                        title="{{ __('Carrières') }}">{{ __('Carières') }}</a>
                                </li-->
                                <li class="nav-item {{ isset($page) && $page == 'opportunites' ? 'active' : '' }}">
                                    <a class="nav-link"
                                        href="{{ route('Opportunites') }}">{{ __('Opportunités') }}</a>
                                </li>
                                <li class="nav-item {{ isset($page) && $page == 'contact' ? 'active' : '' }}">
                                    <a class="nav-link"
                                        href="{{ route('Contact') }}">{{ __('Contact') }}</a>
                                </li>
                                <!--li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                        >Account</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                                >Dashboard</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="dashboard-orders.html">Orders</a>
                                                </li>
                                                <li><a class="dropdown-item" href="dashboard-sales.html">Sales</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="dashboard-messages.html">Messages</a></li>
                                                <li><a class="dropdown-item"
                                                        href="dashboard-followers.html">Followers</a></li>
                                                <li><a class="dropdown-item" href="dashboard-reviews.html">Reviews</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="dashboard-favorites.html">Favorites</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                                >Account Settings</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="account-profile.html">Profile
                                                        Info</a></li>
                                                <li><a class="dropdown-item" href="account-payment.html">Payment
                                                        Methods</a></li>
                                                <li><a class="dropdown-item"
                                                        href="account-notifications.html">Notifications</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item" href="signin-illustration.html">Sign In -
                                                Illustration</a></li>
                                        <li><a class="dropdown-item" href="signin-image.html">Sign In - Image</a></li>
                                        <li><a class="dropdown-item" href="signin-signup.html">Sign In - Sign Up</a>
                                        </li>
                                        <li><a class="dropdown-item" href="password-recovery.html">Password
                                                Recovery</a></li>
                                    </ul>
                                </li-->
                            </ul>
                        </div>
                        @if(!Auth::user())    
                        <div class="cs-offcanvas-cap border-top"><a class="btn btn-translucent-primary btn-block"
                                href="{{ route('login') }}" data-toggle="modaldata-view=#modal-signin-view"><i
                                    class="fe-user font-size-lg mr-2"></i>Se connecter</a></div>
                        @endif

                    </div>
                </div>
            </div>
        </header>
    
    
    @show

    <div  class="bg-secondary ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @yield('sidebar')
                </div>
            </div>
        </div>
    </div>
    <div id="main" class="main">
        @yield('content')
    </div>
</main>
    <!-- Footer-->
    <footer class="cs-footer border-top bg-white  bg-darker_">

        <div class="pt-3">
            <div class="container py-sm-3 text-center ">
                <div class="d-sm-flex_ align-items-center  pb-3">

                    <div>
                        <ul class="list-inline font-size-sm pt-2 mb-3">
                            <li class="list-inline-item d-block d-sm-inline"><a class="nav-link-style nav-link-light_"
                                    href="{{ route('Apropos') }}">A propos</a>
                            </li>
                            <li class="list-inline-item d-block d-sm-inline"><a class="nav-link-style nav-link-light_"
                                    href="{{ route('Annuaire') }}">Annuaires</a>
                            </li>
                            <li class="list-inline-item d-block d-sm-inline"><a class="nav-link-style nav-link-light_"
                                    href="{{ route('Partenaires') }}">Partenaires</a></li>
                            <li class="list-inline-item d-block d-sm-inline"><a class="nav-link-style nav-link-light_"
                                    href="{{ route('Activites') }}">Actualités</a>
                            </li>
                            <li class="list-inline-item d-block d-sm-inline"><a class="nav-link-style nav-link-light_"
                                    href="{{ route('Carrieres') }}">Carrières</a>
                            </li>
                            <li class="list-inline-item d-block d-sm-inline"><a class="nav-link-style nav-link-light_"
                                    href="{{ route('Opportunites') }}">Opportunités</a></li>
                            <li class="list-inline-item d-block d-sm-inline"><a class="nav-link-style nav-link-light_"
                                    href="{{ route('Contact') }}">Contact</a>
                            </li>
                            <li class="list-inline-item d-block d-sm-inline"><a class="nav-link-style nav-link-light_"
                                href="{{ route('faq') }}">FAQ</a>
                        </li>
                        </ul>
                    </div>
                    <!--div class="d-flex pt-2 pt-sm-0 ml-auto"><a class="social-btn sb-twitter sb-light_ mr-2 mb-2"
                            href="#"><i class="fe-twitter"></i></a><a
                            class="social-btn sb-facebook sb-light mr-2 mb-2" href="#"><i
                                class="fe-facebook"></i></a></div-->
                </div>
                <div class="d-sm-flex_ justify-content-between align-items-center  pb-sm-2">

                    <div class="order-sm-1  text-center mb-3">
                        <p class="font-size-ms mb-0"><span class="text-light_ opacity-50 mr-1">© {{ date('Y') }} Université de Parakou.
                                Tout droit réservé</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span
            class="btn-scroll-top-tooltip text-muted font-size-sm mr-2">Top</span><i
            class="btn-scroll-top-icon fe-arrow-up"> </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ asset('storage/assets/web/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('storage/assets/web/vendor/jquery/dist/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('storage/assets/web/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('storage/assets/web/vendor/pjax/jquery.pjax.js') }}"></script>
    <script>
         $(function(){
        $(document).pjax('a', '#main')
        /*
            $('a').pjax(undefined, {
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Could not use pjax!\n\n" + jqXHR + "\n\n" + textStatus + "\n\n" + errorThrown);
                }
            });

            $('body').bind('pjax:start', function (xhr, options) {

                $("#main-app").css({"opacity": '.7'});
                $(options.container).fadeOut("2000", function () {
                    //                                                                   alert("Faded out");
            alert('')
                });
            }).bind('pjax:end', function (xhr, options) {
                $("#main-app").animate({"opacity": '.5'}, 1000);
            alert('OK')
                $(options.container).show("slow");
            });
            $("#main-app * a").pjax()*/
            
        });
    </script>
    @yield('scripts')
    <script src="{{ asset('storage/assets/web/vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}">
    <script src="{{ asset('storage/assets/web/vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('storage/assets/web/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    
    <script src="{{ asset('storage/assets/web/js/theme.min.js') }}"></script>
        
    <script type="text/javascript">
   

        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'fr',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                gaTrack: true,
                gaId: 'UA-64943629-2'
            }, 'google_translate_element');
        }
    </script>

</body>

</html>
