@extends('layouts.web')

@section('title', 'Recherche '.($search)?$search:'')

@section('sidebar')
<section class="breadcrumb-section py-5">
    <div class="container">
        <h2 class="h2">Recherche <span class="text-muted">{{isset($search)?$search:''}}</span></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('Index')}}">Accueil</a></li>
            <li class="breadcrumb-item">Recherche</li>
        </ol>
    </div><!-- /.container -->
</section>

@endsection

@section('content')
<section class=" border-1 shadow mb-0  py-5">
        <div class="container">
           <div class="col-md-8 col-sm-12 col-xxl-7 mx-auto">
               <form action="{{ route('search') }}" class="p-0 d-0 m-0" method="GET">
                    
                <div class="">
                   
                    <div class="d-flex flex-nowrap align-items-center">
                        <input value="{{request()->input('search')}}" autocomplete="OFF" class="form-control rounded-0 form-control-sm form-control-xl py-1 px-4 navbar-search-field" name="search" type="text"
                            placeholder="Rechercher dans la liste des alumnis">
                        
                        <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-primary btn-sm s-0 mx-2 rounded-0"> <i class="fe-search font-size-xl  p-0"></i>Rechercher </button>
                       
                        </div>
                    </div>
                  
           </div>
           </form>
        </div><!-- /.container -->
    </section>
<section class="bg- mt-n4 mb-6 mt-lg-0 mb-lg-7">
 <div class="bgfe py-5">
    <div class="container">
    <div class="text-muted text-sm mb-4">
    {{$datas->count()}} éléments trouvé{{$datas->count()>1?'s':''}}
    </div>
      @if(isset($datas) && $datas->count())
              
            <div class="row pb-3 pb-md-0">
            @foreach($datas as $key => $membre)
              <div class="col-xxl-2 col-xl-3 col-lg-3 col-sm-4 col-md-4  mb-grid-gutter px-2">
                <a href="{{route('uprofil',$membre->username)}}"> 
                <div class="card card-curved-body rounded-2 shadow-sm card-hoverborder-0 box-shadow_ mx-auto mb-1" style="max-width: 22rem;">
                    <a href="{{route('uprofil',$membre->username)}}">                   
                  <div class="card-img-top text-center card-img-gradient rounded-0">
                    <div class="img_ucover bg-white rounded-2">   
                      <img src="{{ asset($membre->profile_photo_path)}}" class="img-fluid mx-auto u-image rounded-0" alt="{{ $membre->nom_prenom() }}">
                    </div>
                  </div>
                    </a>
                    <div class="card-body text-center u-card-text-nom ">
                      <a href="{{route('uprofil',$membre->username)}}" class="text-dark"><h3 class="h6 card-title mb-0 ">{{ $membre->nom_prenom() }}</h3></a>
                      <p class="font-size-xs text-body mb-0">{{ $membre->getPoste() }} {!! $membre->getEntreprise()!=null? " chez <a href='#''><b>".$membre->getEntreprise().'</b></a>':"" !!}</p>
                    </div>
                    </div>
                    </a>
                  
                  </div>
            @endforeach
              
              @if($datas->count()>=2)
              <div class="col-md-12 text-center  mb-4 my-5">
               {{$datas->links()}}
              </div>
              @endif
              </div>
            @endif
        </div>
        </div>
</section>
<!-- Team-->

@endsection
