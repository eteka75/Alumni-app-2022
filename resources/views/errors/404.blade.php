@extends('layouts.web')
@section('title', 'Page indisponible')
@section('navbar', '')
@section('content')
      
        <div class="py-2">
        <div class="sa-error text-center mt-5">
            <h3>La page n'existe pas ou a été déplacée !</h3>
            <div class="sa-page-content container">
                <div class="error-404 not-found">
                    
                    <!-- /.sa-logo -->  
                    <img src="{{ asset('storage/assets/images/404.jpg') }}" alt="Image" class="img-fluid">               
                    <h1 class="h2s"> </h1>                       
                    <a class="btn btn-secondary btn-sm mb-4 rounded-0 mt-n6  mt-2" href="{{ url('/') }}"> <i class="fe-arrow-left"></i> Retour à l'accueil </a>
                </div><!-- .sa-page-content -->
            </div><!-- /.not-found -->            
        </div><!-- /.sa-error -->
        </div>
@endsection