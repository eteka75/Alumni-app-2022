@extends('layouts.web')

@section('title', 'Profil et Formation')
@section('scripts')
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/i18n/defaults-fr_FR.min.js"></script>

@endsection
@section('content')
    <div class="bg-white">
        <div class="container">
            <!-- Related posts carousel -->
            <div class="row justify-content-center_">
                <div class="col-md-12">
                    <div class="card border-0  _box-shadow">
                        <div class="card-body ">

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
                                        <div class="media-body pl-3"><span class="badge badge-primary badge-pill mb-1">En
                                            cours</span>
                                            <h6 class="mb-0 text-primary">Profession</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="media align-items-center mb-4">
                                        <div class="rounded-circle border text-center"
                                            style="width: 60px; height: 60px; line-height: 54px;"><i
                                                class="fe-package font-size-xl"></i></div>
                                        <div class="media-body pl-3"><span
                                                class="d-block text-muted font-size-ms mb-1">Quatrième étape</span>
                                            <h6 class="mb-0">Paramètres du compte</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
              
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-xl-8  p-sm-4 py-sm-5 mb-5 rounded  shadow-sm col-12 mx-auto ">
                    <div class="card_p-5 box-shadowrounded mb-5">

                        <div class=" px-4">
                            <div class="text-center mb-4">
                                <h3 class="mb-0">Renseignements sur votre Profession</h3>
                               <small>Renseignez les informations sur vos occupations professionnelles</small>

                            </div>
                             @if ($errors->any())
                            <div class="alert alert-danger rounded-sm mb-4 text-sm">
                            <ul class="list-unstyled p-0 m-0 text-sm ">
                                @foreach ($errors->all() as $i=> $error)
                                    <li>{{ $i+1 }}- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                            {!! Form::open(['method' => 'POST', 'url' => request()->url(), 'class' => 'form-horizontal', 'files' => true]) !!}

                                @csrf
                                <label class="text-uppercase text-muted"> Renseignez sur votre Profession</label>
                                <hr class="p-0 mb-4">
                                <!-- Text input -->
                                <div class="form-group row">
                                <div class="col-md-6 form-group">
                                    <label for="text-input">Fonction actuelle  (*)</label>
                                    <input id="fonction" type="text" name="fonction" value="{{ old('fonction') }}" placeholder="Administrateur des impôts" class="form-control @error('fonction') is-invalid @enderror"  required autocomplete="fonction">

                                    @error('fonction')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="text-input">Nom de la structure  (*)</label>
                                    <input id="structure" type="text" name="structure" value="{{ old('structure') }}" placeholder="Ministère des finances" class="form-control @error('structure') is-invalid @enderror"  required autocomplete="structure">

                                    @error('structure')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group {{ $errors->has('secteur_id') ? 'has-error' : ''}}">
                                    <label for="text-input">Secteur d'activités (*)</label>
                                    {!! Form::select('secteur_id', isset($secteurs)?($secteurs):[''=>"Choisir secteur d'activité"], null,'' == 'required' ? ['class' => 'form-control  custom-select selectpicker rounded-1', 'required' => 'required'] : ['class' => 'form-control selectpicker custom-select','data-live-search'=>'true']) !!}
                                   
                                    @error('secteur_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label for="text-input">Lieu de travail  </label>
                                    <input id="lieu_poste" type="text" name="lieu_poste" value="{{ old('lieu_poste') }}" placeholder="Parakou" class="form-control @error('lieu_poste') is-invalid @enderror"  autocomplete="lieu_poste">

                                    @error('lieu_poste')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="text-input">Depuis quelle année vous occupez ce poste  </label>
                                    <input id="annee_poste" type="text" name="annee_poste" value="{{ old('annee_poste') }}" placeholder="{{ date('Y')-3 }}" class="form-control @error('annee_poste') is-invalid @enderror"  autocomplete="annee_poste">

                                    @error('annee_poste')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="text-input">Site web  de la structure</label>
                                    <input id="site_web" type="text" name="site_web" value="{{ old('site_web') }}" placeholder="http://dgei.bj" class="form-control @error('site_web') is-invalid @enderror"  autocomplete="site_web">

                                    @error('site_web')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="text-input">Contact de la structure (Tél, email) </label>
                                    <input id="contact" type="text" name="contact" value="{{ old('contact') }}" placeholder="96007766 - email@domaine.com" class="form-control @error('contact') is-invalid @enderror"  autocomplete="contact">

                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <!-- Text input -->
                                

                                <!-- Textarea -->
                                <div class="form-group">
                                    <label for="textarea-input">Autres renseignements sur la structure</label>
                                    <textarea class="form-control"  name="renseignements" id="textarea-input" rows="5">{!! old('renseignements') !!}</textarea>
                                    @error('renseignements')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-12 offset-md-0">
                                        <button type="submit" class="btn d-sm-inlin d-block btn-primary">
                                            {{ __('Sauvegarder') }}
                                        </button>


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
    <style type="text/css">
        .btn-light,.btn-light:focus,.btn-light:active{
            background: #cf0d7f !important;
            border-color: #cf0d7f !important;
        }
    </style>
@endsection
