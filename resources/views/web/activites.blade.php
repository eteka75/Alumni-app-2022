@extends('layouts.web')

@section('title', 'Nos Activités')

@section('sidebar')
    <section class="breadcrumb-section py-5">
        <div class="container">
            <h2 class="h2">{{ 'Activités' }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Index')}}">Accueil</a></li>
                <li class="breadcrumb-item">Activités</li>
            </ol>
        </div><!-- /.container -->
    </section> 
    
@endsection

@section('content')
<section class="py-6 border-bottom_">
  <div class="container">
      <div class="row">
        <div class="col-md-3 col-12 shuffle-item shuffle-item--visible mb-4" >
            <article class="card card-hover"><a class="card-img-top" href="blog-single-rs.html"><img src="{{ asset('storage/assets/web/img/blog/01.jpg')}}" alt="Post thumbnail"></a>
              <div class="card-body"><a class="meta-link font-size-sm mb-2" href="#">Digital design</a>
                <h2 class="h5 nav-heading mb-4"><a href="blog-single-rs.html">Designers should always keep their users in mind</a></h2><a class="media meta-link font-size-sm align-items-center pt-3" href="#"><img class="rounded-circle" width="36" src="{{ asset('storage/assets/web/img/blog/avatar/01.jpg')}}" alt="Emma Brown">
                  <div class="media-body pl-2 ml-1 mt-n1">by<span class="font-weight-semibold ml-1">Emma Brown</span></div></a>
                <div class="mt-3 text-right text-nowrap"><a class="meta-link font-size-xs" href="#"><i class="fe-message-square mr-1"></i>&nbsp;6</a><span class="meta-divider"></span><a class="meta-link font-size-xs" href="#"><i class="fe-calendar mr-1 mt-n1"></i>&nbsp;Feb 19</a></div>
              </div>
            </article>
          </div>
        <div class="col-md-3 col-12 shuffle-item shuffle-item--visible mb-4" >
            <article class="card card-hover"><a class="card-img-top" href="blog-single-rs.html"><img src="{{ asset('storage/assets/web/img/blog/01.jpg')}}" alt="Post thumbnail"></a>
              <div class="card-body"><a class="meta-link font-size-sm mb-2" href="#">Digital design</a>
                <h2 class="h5 nav-heading mb-4"><a href="blog-single-rs.html">Designers should always keep their users in mind</a></h2><a class="media meta-link font-size-sm align-items-center pt-3" href="#"><img class="rounded-circle" width="36" src="{{ asset('storage/assets/web/img/blog/avatar/01.jpg')}}" alt="Emma Brown">
                  <div class="media-body pl-2 ml-1 mt-n1">by<span class="font-weight-semibold ml-1">Emma Brown</span></div></a>
                <div class="mt-3 text-right text-nowrap"><a class="meta-link font-size-xs" href="#"><i class="fe-message-square mr-1"></i>&nbsp;6</a><span class="meta-divider"></span><a class="meta-link font-size-xs" href="#"><i class="fe-calendar mr-1 mt-n1"></i>&nbsp;Feb 19</a></div>
              </div>
            </article>
          </div>
        <div class="col-md-3 col-12 shuffle-item shuffle-item--visible mb-4" >
            <article class="card card-hover"><a class="card-img-top" href="blog-single-rs.html"><img src="{{ asset('storage/assets/web/img/blog/01.jpg')}}" alt="Post thumbnail"></a>
              <div class="card-body"><a class="meta-link font-size-sm mb-2" href="#">Digital design</a>
                <h2 class="h5 nav-heading mb-4"><a href="blog-single-rs.html">Designers should always keep their users in mind</a></h2><a class="media meta-link font-size-sm align-items-center pt-3" href="#"><img class="rounded-circle" width="36" src="{{ asset('storage/assets/web/img/blog/avatar/01.jpg')}}" alt="Emma Brown">
                  <div class="media-body pl-2 ml-1 mt-n1">by<span class="font-weight-semibold ml-1">Emma Brown</span></div></a>
                <div class="mt-3 text-right text-nowrap"><a class="meta-link font-size-xs" href="#"><i class="fe-message-square mr-1"></i>&nbsp;6</a><span class="meta-divider"></span><a class="meta-link font-size-xs" href="#"><i class="fe-calendar mr-1 mt-n1"></i>&nbsp;Feb 19</a></div>
              </div>
            </article>
          </div>
        <div class="col-md-3 col-12 shuffle-item shuffle-item--visible mb-4" >
            <article class="card card-hover"><a class="card-img-top" href="blog-single-rs.html"><img src="{{ asset('storage/assets/web/img/blog/01.jpg')}}" alt="Post thumbnail"></a>
              <div class="card-body"><a class="meta-link font-size-sm mb-2" href="#">Digital design</a>
                <h2 class="h5 nav-heading mb-4"><a href="blog-single-rs.html">Designers should always keep their users in mind</a></h2><a class="media meta-link font-size-sm align-items-center pt-3" href="#"><img class="rounded-circle" width="36" src="{{ asset('storage/assets/web/img/blog/avatar/01.jpg')}}" alt="Emma Brown">
                  <div class="media-body pl-2 ml-1 mt-n1">by<span class="font-weight-semibold ml-1">Emma Brown</span></div></a>
                <div class="mt-3 text-right text-nowrap"><a class="meta-link font-size-xs" href="#"><i class="fe-message-square mr-1"></i>&nbsp;6</a><span class="meta-divider"></span><a class="meta-link font-size-xs" href="#"><i class="fe-calendar mr-1 mt-n1"></i>&nbsp;Feb 19</a></div>
              </div>
            </article>
          </div>
      </div>
      <div class="col-md-12 text-right">
            <a  class="btn btn-primary mt-4" href="#"><span class="fe-plus"></span> Plus d'activité</a>
      </div>
  </div>
</section>

@endsection