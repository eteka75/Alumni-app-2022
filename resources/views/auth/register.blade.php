@extends('layouts.web')
@section('title', 'Inscrivez-vous')
@section('content')
 <!-- Page content-->
 <div class="bg-secondary_">
      <!-- Background image-->
      <div class="d-none  d-md-block position-absolute w-50 h-100 bg-size-cover" style="top: 0; right: 0; background-image: url({{ asset('storage/assets/images/etu_fm.jpg') }});"></div>
      <!-- Actual content-->
      <section class="container  d-flex align-items-center pt-2 pb-3 pb-md-4" style="flex: 1 0 auto;">
        <div class="w-100 pt-2 pt-sm-3">
          <div class="row">
            <div class="col-lg-5 col-md-6 offset-lg-1_">
              <!-- Sign in view-->
              <div class="cs-viewshow p-2 bg-whiteroundedshadow px-sm-4 py-2 mb-4" id="signin-view">
                    <div class="card-bodypt-8">
                        <div class="text-sm-start mb-2">
                            <h3 class="mb-1">Créer un compte</h3>
                            <small>Renseignez vos informations de création de compte</small>
                            
                        </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-0">
                            
                            <div class="col-md-6 ">
                                <label for="nom" class=" col-form-label  text-md-right_">{{ __('Nom ') }}</label>
                                <input id="nom" type="text" class="form-control  @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" placeholder="Votre nom de famille" autofocus>
                                
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 ">
                                <label for="nom" class=" col-form-label  text-md-right_">{{ __('Prénom(s) ') }}</label>
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="nom" placeholder="Prénom(s)" autofocus>

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <label for="email" class="col-md-12 col-form-label text-md-right_">{{ __('Courrier électronique') }}</label>

                            <div class="col-md-12 ">
                                <input id="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email@domain.com"  required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <label for="password" class="col-md-12 col-form-label text-md-right_">{{ __('Mot de passe') }}</label>

                            <div class="col-md-12 ">
                                <input id="password" type="password" placeholder="8caractères minimum" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right_">{{ __('Confirmation du mot de passe') }}</label>

                            <div class="col-md-12 ">
                                <input id="password-confirm" type="password" placeholder="Confirmer mot de passe" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12  mb-1 mt-3 text-sm-start">
                                <button type="submit" class="btn  px-4 py-2 my-2 btn-success w-100_  d-sm-inlined-block">
                                    {{ __('Céer un compte') }}
                                </button>
                                <br>
                                <div class="my-0  mt-2 text-sm-left ">Avez-vous déjà un compte,<br> <a href="{{ route('login') }}">Connectez-vous</a></div>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
              <!-- Sign up view-->
              
              
            </div>
          </div>
        </div>
      </section>
 </div>
@endsection
