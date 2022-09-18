@extends('layouts.web')
@section('title',  isset($user)?$user->nom.' '.$user->prenom:'Profil')
@section('content')
<style type="text/css">
    #banner_profil{
        min-height: 150px;
      /* background-image: url({{ asset("storage/assets/web/bg/bg7s.png") }});*/
        background-size:100% auto;
        border-radius: 0 0 ;

    }
    #profil-cover{
        width: 110px;
        height: 110px;
        border-radius: 50%;
        margin: auto;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #dedede;
    }
</style>
    <div class="bg-secondary shadow-lgs shadow border-bottom " >
        <div class="container"> 
            <div class="row">
                <div class="col-md-12" id="banner_profil">
                    <div class="px-4 py-4 mb-1 text-center">
                        <div id="profil-cover" class="my-2">
                            <img class="d-block_ img-fluid_ rounded-circle_mx-auto_my-2" width="110" src="{{ asset($user->profile_photo_path) }}" alt="{{ isset($user)?$user->nom.' '.$user->prenom:'Utilisateur' }}">
                        </div>
                            <h6 class="mb-0 pt-1">{{ isset($user)?$user->nom.' '.$user->prenom:'Utilisateur' }}</h6><span class="text-muted font-size-sm"> {{ $poste?$poste->fonction :''}}</span>
                      </div>
               
                </div>              
                <div class="col-md-12 text-center bg-secondary" > 
                    
                </div>              
                
            </div>
        </div>    
    </div>
    
    <div class="container  mb-6">
        <div class="row">
           
            <div class="col-lg-3 mt- mb-4 mb-lg-0">
                <div class="bg-light rounded-lg box-shadow-sm border mt-3">
                  <!--div class="px-4 py-4 mb-1 text-center">
                    <div id="profil-cover" class="my-2">
                        <img class="d-block_ img-fluid_ rounded-circle_mx-auto_my-2" width="110" src="{{ asset($user->profile_photo_path) }}" alt="{{ isset($user)?$user->nom.' '.$user->prenom:'Utilisateur' }}">
                    </div>
                        <h6 class="mb-0 pt-1">{{ isset($user)?$user->nom.' '.$user->prenom:'Utilisateur' }}</h6><span class="text-muted font-size-sm"> {{ $poste?$poste->fonction :''}}</span>
                  </div-->
                  <div class="d-lg-none px-4 pb-4 text-center"><a class="btn btn-primary px-5 mb-2" href="#account-menu" data-toggle="collapse"><i class="fe-menu mr-2"></i>Menu du compte</a></div>
                  <div class="d-lg-block collapse pb-2" id="account-menu">
                    <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">Mon profil</h3>
                    <a class="d-flex align-items-center nav-link-style px-4 py-3" href="#">
                        <i class="fe-grid font-size-lg opacity-60 mr-2"></i>Accueil profile<span class="nav-indicator"></span><span class="text-muted font-size-sm font-weight-normal ml-auto">2</span></a>
                        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top active" href="#"><i class="fe-bookmark font-size-lg opacity-60 mr-2"></i>Opportunités<span class="text-muted font-size-sm font-weight-normal ml-auto">$735.00</span></a><a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="dashboard-messages.html"><i class="fe-message-square font-size-lg opacity-60 mr-2"></i>Messages<span class="nav-indicator"></span><span class="text-muted font-size-sm font-weight-normal ml-auto">1</span></a>
                        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="#"><i class="fe-users font-size-lg opacity-60 mr-2"></i>Abonnées<span class="text-muted font-size-sm font-weight-normal ml-auto">34</span></a>
                        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="#"><i class="fe-info font-size-lg opacity-60 mr-2"></i>Notifications<span class="text-muted font-size-sm font-weight-normal ml-auto">15</span></a>
                        <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="#"><i class="fe-heart font-size-lg opacity-60 mr-2"></i>Favoris<span class="text-muted font-size-sm font-weight-normal ml-auto">6</span></a>
                    <h3 class="d-block bg-secondary font-size-sm font-weight-semibold text-muted mb-0 px-4 py-3">Account settings</h3>
                    
                    <a class="d-flex align-items-center nav-link-style px-4 py-3" href="account-profile.html">Modifier mon profil</a>
                    
                  
                    <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="signin-illustration.html"><i class="fe-log-out font-size-lg opacity-60 mr-2"></i>Se déconnecter</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 bg-sec mb-4 p-sm-0 mb-lg-0">
               
                </div>
        </div>
    </div>
@endsection