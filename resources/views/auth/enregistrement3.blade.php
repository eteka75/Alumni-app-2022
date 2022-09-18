@extends('layouts.web')

@section('title', 'Profil et Formation')

@section('content')
    <div class="bg-white">
        <div class="container">
            <!-- Related posts carousel -->

            <div class="row justify-content-center_">
                <div class="col-md-12">
                    <div class="card border-0  _box-shadow">
                        <div class="card-body">

                            <div class="row ">
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <div class="media align-items-center ">
                                        <div class="bg-secondary rounded-circle border text-center"
                                            style="width: 60px; height: 60px; line-height: 54px;"><i
                                                class="fe-user-check font-size-xl text-muted"></i></div>
                                        <div class="media-body pl-3"><span class="badge badge-success badge-pill mb-1"><i
                                                    class="fe-check mr-1"></i>Effectué</span>
                                            <h6 class="text-muted mb-0">Création de compte</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="media align-items-center mb-4">
                                        <div class="rounded-circle border border-primary text-center"
                                            style="width: 60px; height: 60px; line-height: 54px;"><i
                                                class="fe-list font-size-xl text-primary_"></i></div>
                                        <div class="media-body pl-3">
                                            <span class="badge badge-success badge-pill mb-1"><i
                                                    class="fe-check mr-1"></i>Effectué</span>
                                            <h6 class=" mb-0">Profil et Formation</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="media align-items-center mb-4">
                                        <div class="rounded-circle border text-center"
                                            style="width: 60px; height: 60px; line-height: 54px;"><i
                                                class="fe-star font-size-xl"></i></div>
                                        <div class="media-body pl-3">
                                            <span class="badge badge-success badge-pill mb-1"><i
                                                    class="fe-check mr-1"></i>Effectué</span>
                                            <h6 class="mb-0">Profession</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="media align-items-center mb-4">
                                        <div class="rounded-circle border text-center"
                                            style="width: 60px; height: 60px; line-height: 54px;"><i
                                                class="fe-package font-size-xl"></i></div>
                                        <div class="media-body pl-3">
                                            <span class="badge badge-primary badge-pill mb-1">En
                                                cours</span>
                                            <h6 class="mb-0">Paramètres du compte</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-xl-8 py-3  p-sm-4 py-sm-5 mb-5 rounded shadow-sm   col-12 mx-auto ">
                    <div class=" px-4">
                        <div class="text-center mb-4">
                            <h3 class="mb-0">Paramètres du compte</h3>
                            <small>Renseignez les préférences de votre compte</small>

                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger mb-4 text-sm">
                        <ul class="list-unstyled ">
                            @foreach ($errors->all() as $i=> $error)
                                <li>{{ $i+1 }}- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                        {!! Form::open(['method' => 'POST', 'url' => request()->url(), 'class' => 'form-horizontal', 'files' => true]) !!}

                            @csrf

                            <div id="notification-settings">
                                <div class="bg-secondary rounded-lg p-4 font-size-sm text-heading">Utilisez les boutons ci-dessous pour  <span class="font-weight-medium">
                                       active ou désactiver </span> options </div>
                                <div class="border-bottom py-4 p-sm-4">
                                    <div class="custom-control custom-switch">
                                        {!! Form::checkbox('email_public', '1',false,['class'=>"custom-control-input",'id'=>'email_public']) !!}
                                        <label class="custom-control-label text-heading" for="email_public">Rendre public votre adresse email </label>
                                    </div><small class="form-text">Les visiteurs peuvent voir votre email public</small>
                                    @error('email_public')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="border-bottom py-4 p-sm-4">
                                    <div class="custom-control custom-switch">
                                        {!! Form::checkbox('occupation_visible', '1',false,['class'=>"custom-control-input",'id'=>'occupation_visible']) !!}
                                        <label class="custom-control-label text-heading" for="occupation_visible">Rendre public votre occupation  professionnelle</label>
                                    </div><small class="form-text">Les visiteurs peuvent voir le poste que vous occupez ainsi que l'entreprise concernée</small>
                                    @error('occupation_visible')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="border-bottom py-4 p-sm-4">
                                    <div class="custom-control custom-switch">
                                        {!! Form::checkbox('recevoir_notification_collegue', '1',true,['class'=>"custom-control-input",'id'=>'recevoir_notification_collegue']) !!}
                                        <label class="custom-control-label text-heading" for="recevoir_notification_collegue">Notification d'inscription de nouveaux collègues</label>
                                    </div><small class="form-text">Recevez une notification dès qu'un promotionnaire rejoint sur la plateforme</small>
                                    @error('recevoir_notification_collegue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="border-bottom py-4 p-sm-4">
                                    <div class="custom-control custom-switch">
                                        {!! Form::checkbox('recevoir_notification_opportunites', '1',true,['class'=>"custom-control-input",'id'=>'recevoir_notification_opportunites']) !!}
                                       
                                        <label class="custom-control-label text-heading" for="recevoir_notification_opportunites">Notification des opportunités</label>
                                    </div><small class="form-text">Recevez des notifications dès ques des opportunités sont disponibles sur la plateforme</small>
                                    @error('recevoir_notification_opportunites')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="border-bottom py-4 p-sm-4">
                                    <div class="custom-control custom-switch">
                                        {!! Form::checkbox('recevoir_newsletters', '1',true,['class'=>"custom-control-input",'id'=>'recevoir_newsletters']) !!}
                                       
                                        <label class="custom-control-label text-heading" for="recevoir_newsletters">Recevoir les newsletters  </label>
                                    </div><small class="form-text">Recevez des newsletters dans votre boite email</small>
                                    @error('occupation_visible')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="text-center text-center mt-4 py-2">
                                    <button class="btn btn-primary d-sm-inline d-block btn-primary" type="submit">Sauvegarder</button>
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
