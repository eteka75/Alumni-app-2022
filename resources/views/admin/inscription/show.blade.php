@extends('layouts.backend')

@section('title', 'Affichage de Inscription #'.$inscription->id )


@section('sidebar')
    <div
        class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">

        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-1">                
                Inscription {{ $inscription->id }}
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
               Affichage de Inscription #{{$inscription->id  }}
            </h2>
        </div>
        <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
            {!! Form::open(['method' => 'GET', 'url' => '/admin/inscription', 'class' => 'd-none d-sm-inline-block', 'role' => 'search']) !!}

            <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-alt_" placeholder="Rechercher.."
                    id="page-header-search-input2" name="search"  placeholder="Rechercher..." value="{{ request('search') }}"
                    name="page-header-search-input2">
                <button type="submit" class="input-group-text border-1 bg-primary text-white">
                    <i class="fa fa-fw fa-search"></i>
                </button>
            </div>
            {!! Form::close() !!}

            <a class="btn btn-sm btn-alt-secondary bg-white border space-x-1" href="{{ url('/admin/inscription/create') }}">
                <i class="fa fa-plus opacity-50"></i>
                <span>Ajouter</span>
            </a>              
        </div>
    </div>
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-9">
                <div class="block block-rounded">                                    
                    <div class="card-body">
                        <a href="{{ url('/admin/inscription') }}" title="Back" autofocus><button class="btn btn-secondary btn-sm" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/inscription/' . $inscription->id . '/edit') }}" title="Edit inscription"><button class="btn btn-alt-primary btn-sm"><i class="si si-note" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/inscription', $inscription->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="si si-trash" aria-hidden="true"></i> Supprimer', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Supprimer inscription',
                                    'onclick'=>'return confirm("Voulez-vous supprimer cet enrégistrement ?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $inscription->id }}</td>
                                    </tr>
                                   
                                    <tr><th> Site </th><td> {{ $inscription->site }} </td></tr>
                                    <tr><th> Nom </th><td> {{ $inscription->nom }} </td></tr>
                                    <tr><th> Prénom </th><td> {{ $inscription->prenom }} </td></tr>
                                    <tr><th> CODE </th><td> {{ $inscription->code }} </td></tr>
                                    <tr><th> Sexe </th><td> {{ $inscription->sexe=="M"?"Masculin":'Féminin' }} </td></tr>
                                    <tr><th> Date de naissance </th><td> {{ date ('d/m/Y', strtotime($inscription->date_naissance)) }} </td></tr>
                                    <tr><th> Lieu de naissance </th><td> {{ $inscription->lieu_naissance }} </td></tr>
                                    <tr><th> Contact </th><td> {{ $inscription->contact }} </td></tr>
                                    <tr><th> Nom du père </th><td> {{ $inscription->nom_pere }} </td></tr>
                                    <tr><th> Nom de la mère </th><td> {{ $inscription->nom_mere }} </td></tr>
                                    <tr><th> Contact parents</th><td> {{ $inscription->contact_parents }} </td></tr>
                                    <tr><th> Nom du tuteur</th><td> {{ $inscription->nom_tuteur }} </td></tr>
                                    <tr><th> Contact du tuteur</th><td> {{ $inscription->contact_tuteur }} </td></tr>
                                    <tr><th> Email</th><td> {{ $inscription->email }} </td></tr>
                                    <tr><th> Filière</th><td> {{ $inscription->formation?$inscription->formation->titre:'-' }} </td></tr>
                                    <tr><th> Classe</th><td> {{ $inscription->classe }} </td></tr>
                                    <tr><th> Photo </th><td>
                                        <img src="{{ asset($inscription->photo) }}" alt="{{ $inscription->nom }}" height="100px" class="img-fluisd">    
                                        </td></tr>
                                    <tr><th> Fichiers</th><td>
                                        @if($inscription->acte_de_naissance)
                                       Acte de naissance  <a href="{{ asset($inscription->acte_de_naissance) }}" target="_blanck">Télécharger</a><br>
                                       @endif
                                       @if($inscription->dernier_bulletin)
                                       Dernier bulletin <a href="{{ asset($inscription->dernier_bulletin) }}" target="_blanck">Télécharger</a><br>
                                       @endif
                                       @if($inscription->certificat)
                                       Certificat de scolarité <a href="{{ asset($inscription->certificat) }}" target="_blanck">Télécharger</a><br>
                                        @endif
                                    </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
