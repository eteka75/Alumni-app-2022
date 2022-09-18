@extends('layouts.web')

@section('title', 'Nous contacter')

@section('sidebar')
    <section class="breadcrumb-section py-5">
        <div class="container">
            <h2 class="h2">{{ 'Contact' }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Index')}}">Accueil</a></li>
                <li class="breadcrumb-item">Contact</li>
            </ol>
        </div><!-- /.container -->
    </section> 
    
@endsection

@section('content')
<section class="container bg-overlay-content pb-5">
  <div class="row">
    
    <div class="col-lg-7 col-md-7  pb-2 mb-5 mt-3" >
    <div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
      <div class="card border-1">
        <form class="card-body needs-validationp-5" action='{{route('pcontact')}}' method="POST" novalidate="">
        {{csrf_field()}}
          <div class="form-group">
            <label class="form-label" for="cont-fn">Nom<sup class="text-danger ml-1">*</sup></label>
            <input class="form-control @error('nom') is-invalid @enderror" type="text" value="{{old('nom')}}" id="cont-fn" name="nom" placeholder="Votre nom complet" required="">
            
          </div>
          <div class="form-group row ">
            <div class="col-sm-6">
              <label class="form-label" for="cont-email">Votre adresse email <sup class="text-danger ml-1">*</sup></label>
              <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{old('email')}}" name="email" id="cont-email" placeholder="nomprenom@domaine.com" required="">
             
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="cont-phone">Téléphone  </label>
              <input class="form-control bg-image-0 @error('telephone') is-invalid @enderror" value="{{old('telephone')}}" name="telephone" type="text" id="cont-phone" data-format="custom" data-delimiter="-" data-blocks="4 2 2 2 2" placeholder="0000-00-00-00-00">
            
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="cont-subject">Objet<sup class="text-danger ml-1">*</sup></label>
            <input class="form-control @error('objet') is-invalid @enderror" type="text" name="objet" value="{{old('objet')}}" id="cont-subject" placeholder="Titre de votre message" required="">
           
          </div>
          <div class="form-group">
            <label class="form-label" for="cont-message">Message<sup class="text-danger ml-1">*</sup></label>
            <textarea class="form-control @error('message') is-invalid @enderror" required  id="cont-message" name="message" rows="5" placeholder="Rédigez votre message ici" required="">{{old('message')}}</textarea>
           
          </div>
          <div class=" pt-2">
            <button class="btn btn-primary" type="submit">Soumettre</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-5 col-md-5  mt-5">
      <h2 class="h4 pb-3  mt-3">Détails du contact</h2>
     
      <h3 class="h6 mb-0"> Association des Alumnis des étudiants de l'Université de Parakou</h3>
      Parakou - Bénin <br><br>
      <ul class="list-unstyled font-size-sm pb-3">
        <li class="d-flex align-items-top mb-3"><i class="fe-map-pin font-size-xl text-muted mt-1 mr-2 pr-1"></i>
          <div>Campus de l'Université de Parakou<br>
        </li>
        <li class="d-flex align-items-center mb-3"><i class="fe-mail font-size-xl text-muted mr-2 pr-1"></i>
          <div><a href="mailto:alunmiup@univ-parakou.bj">alunmiup@univ-parakou.bj</a></div>
        </li>
        <li class="d-flex align-items-center mb-3"><i class="fe-phone font-size-xl text-muted mr-2 pr-1"></i>
          
          <div><a href="tel:+22996000000">(+229) 96000000</a></div>
        </li>
      </ul>
      <!--h3 class="h6 pb-2">Europe - Berlin, Germany</h3>
      <ul class="list-unstyled font-size-sm">
        <li class="d-flex align-items-top mb-3"><i class="fe-map-pin font-size-xl text-muted mt-1 mr-2 pr-1"></i>
          <div>Mohrenstrasse 37 10117,<br>Berlin, Germany<br></div>
        </li>
        <li class="d-flex align-items-center mb-3"><i class="fe-mail font-size-xl text-muted mr-2 pr-1"></i>
          <div>berlin@example.com</div>
        </li>
        <li class="d-flex align-items-center mb-3"><i class="fe-phone font-size-xl text-muted mr-2 pr-1"></i>
          <div>030 778 345 26</div>
        </li>
      </ul-->
    </div>
    <div class="col-lg-12 rounded" >
    <iframe class="rounded shadow-sm" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3936.979269464035!2d2.644504615352027!3d9.335101393308902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10321aed2db2a909%3A0x3feeae8d587cf869!2sUniversit%C3%A9%20de%20Parakou!5e0!3m2!1sfr!2sbj!4v1650491548665!5m2!1sfr!2sbj" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>

@endsection