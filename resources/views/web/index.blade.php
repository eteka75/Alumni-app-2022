@extends('layouts.web')
@section('title', 'Accueil')
@section('content')
<style>
  .img_ucover{
    height: 280px;
    overflow: hidden;
  }
  .card-curved-body{
    height: 360px;
  }
  .icon-box{
    padding: 50px 40px;
    border-radius: 24px;
    background: #ecf2f5;
    background: #ffffff;
    text-align: center;
    transition: all .35s;
    /*min-height: 280px ;*/
    max-height: 380px ;
    overflow: hidden;
  }
</style>
        <!-- Page content-->
        <section class="cs-sidebar text-white mb-n4" style="background: url('{{ asset('storage/assets/web/img/bg_amphi1000.jpeg') }}') no-repeat; background-size:cover">        
            <div class="container pt-4">
                <!--nav aria-label="breadcrumb">
                    <ol class="py-1 my-2 breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="shop-ls.html">Shop</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Order tracking</li>
                    </ol>
                </nav-->
                <!-- Details-->
                <div class="row">
                    <div class="col-sm-12 col-xl-10 col-xxl-9 mx-auto text-center">
                        <h1 class="display-3 text-uppercase_  text-white mt-5">{{ __("Plateforme des Alumnis de l'Université de Parakou") }}</h1>
                        
                    </div>
                </div>
                <div class="row mb-4">

                    <div class="col-sm-7 col-xl-6 col-xxl-5 mx-auto ">
                        <div class="text-white py-3 px-4 text-center">
                            Cette plateforme vous permet de découvrir sur cette plateforme vos anciens camarades d'universités, des opportunités de travail, etc. 
                            Si vous êtes un alumni, vous avez la possibilité de rejoindre la communauté afin de partager des opportunités.
                    <div>
                        <div class="my-4 mb-6">
                          @if(!Auth::user())                            
                          <a class=" btn btn-primary shadow-lg mb-1 mt-2 py-2 d-sm-inline d-block  px-4" href="{{ route('register') }}">{{ __('Nous rejoindre') }}</a> 
                          @endif
                            <a class=" btn btn-default py-2 mb-1 mt-2  d-sm-inline d-block px-4text-dark bg-white border mx-sm-3" href="{{ route('Apropos') }}">{{ __('En savoir plus') }}</a> 
                        </div>

                        
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-secondary_ py- py-md-6">
            <div class="container py-2 py-md-0">
              <div class="row align-items-center">
                <div class="col-xl-4 text-center text-xl-left">
                  <h2 class="mb-4 mb-xl-0">Quelques statiques sur la plateforme:</h2>
                </div>
                <div class="col-xl-8">
                  <div class="cs-countdown h2 display-2 justify-content-center justify-content-xl-start" data-countdown="10/01/2021 07:00:00 PM">
                    <div class="cs-countdown-days mb-0 mt-3 mr-0 px-4 border-right"><span class="cs-countdown-value font-weight-normal px-4">{{ isset($nb_membre)?$nb_membre:'00' }}</span><span class="cs-countdown-label font-size-lg text-body">Membres</span></div>
                    <div class="cs-countdown-hours mb-0 mt-3 mr-0 px-4 border-right"><span class="cs-countdown-value font-weight-normal px-4">{{ isset($nb_entreprise)?$nb_entreprise:'00' }}</span><span class="cs-countdown-label font-size-lg text-body">Entreprises</span></div>
                    <div class="cs-countdown-minutes mb-0 mt-3 mr-0 px-4 border-right"><span class="cs-countdown-value font-weight-normal px-4">{{ isset($nb_opportunite)?$nb_opportunite:'00' }}</span><span class="cs-countdown-label font-size-lg text-body">Opportunités</span></div>
                    <div class="cs-countdown-seconds mb-0 mt-3 mr-0 px-4"><span class="cs-countdown-value font-weight-normal px-4">{{ isset($nb_activite)?$nb_activite:'00' }}</span><span class="cs-countdown-label font-size-lg text-body">Activités</span></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section>
            <div class="bg-secondary-3_ bg-gradient py-5">
              <div class="container p-md-3">
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      <h6 class="my-0 p-0 d-inline text-primary__ text-uppercase px-2 py-1 rounded text-white bg-white_" style="letter-spacing: 6px ">Je suis un ancien étudiant de l'UP,</h6>
                        <h4 class="display-3 mt-0 font-weight-bol pt-0 mb-5 text-dark_ text-white">Comment ça fonctionne  ?</h4>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                      <div class="icon-box shadow-sm">
                          <figure class="d-flex justify-content-center">
                            <img src="{{ asset('storage/assets/images/xdonation.png') }}" alt="Inscription">
                          </figure>
                          <header class="entry-header">
                              <h3 class="entry-title">Je m'inscris sur la plateforme</h3>
                            </header>
                            <div class="text-muted text-sm pb-3 ">L'inscription est gratuite et ne prend que trois (3) minutes.</div>
                          <div class="entry-content text-center">
                              <a href="{{ route('register') }}" class="btn btn-success  my-2 d-sm-inline d-block rounded-3">S'inscrire maintenant <i class="fa fa-search"></i></a>
                          </div>
                      </div>
                  </div>
                      <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                          <div class="icon-box shadow-sm">
                              <figure class="d-flex justify-content-center">
                                  <img src="{{ asset('storage/assets/images/xhands-gray.png') }}" alt="Recherche">
                              </figure>
                              <header class="entry-header">
                                  <h3 class="entry-title">Je retrouve mes promotionnaires</h3>
                              </header>
                              <div class="text-muted text-sm pb-3 ">Recherchez vos camarades du campus et faites de nouvelles connaissances.</div>
                              <div class="entry-content text-center">
                                  <a href="{{ route('search') }}" class="btn btn-default border btn-secondary  my-2 d-sm-inline d-block font-bold rounded-3">Lancer une recherche <i class="fa fa-search"></i></a>
                              </div>
                          </div>
                      </div>
                     
                      <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                          <div class="icon-box shadow-sm">
                              <figure class="d-flex justify-content-center">
                                <img src="{{ asset('storage/assets/images/xdove.png') }}" alt="Inscription">
                              </figure>
                              <header class="entry-header">
                                  <h3 class="entry-title">Je découvre  les opportunités</h3>
                              </header>
                              <div class="text-muted text-sm pb-3 ">Chaque membre paratage et découvre de nouvelles opportunités.</div>
                              <div class="entry-content text-center">
                                  <a href="http://127.0.0.1:9000/participer" class="btn btn-info d-sm-inline my-2 d-block rounded-3">Découvrir <i class="fa fa-search"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </section>
          <div class="bg-primary_ border-top shadow-lg ">
            <section class="container py-6 pt-md-0 pb-5 pb-md-6 pb-lg-7">
              <h2 class="text-center display-4  pt-5 mb-0">Nos partenaires</h2>
              <p class="lead text-center mb-5">Ceux qui soutiennent nos étudiants</p>
              <div class="row">
                <div class="col-md-3 col-sm-4 col-6 text-center"><a class="cs-swap-image mb-grid-gutter" href="#"><img class="cs-swap-to" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/01_color.png')}}" alt="Logo"><img class="cs-swap-from" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/01_gray.png')}}" alt="Logo"></a></div>
                <div class="col-md-3 col-sm-4 col-6 text-center"><a class="cs-swap-image mb-grid-gutter" href="#"><img class="cs-swap-to" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/02_color.png')}}" alt="Logo"><img class="cs-swap-from" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/02_gray.png')}}" alt="Logo"></a></div>
                <div class="col-md-3 col-sm-4 col-6 text-center"><a class="cs-swap-image mb-grid-gutter" href="#"><img class="cs-swap-to" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/03_color.png')}}" alt="Logo"><img class="cs-swap-from" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/03_gray.png')}}" alt="Logo"></a></div>
                <div class="col-md-3 col-sm-4 col-6 text-center"><a class="cs-swap-image mb-grid-gutter" href="#"><img class="cs-swap-to" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/04_color.png')}}" alt="Logo"><img class="cs-swap-from" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/04_gray.png')}}" alt="Logo"></a></div>
                <div class="col-md-3 col-sm-4 col-6 text-center"><a class="cs-swap-image mb-grid-gutter" href="#"><img class="cs-swap-to" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/05_color.png')}}" alt="Logo"><img class="cs-swap-from" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/05_gray.png')}}" alt="Logo"></a></div>
                <div class="col-md-3 col-sm-4 col-6 text-center"><a class="cs-swap-image mb-grid-gutter" href="#"><img class="cs-swap-to" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/06_color.png')}}" alt="Logo"><img class="cs-swap-from" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/06_gray.png')}}" alt="Logo"></a></div>
                <div class="col-md-3 col-sm-4 col-6 text-center"><a class="cs-swap-image mb-grid-gutter" href="#"><img class="cs-swap-to" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/07_color.png')}}" alt="Logo"><img class="cs-swap-from" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/07_gray.png')}}" alt="Logo"></a></div>
                <div class="col-md-3 col-sm-4 col-6 text-center"><a class="cs-swap-image mb-grid-gutter" href="#"><img class="cs-swap-to" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/08_color.png')}}" alt="Logo"><img class="cs-swap-from" width="176" src="{{ asset('storage/assets/web/img/demo/event-landing/partners/08_gray.png')}}" alt="Logo"></a></div>
              </div>
            </section>
          </div>
          @if(isset($membres) && count($membres))
          <section class="bg-secondary shadow_ ">
          <div class="container pt-3 pb-2 pb-md-3 pb-lg-4 pt-md-4 pt-lg-5">
              <div class="row">
                <div class="col-md-10 col-xxl-9 col-sm-12 mx-auto text-center mb-5">
                  <h2 class="text-center_ pt-2 mt-4 pt-md-0 text-primary text-uppercase_ display-4 " >La communauté des alumnis s'agrandit</h2>   
                  <div class="lead px-md-6">Après leur formation à l'Université de Parakou, ils viennent d'intégrer la communauté des alumnis de l'UP</div>
                  
                </div>  
              </div>  
            <div class="row pb-3 pb-md-0">
              @foreach($membres as $key => $membre)
              <div class="col-xxl-2 col-xl-3 col-lg-3 col-sm-4 col-md-4  mb-grid-gutter px-2">
                <a href="{{route('uprofil',$membre->username)}}"> 
                <div class="card card-curved-body rounded-2 shadow-sm card-hoverborder-0 box-shadow_ mx-auto mb-1" style="max-width: 22rem;">
                    <a href="{{route('uprofil',$membre->username)}}">                   
                  <div class="card-img-top text-center card-img-gradient rounded-0">
                    <div class="img_ucover bg-white rounded-2">   
                      <img src="{{ asset($membre->profile_photo_path)}}" class="img-fluid mx-auto u-image rounded-0" alt="{{ $membre->nom_prenom() }}">
                    </div>
                  </div>
                    </a>
                    <div class="card-body text-center u-card-text-nom ">
                      <a href="{{route('uprofil',$membre->username)}}" class="text-dark"><h3 class="h6 card-title mb-0 ">{{ $membre->nom_prenom() }}</h3></a>
                      <p class="font-size-xs text-body mb-0">{{ $membre->getPoste() }} {!! $membre->getEntreprise()!=null? " chez <a href='#''><b>".$membre->getEntreprise().'</b></a>':"" !!}</p>
                    </div>
                    </div>
                    </a>
                  
                  </div>
              @endforeach
              
              @if($membres->count()>=2)
              <div class="col-md-12 text-center  mb-4">
                <a class="btn btn-primary d-block d-sm-inline  mb-5 mt-2" href="#"><span class="fe-plus"></span> Plus de membres</a>
              </div>
              @endif
            </div>
        </div>
          </section>
          @endif
          <section class=" bg-white shadow py-5 border-bottom_">
              <div class="container">
                  <div class="row">
                      <div class="col-md-8 mx-auto col-xxl-7 text-center mb-5">
                          <h2 class=" display-3">Quelques activités</h2>
                          <div class="lead px-md-4 px-xxl-6">Découvrez les activités organisées par les alumnis et leurs différents partenaires</div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4 col-sm-6 col-12 shuffle-item shuffle-item--visible mb-4" >
                        <article class="card card-hover"><a class="card-img-top" href="blog-single-rs.html"><img src="{{ asset('storage/assets/web/img/blog/01.jpg')}}" alt="Post thumbnail"></a>
                          <div class="card-body"><a class="meta-link font-size-sm mb-2" href="#">Digital design</a>
                            <h2 class="h5 nav-heading mb-4"><a href="blog-single-rs.html">Designers should always keep their users in mind</a></h2><a class="media meta-link font-size-sm align-items-center pt-3" href="#"><img class="rounded-circle" width="36" src="{{ asset('storage/assets/web/img/blog/avatar/01.jpg')}}" alt="Emma Brown">
                              <div class="media-body pl-2 ml-1 mt-n1">by<span class="font-weight-semibold ml-1">Emma Brown</span></div></a>
                            <div class="mt-3 text-right text-nowrap"><a class="meta-link font-size-xs" href="#"><i class="fe-message-square mr-1"></i>&nbsp;6</a><span class="meta-divider"></span><a class="meta-link font-size-xs" href="#"><i class="fe-calendar mr-1 mt-n1"></i>&nbsp;Feb 19</a></div>
                          </div>
                        </article>
                      </div>
                    <div class="col-md-4 col-sm-6 col-12 shuffle-item shuffle-item--visible mb-4" >
                        <article class="card card-hover"><a class="card-img-top" href="blog-single-rs.html"><img src="{{ asset('storage/assets/web/img/blog/01.jpg')}}" alt="Post thumbnail"></a>
                          <div class="card-body"><a class="meta-link font-size-sm mb-2" href="#">Digital design</a>
                            <h2 class="h5 nav-heading mb-4"><a href="blog-single-rs.html">Designers should always keep their users in mind</a></h2><a class="media meta-link font-size-sm align-items-center pt-3" href="#"><img class="rounded-circle" width="36" src="{{ asset('storage/assets/web/img/blog/avatar/01.jpg')}}" alt="Emma Brown">
                              <div class="media-body pl-2 ml-1 mt-n1">by<span class="font-weight-semibold ml-1">Emma Brown</span></div></a>
                            <div class="mt-3 text-right text-nowrap"><a class="meta-link font-size-xs" href="#"><i class="fe-message-square mr-1"></i>&nbsp;6</a><span class="meta-divider"></span><a class="meta-link font-size-xs" href="#"><i class="fe-calendar mr-1 mt-n1"></i>&nbsp;Feb 19</a></div>
                          </div>
                        </article>
                      </div>
                    <div class="col-md-4 col-sm-6 col-12 shuffle-item shuffle-item--visible mb-4" >
                        <article class="card card-hover"><a class="card-img-top" href="blog-single-rs.html"><img src="{{ asset('storage/assets/web/img/blog/01.jpg')}}" alt="Post thumbnail"></a>
                          <div class="card-body"><a class="meta-link font-size-sm mb-2" href="#">Digital design</a>
                            <h2 class="h5 nav-heading mb-4"><a href="blog-single-rs.html">Designers should always keep their users in mind</a></h2><a class="media meta-link font-size-sm align-items-center pt-3" href="#"><img class="rounded-circle" width="36" src="{{ asset('storage/assets/web/img/blog/avatar/01.jpg')}}" alt="Emma Brown">
                              <div class="media-body pl-2 ml-1 mt-n1">by<span class="font-weight-semibold ml-1">Emma Brown</span></div></a>
                            <div class="mt-3 text-right text-nowrap"><a class="meta-link font-size-xs" href="#"><i class="fe-message-square mr-1"></i>&nbsp;6</a><span class="meta-divider"></span><a class="meta-link font-size-xs" href="#"><i class="fe-calendar mr-1 mt-n1"></i>&nbsp;Feb 19</a></div>
                          </div>
                        </article>
                      </div>
                      <div class="col-md-4 col-sm-6 col-12 shuffle-item shuffle-item--visible mb-4" >
                        <article class="card card-hover"><a class="card-img-top" href="blog-single-rs.html"><img src="{{ asset('storage/assets/web/img/blog/01.jpg')}}" alt="Post thumbnail"></a>
                          <div class="card-body"><a class="meta-link font-size-sm mb-2" href="#">Digital design</a>
                            <h2 class="h5 nav-heading mb-4"><a href="blog-single-rs.html">Designers should always keep their users in mind</a></h2><a class="media meta-link font-size-sm align-items-center pt-3" href="#"><img class="rounded-circle" width="36" src="{{ asset('storage/assets/web/img/blog/avatar/01.jpg')}}" alt="Emma Brown">
                              <div class="media-body pl-2 ml-1 mt-n1">by<span class="font-weight-semibold ml-1">Emma Brown</span></div></a>
                            <div class="mt-3 text-right text-nowrap"><a class="meta-link font-size-xs" href="#"><i class="fe-message-square mr-1"></i>&nbsp;6</a><span class="meta-divider"></span><a class="meta-link font-size-xs" href="#"><i class="fe-calendar mr-1 mt-n1"></i>&nbsp;Feb 19</a></div>
                          </div>
                        </article>
                      </div>
                      <div class="col-md-4 col-sm-6 col-12 shuffle-item shuffle-item--visible mb-4" >
                        <article class="card card-hover"><a class="card-img-top" href="blog-single-rs.html"><img src="{{ asset('storage/assets/web/img/blog/01.jpg')}}" alt="Post thumbnail"></a>
                          <div class="card-body"><a class="meta-link font-size-sm mb-2" href="#">Digital design</a>
                            <h2 class="h5 nav-heading mb-4"><a href="blog-single-rs.html">Designers should always keep their users in mind</a></h2><a class="media meta-link font-size-sm align-items-center pt-3" href="#"><img class="rounded-circle" width="36" src="{{ asset('storage/assets/web/img/blog/avatar/01.jpg')}}" alt="Emma Brown">
                              <div class="media-body pl-2 ml-1 mt-n1">by<span class="font-weight-semibold ml-1">Emma Brown</span></div></a>
                            <div class="mt-3 text-right text-nowrap"><a class="meta-link font-size-xs" href="#"><i class="fe-message-square mr-1"></i>&nbsp;6</a><span class="meta-divider"></span><a class="meta-link font-size-xs" href="#"><i class="fe-calendar mr-1 mt-n1"></i>&nbsp;Feb 19</a></div>
                          </div>
                        </article>
                      </div>
                    <div class="col-md-4 col-sm-6 col-12 shuffle-item shuffle-item--visible mb-4" >
                        <article class="card card-hover"><a class="card-img-top" href="blog-single-rs.html"><img src="{{ asset('storage/assets/web/img/blog/01.jpg')}}" alt="Post thumbnail"></a>
                          <div class="card-body"><a class="meta-link font-size-sm mb-2" href="#">Digital design</a>
                            <h2 class="h5 nav-heading mb-4"><a href="blog-single-rs.html">Designers should always keep their users in mind</a></h2><a class="media meta-link font-size-sm align-items-center pt-3" href="#"><img class="rounded-circle" width="36" src="{{ asset('storage/assets/web/img/blog/avatar/01.jpg')}}" alt="Emma Brown">
                              <div class="media-body pl-2 ml-1 mt-n1">by<span class="font-weight-semibold ml-1">Emma Brown</span></div></a>
                            <div class="mt-3 text-right text-nowrap"><a class="meta-link font-size-xs" href="#"><i class="fe-message-square mr-1"></i>&nbsp;6</a><span class="meta-divider"></span><a class="meta-link font-size-xs" href="#"><i class="fe-calendar mr-1 mt-n1"></i>&nbsp;Feb 19</a></div>
                          </div>
                        </article>
                      </div>
                  </div>
                  <div class="col-md-12 text-center">
                        <a  class="btn btn-primary mt-4" href="#"><span class="fe-plus"></span> Plus d'activité</a>
                  </div>
              </div>
          </section>
         
         <section class="d-none bg-gradient position-relative pt-6 pb-5 py-sm-6">
            <div class="bg-overlay bg-size-cover opacity-100" style="background-color: transparent; background-image: url({{ asset('storage/assets/web/img/demo/booking/bg-pattern01.png')}});"></div>
            <div class="bg-overlay-content container py-2">
              <div class="row align-items-center">
                <div class="col-lg-5 offset-lg-1 order-lg-2 pb-5 pb-lg-0 text-center text-lg-left">
                  <h2 class="text-light">What is Around?</h2>
                  <p class="text-light mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="col-lg-6 order-lg-1">
                  <div class="row">
                    <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
                      <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" width="105" src="{{ asset('storage/assets/web/img/demo/booking/icons/01.svg')}}" alt="Tickets">
                        <p class="font-size-sm font-weight-medium text-light mb-0 pt-1">Make it easier to experience the world</p>
                      </div>
                    </div>
                    <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
                      <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" width="105" src="{{ asset('storage/assets/web/img/demo/booking/icons/02.svg')}}" alt="Search">
                        <p class="font-size-sm font-weight-medium text-light mb-0 pt-1">Advanced searching with filters</p>
                      </div>
                    </div>
                    <div class="col-sm-4 mb-2 pb-4 mb-sm-0 pb-sm-0">
                      <div class="px-2 text-center"><img class="bg-light rounded-circle mb-2" width="105" src="{{ asset('storage/assets/web/img/demo/booking/icons/03.svg')}}" alt="Flight">
                        <p class="font-size-sm font-weight-medium text-light mb-0 pt-1">Find the cheapest regular flights</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          <section>
              <div class="container">
                  
              </div>
          </section>
          <!--section class="position-relative bg-primary py-5 py-md-6 py-lg-7" style="margin-top: 00px;">
            <div style="height: 30px;"></div>
            <div class="cs-shape cs-shape-top cs-shape-curve bg-body">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 185.4">
                <path fill="currentColor" d="M3000,185.4V0H0v185.4C496.4,69.8,996.4,12,1500,12S2503.6,69.8,3000,185.4z"></path>
              </svg>
            </div>
            <div class="container mt-n4 py-3 py-md-2">
              <h2 class="text-center mb-5 text-white">Questions &amp; Réponses</h2>
              <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                  <div class="accordion accordion-alt" id="faq">
                    <div class="card border-0 box-shadow card-active">
                      <div class="card-header">
                        <h3 class="accordion-heading"><a href="#faq-1" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="faq-1">Can I import my projects from Teamwork?<span class="accordion-indicator"></span></a></h3>
                      </div>
                      <div class="collapse show" id="faq-1" data-parent="#faq">
                        <div class="card-body font-size-sm">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim.</p>
                          <p class="mb-0">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        </div>
                      </div>
                    </div>
                    <div class="card border-0 box-shadow">
                      <div class="card-header">
                        <h3 class="accordion-heading"><a class="collapsed" href="#faq-2" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="faq-2">What are correct file permissions?<span class="accordion-indicator"></span></a></h3>
                      </div>
                      <div class="collapse" id="faq-2" data-parent="#faq">
                        <div class="card-body font-size-sm">
                          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim.</p>
                        </div>
                      </div>
                    </div>
                    <div class="card border-0 box-shadow">
                      <div class="card-header">
                        <h3 class="accordion-heading"><a class="collapsed" href="#faq-3" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="faq-3">How to set default projects for new users?<span class="accordion-indicator"></span></a></h3>
                      </div>
                      <div class="collapse" id="faq-3" data-parent="#faq">
                        <div class="card-body font-size-sm">
                          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim.</p>
                        </div>
                      </div>
                    </div>
                    <div class="card border-0 box-shadow">
                      <div class="card-header">
                        <h3 class="accordion-heading"><a class="collapsed" href="#faq-4" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="faq-4">Is it possible to upload files from Google Drive?<span class="accordion-indicator"></span></a></h3>
                      </div>
                      <div class="collapse" id="faq-4" data-parent="#faq">
                        <div class="card-body font-size-sm">
                          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center pt-5">
                    <a href="{{ route('faq') }}" class=" btn bg-white w-100 btn-block py-3 text-primary bg-seoncdary-2 rounded">Plus de questions <i class="fe-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </section-->
@endsection
    
        
