@extends('layouts.backend')

@section('title', 'Affichage de Enseignant #'.$enseignant->id )


@section('sidebar')
    <div
        class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">

        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-1">                
                Enseignant {{ $enseignant->id }}
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
               Affichage de Enseignant #{{$enseignant->id  }}
            </h2>
        </div>
        <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
            {!! Form::open(['method' => 'GET', 'url' => '/admin/enseignant', 'class' => 'd-none d-sm-inline-block', 'role' => 'search']) !!}

            <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-alt_" placeholder="Rechercher.."
                    id="page-header-search-input2" name="search"  placeholder="Rechercher..." value="{{ request('search') }}"
                    name="page-header-search-input2">
                <button type="submit" class="input-group-text border-1 bg-primary text-white">
                    <i class="fa fa-fw fa-search"></i>
                </button>
            </div>
            {!! Form::close() !!}

            <a class="btn btn-sm btn-alt-secondary bg-white border space-x-1" href="{{ url('/admin/enseignant/create') }}">
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
                        <a href="{{ url('/admin/enseignant') }}" title="Back" autofocus><button class="btn btn-secondary btn-sm" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/enseignant/' . $enseignant->id . '/edit') }}" title="Edit Enseignant"><button class="btn btn-alt-primary btn-sm"><i class="si si-note" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/enseignant', $enseignant->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="si si-trash" aria-hidden="true"></i> Supprimer', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Supprimer Enseignant',
                                    'onclick'=>'return confirm("Voulez-vous supprimer cet enrégistrement ?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $enseignant->id }}</td>
                                    </tr>
                                    <tr><th> Site </th><td> {{ $enseignant->site }} </td></tr>
                                    <tr><th> Nom </th><td> {{ $enseignant->nom }} </td></tr>
                                    <tr><th> Prénom </th><td> {{ $enseignant->prenom }} </td></tr>
                                    <tr><th> Sexe </th><td> {{ $enseignant->sexe=='M'?'Masculin':'Féminin' }} </td></tr>
                                    <tr><th> Spécialité </th><td> {{ $enseignant->specialite }} </td></tr>
                                    <tr><th> Ecole </th><td> {{ $enseignant->ecole }} </td></tr>
                                    <tr><th> Poste </th><td> {{ $enseignant->poste }} </td></tr>
                                    <tr><th> Email </th><td> {{ $enseignant->email }} </td></tr>
                                    <tr><th> Téléphone </th><td> {{ $enseignant->telephone }} </td></tr>
                                    <tr><th> Facebook </th><td> {{ $enseignant->lien_facebook }} </td></tr>
                                    <tr><th> Linkedin </th><td> {{ $enseignant->lien_linkedin }} </td></tr>
                                    <tr><th> Biographie </th><td> {!! $enseignant->biographie !!} </td></tr>
                                    <tr><th> Image </th>
                                        <td>
                                            @if($enseignant->photo)
                                            <img src=" {{ asset($enseignant->photo) }}" alt="Photo" class="img-fluid">
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
