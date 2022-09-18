@extends('layouts.web')

@section('title', 'Se connecter')

@section('content')
<div class="bg-white">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-5">
            <div class="card_p-5 shadow-smç rounded shadow-sm shadow-0 mb-5">
               
                <div class="card-body p-4">
                <div class="text-center mb-4">
                    <h3>Connexion</h3>
                    <small>Renseignez vos identifiants pour vous connecter</small>
                   
                </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-0">
                            <label for="email" class="col-md-12 col-form-label text-md-start">{{ __('Adresse électronique') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-12 col-form-label text-md-start">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-12 text-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Rester connecté') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-0">
                                <button type="submit" class="btn btn-block w-100 btn-primary">
                                    {{ __('Se connecter') }}
                                </button>
                                
                                
                            </div>
                                
                            <div class="col-md-12 text-center mt-3 offset-md-0">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié ?') }}
                                </a>
                                @endif
                                <br>
                                <div> Si vous êtes nouveau, <a href="{{ route('register') }}">créez un compte</a> !</div>
                            </div>
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
