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
<section class="bg- py-5 mt-n4 mb-6 mt-lg-0 mb-lg-7">
    <div class="container py-3">
      <div class="row">
        <div class="col-md-3 col-sm-6 text-center py-3">
          <h3 class="display-4">15</h3>
          <p class="text-muted mb-0">Years of experience</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center py-3">
          <h3 class="display-4">2k+</h3>
          <p class="text-muted mb-0">Employees worldwide</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center py-3">
          <h3 class="display-4">90%</h3>
          <p class="text-muted mb-0">Positive feedback</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center py-3">
          <h3 class="display-4">100</h3>
          <p class="text-muted mb-0">Successfully completed projects</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Team-->

@endsection