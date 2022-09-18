@extends('layouts.web')
@section('title', 'Réinitialisation de mot de passe')

@section('content')
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="card_p-5 shadow-smç rounded-3 border mb-5">
                   
                    <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h3>{{ __('Réinitialisation de mot de passe') }}</h3>
                        <small>Entrez votre adresse email pour réinitialiser le mot de passe de votre compte.</small>
                       
                    </div>
                    <form method="POST" action="{{ route('password.email') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-12 col-form-label text-md-end">{{ __('Email de votre compte') }}</label>
    
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-secondary w-100">
                                        {{ __('Envoyer le lien de réinitiamisation') }}
                                    </button>
                                </div>
                            </div>
                            <div class="row mb-0">
                                    
                                <div class="col-md-12 text-center mt-3 offset-md-0">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Se connecter') }}
                                    </a>
                                    @endif
    <br>
                                    <small> <a href="{{ route('register') }}">Nouveau ?, créer un compte</a>
                                </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
