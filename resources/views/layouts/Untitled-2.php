<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="<?= (isset($description)) ? $description : 'DÃ©couvrez de nouvelles solutions pour vous aider Ã  rÃ©ussir votre cursus universitaire.'; ?>">

        <title> @yield('title',"UP Forum - â¯Bienvenue")  </title>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!--<link href="{{ asset('css/style_gplus.css') }}" rel="stylesheet">-->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
         <link href="{{ asset('js/plugins/icheck/skins/all.css') }}" rel="stylesheet">
       
        <!--<link href="{{ asset('assets/css/chatter.css') }}" rel="stylesheet">-->
        <script src="{{ asset('js/plugins/jquery.min.js') }}"></script>
        <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
        <script src="{{ asset('js/plugins/icheck/icheck.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        @yield('script')
        @yield('css')
        <!-- Scripts -->
        <script>

window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
]) !!}
;
        </script>
    </head>
    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <div id="AppModal"></div>
       
        <!-----------------FAVORIS SUPPRESSION ---------------------------->
        <div class="modal fade" id="fav-modal">
            <div class="modal-dialog card-max-width-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="fav-title">Ajout aux favoris </h4>
                    </div>
                    <div class="modal-body" id="fav-body">
                        <p class="alert alert-info">Voulez vous ajouter cet sujet Ã  vous favoris ?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default no-border rond3 btn-sm" data-dismiss="modal">Non</button>
                        <button type="button" id="fav-ok" class="btn btn-primary btn-sm rond3">Oui</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-----------------SIGNALER PROBLEMME ---------------------------->
        <div class="modal fade in" id="signal-modal">
            <div class="modal-dialog card-max-width-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="signal-title">Qu'avez vous remarquÃ© sur cette question </h4>
                    </div>
                    <div class="modal-body" id="sigal-body">

                        <div class="checkbox">
                            <label>
                                <input type="radio"> Sujet nom valide
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="radio"> Sujet Ã  revoir
                            </label>
                        </div>
                        <div class="checkbox">
                            <label >
                                <input type="radio"> Autres raisons
                            </label>

                        </div>

                        <textarea name="other_raison" class="form-control area " cols="4" placeholder="Autres raison">
                            
                        </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default no-border btn-sm" data-dismiss="modal">Annuler</button>
                        <button type="button" id="sup-ok" class="btn btn-primary btn-sm rond3">Envoyer</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-----------------SUPPRESSION QUESTION ---------------------------->
        <div class="modal fade in" id="sup-modal">
            <div class="modal-dialog card-max-width-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="sup-title">Suppression de question </h4>
                    </div>
                    <div class="modal-body" id="sup-body">
                        <p class="alert alert-warning"> Voulez vous supprimer cette question</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default no-border btn-sm" data-dismiss="modal">Non</button>
                        <button type="button" id="sup-ok" class="btn btn-sm  btn-danger rond3">Oui, Supprimer</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-----------------MODIFICATION QUESTION ---------------------------->
        <div class="modal fade in" id="sup-modal">
            <div class="modal-dialog card-max-width-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="sup-title">Mise Ã  jour de question </h4>
                    </div>
                    <div class="modal-body" id="sup-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default no-border btn-sm" data-dismiss="modal">Non</button>
                        <button type="button" id="sup-ok" class="btn btn-primary btn-sm">Oui</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        @if(Auth::user())
        <a href="{{route('NewSujet')}}" id="btn-xs-add" class="btn hidden-print visible-xs " title="Ajouter un sujet" ><i  class="fa fa-plus "></i></a>
        @endif
        <div id="app">
            <nav id="nav" class="navbar navbar-default hidden-print navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header ">

                        <!-- Collapsed Hamburger -->
                        <button id="imenu" type="button" class="navbar-toggle topmenu collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img class="hidden-xs hidden-sm" src="{{ asset('assets/images/upforum.png') }}"  alt="{{ config('app.name', 'Forum') }}">
                            <img class="hidden-md hidden-lg" src="{{ asset('assets/images/upforum-mini.png') }}"  alt="{{ config('app.name', 'Forum') }}">
                        </a>
                    </div>

                    <div class="collapse navbar-collapse " id="app-navbar-collapse">
                        <div class="" >


                            <!-- Right Side Of Navbar -->
                            @if (Auth::user())
                            <ul class="nav hidden navbar-nav navbar-left micone">
                                <li class="<?= (isset($p) && $p == 'home') ? 'active' : null; ?>" data-toggle="tooltip" data-placement="bottom" title="Voir tous les sujets">
                                    <a href="{{route("showAllSujets")}}"><i class=" hidden-lghidden-mdhidden-sm hidden fa  fa-retweet"></i> <span class="hidden_visible-lg_______ ">Accueil</span></a>
                                </li>
                                
                                <li class="<?= (isset($p) && $p == 'sujets') ? 'active' : null; ?>" data-toggle="tooltip" data-placement="bottom" title="Voir tous mes sujets">
                                    <a href="{{route("showLoginUserSujets")}}"><i class="hidden-lghidden-mdhidden-sm hidden fa fa-question-circle"></i> <span class="hidden_visible-lg_______ ">Sujets</span></a>
                                </li>
                                <li class="<?= (isset($p) && $p == 'favoris') ? 'active' : null; ?>" data-toggle="tooltip" data-placement="bottom" title="Voir mes sujets favoris">
                                    <a href="{{route("showFavorisSujets")}}"><i class="hidden-lghidden-mdhidden-sm hidden fa fa-star-o"></i> <span class="hidden_visible-lg_______">Favoris</span></a>
                                </li>
                                <li class="<?= (isset($p) && $p == 'interventions') ? 'active' : null; ?>" data-toggle="tooltip" data-placement="bottom" title="Voir mes discussions ">
                                    <a href="{{route("showUserDiscussions")}}"><i class="hidden-lghidden-mdhidden-sm hidden fa  fa-comment-o"></i> <span class="hidden_visible-lg_______">Interventions</span></a>
                                </li>
                                <li  class='visible-xs' data-toggle="tooltip" data-placement="bottom" id="add_sujet1" title="Ajouter un nouveau sujet">
                                    <!--<button type="button" class="btn btn-default" >Tooltip on left</button>-->
                                    <a href="{{route('NewSujet')}}" class="btn btn-xs hidden   btn-primary" ><i  class="fa fa-plus-square text-xs "></i><span class="hidden_visible-xs "> </span></a>
                                </li>
                            </ul>
                            @endif

                            @if (Auth::guest())
                            <ul id="log_connect" class="nav navbar-nav navbar-right " >
                                <!-- Authentication Links -->
                                <li>
                                    <form id="htopform" class="navbar-form" action="{{route('search')}}" method="GET" role="search">
                                        <div class="input-group" id="search-group">
                                            <input type="text" name="query" autocomplete="off" data-form='htopform' class="form-control datasearch" required="required" placeholder="Rechercher un sujet ..." name="q">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li><a id="add_sujet" title="Connectez-vous"  href="{{ route('login') }}">Connexion</a></li>
                                <li><a href="{{ route('register') }}">CrÃ©er un compte</a></li>
                            </ul> 
                            @else
                            <ul class="nav navbar-nav navbar-right " >
                                <!-- Authentication Links -->
                                <li>
                                    <form class="navbar-form" action="{{route('search')}}" method="GET" role="search">
                                        <div class="input-group" id="search-group">
                                            <input type="text" name="query" class="form-control" required="required" placeholder="Rechercher un sujet ..." name="q">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <li  class='hidden-xss mini_btn' >
                                    <!--<button type="button" class="btn btn-default" >Tooltip on left</button>-->
                                    <a href="{{url('/')}}" class="_bge" ><i  class="glyphicon glyphicon-home"></i></a>
                                </li>
                                
                                <li >
                                    <a href="#" class=""  data-toggle="dropdown" role="button" aria-expanded="false">

                                        <span class="fa fa-plus "></span>
                                    </a>

                                </li>

                                <li class="dropdown" id="username">
                                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} 
                                        <span class="fa fa-angle-down"></span>
                                    </a>

                                    <ul class="dropdown-menu notifications-list" role="menu">
                                        <li class="pointer">
                                            <div class="pointer-inner">
                                                <div class="arrow"></div>
                                                <div class="arrow-border"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="{{route('showUsernameProfil',Auth::user()->pseudo)}}"><i class="fa fa-user-circle"></i> Profil</a>
                                        </li>
                                        <!--                                        <li>
                                                                                    <a href="{{route('userNotifications')}}"><i class="fa  fa-bell-o"></i> Notifications</a>
                                                                                </li>-->
                                        <li>
                                            <a href="{{route('HelpForum')}}"><i class="fa fa-institution"></i> FAQ</a>
                                        </li>
                                        <li>
                                            <a href="{{route('SettingProfil')}}"><i class="fa fa-cogs"></i> ParamÃ¨tres</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li class="<?= (isset($p) && $p == 'sujets') ? 'active' : null; ?>" data-toggle="tooltip" data-placement="bottom" title="Voir tous mes sujets">
                                            <a href="{{route("showLoginUserSujets")}}"><i class="hidden-lghidden-mdhidden-sm hidden fa fa-question-circle"></i> <span class="hidden_visible-lg_______ ">Mes Sujets</span></a>
                                        </li>
                                        <li class="<?= (isset($p) && $p == 'favoris') ? 'active' : null; ?>" data-toggle="tooltip" data-placement="bottom" title="Voir mes sujets favoris">
                                            <a href="{{route("showFavorisSujets")}}"><i class="hidden-lghidden-mdhidden-sm hidden fa fa-star-o"></i> <span class="hidden_visible-lg_______">Mes Favoris</span></a>
                                        </li>
                                        <li class="<?= (isset($p) && $p == 'interventions') ? 'active' : null; ?>" data-toggle="tooltip" data-placement="bottom" title="Voir mes discussions ">
                                            <a href="{{route("showUserDiscussions")}}"><i class="hidden-lghidden-mdhidden-sm hidden fa  fa-comment-o"></i> <span class="hidden_visible-lg_______">Mes Interventions</span></a>
                                        </li>
                                        <li class="divider"></li>


                                        <li class="">
                                            <a class="bold text-danger" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                <i class="fa fa-power-off"></i>  DÃ©connexion
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>

                                    </ul>
                                </li>
<!--                                <li class="dropdown" id="username">
                                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false">
                                        <div class="notif label label-danger">6</div>
                                        <span class="fa fa-bell-o"></span>
                                    </a>

                                    <ul class="dropdown-menu notifications-list messages-list" id="user_notification" role="menu">

                                        <ul class="dropdown-menu notifications-list messages-list">
                                        <li class="pointer">
                                            <div class="pointer-inner">
                                                <div class="arrow"></div>
                                                <div class="arrow-border"></div>
                                            </div>
                                        </li>
                                        <li class="item first-item">
                                            <a href="#">
                                                <img src="{{asset('assets/images/users/messages-photo-1.png')}}" alt="">
                                                <span class="content-headline text-muted">
                                                    <span class="content-headline ">
                                                        Notification
                                                <div class="text-sm pull-right"><i class="fa fa-cog"></i> RÃ©glages</div>
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                            <li class="item ">
                                                <a href="#">
                                                    <img src="{{asset('assets/images/users/messages-photo-1.png')}}" alt="">
                                                    <span class="content">
                                                        <span class="content-headline">
                                                            George Clooney
                                                        </span>
                                                        <span class="content-text">
                                                            Look, just because I don't be givin' no man a foot massage don't make it 
                                                            right for Marsellus to throw...
                                                        </span>
                                                    </span>
                                                    <div class="time text-right"><i class="fa fa-clock-o"></i>13 min.</div>
                                                </a>
                                            </li>
                                        <li class="item">
                                            <a href="#">
                                                <img src="{{asset('assets/images/users/messages-photo-2.png')}}" alt="">
                                                <span class="content">
                                                    <span class="content-headline">
                                                        Emma Watson
                                                    </span>
                                                    <span class="content-text">
                                                        Look, just because I don't be givin' no man a foot massage don't make it 
                                                        right for Marsellus to throw...
                                                    </span>
                                                </span>
                                                <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                            </a>
                                        </li>
                                        <li class="item">
                                            <a href="#">
                                                <img src="{{asset('assets/images/users/messages-photo-3.png')}}" alt="">
                                                <span class="content">
                                                    <span class="content-headline">
                                                        Robert Downey Jr.
                                                    </span>
                                                    <span class="content-text">
                                                        Look, just because I don't be givin' no man a foot massage don't make it 
                                                        right for Marsellus to throw...
                                                    </span>
                                                </span>
                                                <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                            </a>
                                        </li>
                                        <li class="item-footer">
                                            <a href="#">
                                                Voir tous les messages
                                            </a>
                                        </li>
                                    </ul>
                                </li>-->

                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <div id="main-app" class="hpadtop">
                <div class='container'>
                    <div class='row '>
                        <div class='col-sm-12  col-sm-offset-0'>
                            @if(Session::has('flash_message'))
                            <p class="alert alert-default">
                                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">Ã—</button>
                                <strong>Parfait !</strong><br>
                                {!! Session::get('flash_message') !!} 
                            </p>
                            @endif
                            @if(Session::has('info'))
                            <p class="alert alert-info">
                                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">Ã—</button>
                                <strong>Information !</strong><br>
                                {!! Session::get('info') !!}
                            </p>
                            @endif
                            @if(Session::has('danger'))
                            <p class="alert alert-danger">
                                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">Ã—</button>
                                <strong>DÃ©solÃ© !</strong><br>
                                {!! Session::get('danger') !!}
                            </p>
                            @endif
                            @if(Session::has('success'))
                            <p class="alert alert-success">
                                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">Ã—</button>
                                <strong>Bravo !</strong><br>
                                {!! Session::get('success') !!}
                            </p>
                            @endif
                            @if(Session::has('warning'))
                            <p class="alert alert-warning">
                                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">Ã—</button>
                                <strong>Attention !</strong><br>
                                {!! Session::get('warning') !!}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
            <div class="mfooter hidden-print">
                <div class="container">
                    <div class="col-sm-12 text-center">
                        @include('includes.footer_links')
                    </div>
                </div>
            </div>
            <script src='https://www.google.com/recaptcha/api.js'></script>

            <!-- Scripts -->
            <!--<script src="{{ asset('js/app.js') }}"></script>-->
            <!--<script src="{{ asset('js/index.js') }}"></script>-->
            <!--<script type="text/javascript" src="{{asset('js/plugins/jquery.min.js')}}"></script>-->
            <script type="text/javascript" src="{{asset('js/plugins/jquery.pjax.js')}}"></script>
            <script type="text/javascript">
                                                   $('a').attr('data-pjax', "#main-app");
                                                   $('form').attr('data-pjax-container', "#pjax-container");
//                                                   $('a').prepend('<div id="pjax-container"></div>');
                                                   $('a').pjax(undefined, {
                                                       error: function (jqXHR, textStatus, errorThrown) {
                                                           alert("Could not use pjax!\n\n" + jqXHR + "\n\n" + textStatus + "\n\n" + errorThrown);
                                                       }
                                                   });
                                                   $('body').bind('pjax:start', function (xhr, options) {

//                                                       $("#main-app").css({"opacity": '.7'});
//                                                       $('#preloader').show().css({"opacity": '.7'});
//                                                       $('#preloader').show(0).css({"opacity": '.7'});
                                                       $(options.container).show("2000", function () {
                                                           //                                                                   alert("Faded out");
                                                           $('#preloader').show();
                                                       });
                                                   }).bind('pjax:end', function (xhr, options) {
                                                       
//                                                       $("#main-app").animate({"opacity": '1'}, 1000);
//                                                       $('#preloader').fadeOut(); // will first fade out the loading animation 
//                                                       $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 

//                                                       $(options.container).show("slow");
                                                   });
                                                   /***************************************************************************/
                                                   $(document).ready(function () {
                                                       $(document).scroll(function () {
                                                           var scroll = $(this).scrollTop();
                                                           var topDist = $("#nav").position();
                                                           if (scroll > topDist.top) {
                                                               $('#nav').addClass('fixed-nav');
                                                           } else {
                                                               $('#nav').removeClass("fixed-nav");
                                                           }
                                                       });
                                                   });
                                                   // Hide Header on on scroll down
                                                   /* var didScroll;
                                                    var lastScrollTop = 0;
                                                    var delta = 5;
                                                    var navbarHeight = $('#nav').outerHeight();
                                                    
                                                    $(window).scroll(function (event) {
                                                    didScroll = true;
                                                    });
                                                    
                                                    setInterval(function () {
                                                    if (didScroll) {
                                                    hasScrolled();
                                                    didScroll = false;
                                                    }
                                                    }, 250);
                                                    
                                                    function hasScrolled() {
                                                    var st = $(this).scrollTop();
                                                    
                                                    // Make sure they scroll more than delta
                                                    if (Math.abs(lastScrollTop - st) <= delta)
                                                    return;
                                                    
                                                    // If they scrolled down and are past the navbar, add class .nav-up.
                                                    // This is necessary so you never see what is "behind" the navbar.
                                                    if (st > lastScrollTop && st > navbarHeight) {
                                                    // Scroll Down
                                                    $('#nav').removeClass('navbar-fixed-top');//.addClass('nav-up');
                                                    //                                                           alert('')
                                                    } else {
                                                    // Scroll Up
                                                    if (st + $(window).height() < $(document).height()) {
                                                    //                                                               $('#nav').addClass('fixed-nav');
                                                    $('#nav').addClass('navbar-fixed-top');
                                                    }
                                                    }
                                                    
                                                    lastScrollTop = st;
                                                    }*/
            </script>
            <script>
//                $(document).on('submit', 'form', function (event) {//form[pjax-container]
//                    event.preventDefault();
//                    $.pjax.submit(event, 'nav');
//                })
            </script>
            <script type="text/javascript">
                //<![CDATA[
//                $(window).on('load', function () { // makes sure the whole site is loaded 
//                    $('#status').fadeOut(); // will first fade out the loading animation 
//                    $('#preloader').delay(200).fadeOut('slow'); // will fade out the white DIV that covers the website. 
//                    $('body').delay(350).css({'overflow': 'visible'});
//                });
                $('#imenu').click(function () {
                    $('.haut-menu').hide(0);
                    $('.haut-menu').attr('data-show', '0');
                });
                $(function () {
                    $('[data-toggle=tooltip]').tooltip()
                })
                //]]>
            </script> 
            <script>
                var header = "This is my dynamic header";
                var content = "This is my dynamic content";
                var strSubmitFunc = "applyButtonFunc()";
                var btnText = "Just do it!";
//                doModal('AppModal', header, content, strSubmitFunc, btnText);
                function doModal(placementId, heading, formContent, strSubmitFunc, btnText)
                {

                    html = '<div id="modalWindow" class="modal hide fade in" style="displsay:none;">';
                    html += '<div class="modal-header">';
                    html += '<a class="close" data-dismiss="modal">Ã—</a>';
                    html += '<h4>' + heading + '</h4>'
                    html += '</div>';
                    html += '<div class="modal-body">';
                    html += '<p>';
                    html += formContent;
                    html += '</div>';
                    html += '<div class="modal-footer">';
                    if (btnText != '') {
                        html += '<span class="btn btn-success"';
                        html += ' onClick="' + strSubmitFunc + '">' + btnText;
                        html += '</span>';
                    }
                    html += '<span class="btn" data-dismiss="modal">';
                    html += 'Close';
                    html += '</span>'; // close button
                    html += '</div>'; // footer
                    html += '</div>'; // modalWindow
                    $("body").before(html);
                    $("#modalWindow").modal('show');
                }
                function hideModal()
                {
                    // Using a very general selector - this is because $('#modalDiv').hide
                    // will remove the modal window but not the mask
                    $('.modal.in').modal('hide');
                }
                var App = {
                    showSupDialog: function (e, id, msg) {
                        e.preventDefault();
                        $('#fav-body').html(msg);
                        $('#fav-modal').modal({
                            backdrop: 'static',
                            keyboard: false
                        }).one('click', '#fav-ok', function (e) {
                            var url = $(id).attr('action'),
                                    data = $(id).serialize();
                            $.ajax({
                                method: 'POST',
                                url: url,
                                dataType: 'json',
                                //contentType: '',
                                data: data,
                                timeout: 5000,
                                success: function (json, xhr) {
                                    $('#fav-modal').modal('hide');
                                    Notification(json.title, json.message, json.type, '');
                                    alert(json.pid)
                                    if (json.post !== '') {
                                        $("#question" + json.pid).replaceWith(json.post);
                                    }
                                },
                                error: function (res, flagError, xhr) {
//                                 console.error(flagError);
                                    $('#fav-modal').modal('hide');
                                    Notification(xhr, flagError + '+++' + flagError.text, 'danger', '')
//                                    Notification(flagError,flagError.text, 'danger', '')
//                                    alert(res + "==" + flagError + "+++" + xhr)
                                    console.log(flagError);
//                                    Notification(json.title, json.message, json.type, '')
                                }
                            });
                        });
                        return;
                    },
                    showDelDialog: function (e, id, msg) {
                        e.preventDefault();
                        $('#sup-body').html(msg);
                        $('#sup-modal').modal({
                            backdrop: 'static',
                            keyboard: false
                        }).one('click', '#sup-ok', function (e) {
                            var url = $(id).attr('action'),
                                    data = $(id).submit();
                            $.post(url, data, function (json) {
                                $('#sup-modal').modal('hide');
                                //AfficherNotification

                                Notification("Suppression", json.message, json.type, '');
                                //RechergerNewPost
                            });
                        });
                        return;
                    },
                };
                (function ($) {
                    $.fn.showPost = function (e)
                    {
                        alert("")
                        e.preventDefault();
                        var show = $(this).attr('data-show');
                        var text = $(this).text();
                        $("#" + show).removeClass('hidden');
                        $(this).hide(0);
                    };
                    $.fn.chevron_btn = function ()
                    {
                        $(this).click(function (e) {
                            e.preventDefault();
                            var show = $(this).attr('data-show');
                            if ($("#" + show).hasClass('hidden-xs hidden-sm') || $("#" + show).hasClass('hidden')) {
                                if($("#" + show).hasClass('hidden-xs hidden-sm')){
                                    $("#" + show).removeClass('hidden-xs hidden-sm');
                                    $(this).removeClass('fa-chevron-right').addClass('fa-chevron-down');
                                }
                                if($("#" + show).hasClass('hidden')){
                                    $("#" + show).removeClass('hidden');
                                    $(this).removeClass('fa-chevron-right').addClass('fa-chevron-down');
                                }
                            } else {
                                $("#" + show).addClass('hidden-xs hidden-sm hidden')
                                $(this).removeClass('fa-chevron-down').addClass('fa-chevron-right');

                            }
                        });
                    };
                    $('.chevron-btn').chevron_btn()
//                    $('a.showpost').on('click', function (e) {
//                        $(this).showPost(e)
//                    });
                })(jQuery);
                $("body a.add-disc-favoris").on('click', function (e) {
                    var id = '#form-fav' + $(this).attr('data-id');
                    var msg = '<div class="alertalert-default">Voulez vous vraiment ajouter ce sujet aux favoris</div>';
                    App.showSupDialog(e, id, msg);
                });
//                $("body a.del-disc-favoris").on('click', function (e) {
//                    var id = '#form-fav' + $(this).attr('data-id');
//                    var msg = '<div class="alertalert-default">Voulez vous vraiment retirer ce sujet aux favoris</div>';
//                    App.showSupDialog(e, id, msg);
//                });
//                $(".dropdown-menu>li>a.add-disc-signal").on('click', function (e) {
//                    var id = '#form-fav' + $(this).attr('data-id');
//                    var msg = '<div class="alertalert-default">Voulez vous vraiment retirer ce sujet aux favoris</div>';
//                    App.showSupDialog(e, id, msg);
//                });
                $(".dropdown-menu>li>a.sup-disc").on('click', function (e) {
                    var id = '#form-sup' + $(this).attr('data-id');
                    var msg = '<div class="alertalert-default">Voulez vous vraiment retirer ce sujet aux favoris</div>';
                    App.showDelDialog(e, id, msg);
                });
                function Notification(title, message, type, icon, url) {
                    $.notify({
                        icon: icon,
                        title: "<h5 class='pad5_0 m0 bold'>" + title + "</h5>",
                        url: url,
                        target: '_blank',
                        message: message
                    }, {
                        // settings
                        type: type,
                        placement: {
                            from: "top",
                            align: "center"
                        },
                        offset: {
                            x: 0,
                            y: 60
                        },
                        delay: 6000,
                        timer: 2000,
                    });
                }
                /******************************************************************
                 * 
                 * @param {string:identifiant du formulaire} id
                 * @param {string: message a afficher} msg
                 * @returns {Notification}
                 */
                function showFavDialog(id, msg) {
                    event.preventDefault();
                    $('#fav-body').html(msg);
                    $('#fav-modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    }).one('click', '#fav-ok', function (e) {
                        var url = $(id).attr('action'),
                                data = $(id).serialize();
                        $.ajax({
                            method: 'POST',
                            url: url,
                            dataType: 'json',
                            data: data,
                            timeout: 5000,
                            success: function (json, xhr) {
                                $('#fav-modal').modal('hide');
                                Notification(json.title, json.message, json.type, '');
                                if (json.post !== '') {
                                    $("#question" + json.pid).replaceWith(json.post);
                                }
                            },
                            error: function (json, flagError, xhr) {
                                $('#fav-modal').modal('hide');
                                Notification(json.type, flagError, 'danger', '')
//                                    alert(res + "==" + flagError + "+++" + xhr)
                                try {
                                    console.log(json);
                                } catch (e) {
                                }

                                Notification(json.title, json.message, json.type, '')
                            }
                        });
                    });
                    return false;
                }
                /************************************************************************
                 * 
                 * @param {type} id
                 * @param {type} msg
                 * @returns {undefined}
                 */
                function showDelDialog(id, msg) {
                    event.preventDefault();
                    $('#sup-body').html(msg);
                    $('#sup-modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    }).one('click', '#sup-ok', function (e) {
                        var url = $(id).attr('action'),
                                data = $(id).serialize();
                        $('#sup-modal').modal('hide');
                        $.ajax({
                            method: 'POST',
                            url: url,
                            dataType: 'json',
                            data: data,
                            timeout: 5000,
                            success: function (json, xhr) {

                                Notification(json.title, json.message, json.type, '');
                                if (json.error == '1') {
                                    $("#question" + json.pid).remove();
                                }
                            },
                            error: function (json, flagError, xhr) {
                                $('#fav-modal').modal('hide');
                                Notification(json.type, flagError, 'danger', '')
//                                    alert(res + "==" + flagError + "+++" + xhr)
                                try {
                                    console.log(json);
                                } catch (e) {
                                }

                            }
                        });
                    });
                    return false;
                }
                /************************************************************************
                 * 
                 * @param {type} id
                 * @returns {undefined}
                 */
                function showSignalDialog(id) {
                    event.preventDefault();
                    $('#signal-modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    }).one('click', '#signal-ok', function (e) {
                        var url = $(id).attr('action'),
                                data = $(id).serialize();
                        $('#signal-modal').modal('hide');
                        /*$.ajax({
                         method: 'POST',
                         url: url,
                         dataType: 'json',
                         data: data,
                         timeout: 5000,
                         success: function (json, xhr) {
                         
                         Notification(json.title, json.message, json.type, '');
                         
                         },
                         error: function (json, flagError, xhr) {
                         $('#fav-modal').modal('hide');
                         Notification(json.type, flagError, 'danger', '')
                         //                                    alert(res + "==" + flagError + "+++" + xhr)
                         try {
                         console.log(json);
                         } catch (e) {
                         }
                         }
                         });*/
                    });
                    return false;
                }
                /*****************************************************************
                 * 
                 * @param {string:bloque to show Id} id
                 * @returns {hide this block and show the next block}
                 */
                function datashow(id, hide) {
                    event.preventDefault();
                    $(id).removeClass('hidden');
                    $(hide).addClass('hidden');
                    return false;
                }
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%'
                });
            </script> 
            <script>
                $(document).ready(function () {
                    var win = $(window);

                    win.scroll(function () {
                        var pageActuel = $('#npage').val();
                        var type = $('#ptype').val();
                        var ref = $('#pdata').val();
                        var ajaxSend = true;
                        if (type === undefined || pageActuel === undefined) {
                            ajaxSend = false;
                            return;
                        }
                        var h = $(document).height() - win.height();
                        var top = win.scrollTop();

                        if ((h === top) && ajaxSend === true) {
                            chargerData(pageActuel, type, ref);

                        }
                    });
                });
                function chargerData(page, type, ref) {
                    $('#loading').html('<i class="fa bold fa-refresh"></i> Chargement...').removeClass('hidden');
                    $.ajax({
                        url: '/ajax/posts/',
                        dataType: 'html',
//                                timeout: 5000,
                        type: "GET",
                        data: 'page=' + page + '&type=' + type + '&ref=' + ref,
                        success: function (json) {
                            if ($.trim(json) === "") {
                                $('#loading').html('TerminÃ© !');
                                return false;
                            } else {
                                page++;
                                $('#npage').val(page);
                                $('#posts>ul').append(json);
//                                $('#loading').addClass("hidden");
                            }
                        },
                        error: function (e, d) {
                            $('#loading').html('Erreur de chargement');
//                            $('#loading').addClass("hidden");
//                        alert(d.toString())
                        }
                    });

                    return  page;
                }
                $('#loading').click(function () {
                    var pageActuel = $('#npage').val();
                    var type = $('#ptype').val();
                    var ref = $('#pdata').val();
                    chargerData(pageActuel, type, ref);
                });
//            $(document).on('submit', 'form', function(event) {
//            var container = $(this).closest('[pjax-container]')
//            $.pjax.submit(event, container)
//            })
//                $(document).ready(function () {
//                    var $obj = $('#sfixed');
//                    var top = $obj.offset().top - parseFloat($obj.css('marginTop').replace(/auto/, 0));
//
//                    $(window).scroll(function (event) {
//                        // what the y position of the scroll is
//                        var y = $(this).scrollTop();
//
//                        // whether that's below the form
////                            alert($obj.offset().top+'__'+top)
//                        if (y >= top) {
//                            // if so, ad the fixed class
//                            $obj.addClass('fixed');
//                        } else {
//                            // otherwise remove it
//                            $obj.removeClass('fixed');
//                        }
//                    });
//                });
            </script> 
            
    </body>
</html>
