@extends('layouts.web')

@section('title', 'Renseignements sur votre Profil et Formation')
@section('scripts')
<script src="{{ asset('storage/assets/web/vendor/cleave.js/dist/cleave.min.js') }}"></script>
@endsection
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
                                        <div class="media-body pl-3"><span class="badge badge-primary badge-pill mb-1">En
                                                cours</span>
                                            <h6 class="text-primary mb-0">Profil et Formation</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="media align-items-center mb-4">
                                        <div class="rounded-circle border text-center"
                                            style="width: 60px; height: 60px; line-height: 54px;"><i
                                                class="fe-star font-size-xl"></i></div>
                                        <div class="media-body pl-3"><span
                                                class="d-block text-muted font-size-ms mb-1">Troisième étape</span>
                                            <h6 class="mb-0">Profession</h6>
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
                <div class="col-md-10 col-xl-8 py-3  p-sm-4 mb-5 py-sm-5 rounded shadow-sm col-12 mx-auto">
                    <div class="card_p-5 box-shadowrounded mb-5">

                        <div class=" px-4">
                            <div class="text-center mb-4">
                                <h3 class="mb-0">Renseignements sur votre profil & formation </h3>
                               <small>Renseignez les informations sur votre profil et votre formation à l'UP</small>

                            
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

                                <label class="text-uppercase text-muted"> Renseignez sur votre PROFIL</label>
                                <hr class="p-0 mb-4">
                                <!-- Text input -->
                                <label for="text-input">Photo de profil</label>
                                <div class="form-group">
                                    <div class="cs-file-drop-area">
                                        <div class="cs-file-drop-icon czi-cloud-upload">

                                            <div class="cs-file-drop-icon fe-upload"></div>
                                        </div>
                                        <span class="cs-file-drop-message">Déplacez et déposez votre photo ici</span>
                                        <input name="photo" id="photo" type="file" accept=".jpeg,.png,.jpg,.webp,.gif" class="cs-file-drop-input">
                                        <button type="button" class="cs-file-drop-btn btn btn-primary btn-sm">ou sélectionnez un fichier</button>
                                      </div>
                                      @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                               
                                <!-- Text input -->
                                <div class="form-group row">
                                    <div class="col-md-6 {{ $errors->has('sexe') ? 'has-error' : ''}}">
                                        <label for="text-input">Sexe  (*)</label>
                                        {!! Form::select('sexe', [''=>"-Sélectionnez-",'M'=>'Masculin','F'=>'Féminin'], null,'required' == 'required' ? ['class' => 'form-control  custom-select rounded-1', 'required' => 'required'] : ['class' => 'form-control  custom-select']) !!}
                                 
                                        @error('sexe')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                   </div>
                                    <div class="col-md-6 {{ $errors->has('telephone') ? 'has-error' : ''}}">
                                        <label for="text-input">Numéro de téléphone  (*)</label>
                                        <input id="telephone" type="text" required name="telephone" placeholder="+229 97000000" value="{{ old('telephone') }}" class="form-control @error('telephone') is-invalid @enderror"   autocomplete="telephone">
    
                                        @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  
                                   <div class="col-md-6 {{ $errors->has('age') ? 'has-error' : ''}}">
                                    <label for="text-input">Votre âge actuel (*)</label>
                                    <input id="age" type="number" id="format-card-cvc" data-format="cvc" name="age" value="{{ old('age') }}" placeholder="25" class="form-control @error('age') is-invalid @enderror"  required autocomplete="age">

                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                   </div>
                                <div class="col-md-6 {{ $errors->has('site_web') ? 'has-error' : ''}}">
                                    <label for="text-input">Site web </label>
                                    <input id="site_web" type="url" value="{{ old('site_web') }}" name="site_web" placeholder="https://www.monsiteweb.com/monprofil" class="form-control @error('site_web') is-invalid @enderror"   autocomplete="site_web">

                                    @error('site_web')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <label class="text-uppercase d-block text-muted"> Renseignez sur votre formation</label>
                                <hr class="p-0 mb-4">
                                <!-- Text input -->
                                <div class="form-group row">
                                <div class="form-group col-md-6 {{ $errors->has('annee_academique') ? 'has-error' : ''}}">
                                    <label for="text-input">Année académique </label>
                                    <input id="annee_academique" value="{{ old('annee_academique') }}" data-format="custom" data-delimiter="-" data-blocks="4 4"  type="text" name="annee_academique" placeholder="{{ date('Y')-5 }}-{{ date('Y')-6 }}" class="form-control @error('age') is-invalid @enderror"  required autocomplete="annee_academique">
                                    
                                    @error('annee_academique')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                                <div class="col-md-6 {{ $errors->has('etablissement_id') ? 'has-error' : ''}}">
                                    <label for="text-input">Etablissement principale (*)</label>
                                    
                                    {!! Form::select('etablissement_id', isset($etablissements)?($etablissements):[''=>"Choisir établissement"], null,'required' == 'required' ? ['class' => 'form-control  custom-select rounded-1', 'required' => 'required'] : ['class' => 'form-control  custom-select']) !!}
                                    @error('etablissement_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 {{ $errors->has('filiere_id') ? 'has-error' : ''}}">
                                    <label for="filiere_id">Filière (*)</label>
                                    {!! Form::select('filiere_id', isset($filieres)?($filieres):[''=>'Choisir filière'], null,'required' == 'required' ? ['class' => 'form-control  custom-select rounded-1', 'required' => 'required'] : ['class' => 'form-control  custom-select']) !!}
                                    
                                    @error('filiere_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 {{ $errors->has('diplome') ? 'has-error' : ''}}">
                                    <label for="text-input">Diplôme (*)</label>
                                    <div>
  
                                        <!-- Inline radio buttons -->
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" {{ old('diplome')=='LICENCE'?"checked":'' }}  value="LICENCE" type="radio" id="ex-radio-4" name="diplome" required>
                                            <label class="custom-control-label" for="ex-radio-4">LICENCE</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" {{ old('diplome')=='MASTER'?"checked":'' }} value="MASTER" type="radio" id="ex-radio-5" name="diplome" required>
                                            <label class="custom-control-label" for="ex-radio-5">MASTER</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" {{ old('diplome')=='DOCTORAT'?"checked":'' }}  value="DOCTORAT" type="radio" id="ex-radio-6" name="diplome" required>
                                            <label class="custom-control-label" for="ex-radio-6">DOCTORAT</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" {{ old('diplome')=='AUTRE'?"checked":'' }}  value="AUTRE" type="radio" id="ex-radio-7" name="diplome" required>
                                            <label class="custom-control-label" for="ex-radio-7">AUTRE</label>
                                        </div>
                                        </div>
                                    @error('diplome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                </div>
                                </div>

                                <!-- Textarea -->
                                <div class="form-group {{ $errors->has('theme_memoire') ? 'has-error' : ''}}">
                                    <label for="theme_memoire">Thème de mémoire</label>
                                    <textarea class="form-control" name="theme_memoire" id="theme_memoire" rows="5">{!! old('theme_memoire')!!} </textarea>
                                    @error('theme_memoire')
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
@endsection
