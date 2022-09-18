@extends('layouts.web')

@section('title', 'Nos partenaires')

@section('sidebar')
    <section class="breadcrumb-section py-5">
        <div class="container">
            <h2 class="h2">{{ 'Partenaires' }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Index')}}">Accueil</a></li>
                <li class="breadcrumb-item">Partenaires</li>
            </ol>
        </div><!-- /.container -->
    </section> 
    
@endsection

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12 py-5">
       <!-- Gallery inside carousel  -->
<div class="cs-carousel cs-controls-center">
    <div class="cs-carousel-inner" data-carousel-options='{"nav": false, "responsive": {"0":{"items":1},"576":{"items":2, "gutter": 20},"1200":{"items":3, "gutter": 30}}}'>
         <div>
            <img class="rounded" src="{{ asset('storage/assets/web/img/blog/01.jpg') }}" alt="Image"/>
          </div>
          <div>
            <img class="rounded" src="{{ asset('storage/assets/web/img/blog/02.jpg') }}" alt="Image"/>
          </div>
          <div>
            <img class="rounded" src="{{ asset('storage/assets/web/img/blog/03.jpg') }}" alt="Image"/>
          </div>
        </div>
      </div>
      </div>
</div>
</div>
@endsection