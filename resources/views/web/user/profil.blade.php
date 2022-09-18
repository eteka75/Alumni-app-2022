@extends('layouts.web')
@section('title',  isset($user)?$user->nom.' '.$user->prenom:'Profil')
@section('content')
    <section class=" py-3 bg-secondary">
	<div class="container">
		<div class="row">
      <div class="col-12">
        <!-- Author info START -->
				<div class=" d-md-flex p-3 p-sm-4 my-3  text-md-start rounded">
					<!-- Avatar -->
          <div class=" me-0 me-md-4">
            <div class="avatar avatar-xxl mx-3">
               <div id="profil-cover" class="mx-2">
                        <img class="d-block_ img-fluid_ rounded-circle_mx-auto_my-2" width="110" src="{{ asset($user->profile_photo_path) }}" alt="{{ isset($user)?$user->nom.' '.$user->prenom:'Utilisateur' }}">
                       
                    </div>
            </div>
          </div>
        <div>
            <h2 class="m-0">{{ isset($user)?$user->nom.' '.$user->prenom:'Utilisateur' }}</h2> 
            @auth
            <button class="btn bg-white border mt-n3  float-md-right mx-1"><i class="fe-edit"></i> </button><button class="btn mx-1 btn-primary mt-n3  float-md-right"> S'abonner</button>
            @endauth
             <p class="text-xs text-muted text-body mb-0">{{ $user->getPoste() }} {!! $user->getEntreprise()!=null? " chez <a href='#''><b>".$user->getEntreprise().'</b></a>':"" !!} &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <i class="fe-rss"></i> 17 opportunités publiées | &nbsp;&nbsp;&nbsp;<i class="fe-link"></i> <a class="text-muted" href="https://www.site-web.com">www.site-web.com</a></p>
            <p class="my-2 me-5">
            <b>Biographie :</b> Ici s'affiche la Biographie de l'utilisateur..... reports on breaking news based in London. He has written about government, criminal justice, and the role of money in politics since 2015.
            </p>
						
						<ul class="nav justify-content-md-start">
							<li class="nav-item">
								<a class="ps-0 text-muted fs-5" href="#"><i class="fe-facebook"></i></a>
							</li>
							<li class="nav-item">
								<a class=" px-2  text-muted fs-5" href="#"><i class="fe-twitter"></i></a>
							</li>
							<li class="nav-item">
								<a class=" px-1  text-muted fs-5" href="#"><i class="fe-linkedin"></i></a>
							</li>
						</ul>					
					</div>
				</div>
				<!-- Author info END -->
      </div>
    </div>
	</div>
</section>
<div class="bg-white  shadow" >
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <ul id="lprofil" class="nav nav-tabs mb-0  justify-content-center_ mx-3" role="tablist">
                
                <li class="nav-item ">
                    <a class="nav-link active" href="#" data-toggle="tab" role="tab">
                    <i class="fe-user mr-2"></i>
                    Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="tab" role="tab">
                    <i class="fe-rss mr-2"></i>
                    Opportunités
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="tab" role="tab">
                    <i class="fe-user-check mr-2"></i>
                    Abonnées
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="tab" role="tab">
                    <i class="fe-heart mr-2"></i>
                    Favoris
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="tab" role="tab">
                    <i class="fe-settings mr-2"></i>
                    Paramètres
                    </a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button">Plus</a>
                    <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" data-toggle="tab" role="tab">Messages</a>
                    <a class="dropdown-item" href="#" data-toggle="tab" role="tab">Notifications</a>
                    </div>
                </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-7 py-4"></div>
        <div class="col-lg-7 ">
                <div id="account-menu" class="active">
                    <div class="border bg-white  card py-4 px-5 mb-4">
                    <form action="" method="POST">
                        <h6 class="mb-3">Publier une opportunité</h6>
                    <!--div class="form-group">
                        <select class="form-select form-control col-md-6 ">
                            <option value="info">Information</option>
                            <option value="offre-emploi">Offre d'emplois</option>
                            <option value="offre-stage">Offre de stage</option>
                            <option value="autres">Autres</option>
                        </select>
                    </div-->
                    <div class="form-group">
                    <textarea class="form-control">
                    </textarea>
                    </div>
                    <div class="form-group">
                        <div class="d-flex text-muted bold text-bold">
                            <div class="mx-2">
                                <input type="radio" name="type" id="offre" value="offre-emploie"> <label for="offre">Offre d'emploi</label>
                            </div>
                            <div class="mx-2">
                                <input type="radio" name="type"  id="infos" value="info"> <label for="infos">Informations</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <button class="btn btn-secondary">Publier</button>
                    </div>
                </div>
                </form>
                </div>
    </div>
</div>
    <div id="bg_profil__">
   </div>
    <div class="container d-none mb-6">
        <div class="row">
          
            <div class="col-lg-3  p-sm-0 mt-n2 mb-4 mb-lg-0" id="profil_menu">
                <div class="bg-light rounded-lg box-shadow-sm _">
                  <div class="px-4 pt-5 mb-1 text-center">
                    <div id="profil-cover" class="my-2">
                        <img class="d-block_ img-fluid_ rounded-circle_mx-auto_my-2" width="110" src="{{ asset($user->profile_photo_path) }}" alt="{{ isset($user)?$user->nom.' '.$user->prenom:'Utilisateur' }}">
                    </div>
                        <h6 class="mb-0 pt-1">{{ isset($user)?$user->nom.' '.$user->prenom:'Utilisateur' }}</h6><span class="text-muted font-size-sm"> {{ $poste?$poste->fonction :''}}</span>
                    <div class="py-3">
                        <button class="btn btn-primary "> S'abonner</button>
                        <a href="{{ ('/') }}" class="btn btn-sm btn btn-tertiary border bg-white shadow-sm mx-1"><span class="fe-edit"></span> Modifier</a>
                   
                    </div>
                    </div>
                  
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
              
               
            </div>
        </div>
    </div>

    
<style type="text/css">
    #banner_profil{
        height: 180px;
        background-image: url({{ asset("storage/assets/web/bg/bg6.jpg") }});
        //background-size:100% auto;
        border-radius:0 0 10px 0px;      
        
    }
    #profil-cover img{
        width:100%;
        object-fit: cover;
        height: 100%;
    }
    #profil-cover{
        width: 140px;
        height: 140px;
        border-radius: 50%;
        margin: auto;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #dedede;
        border:0px solid #FFFFFF;
    }
    #profil_menu{
        margin-top: -300px !important;
    }
    #bg_profil{
        background-color: #F5F6F7;
        height:280px;
        background: url({{ asset('storage/assets/images/profi_bg_alumni.png') }}) #F5F6F7 repeat-x 50% 90%;
        
    }
</style>
@endsection