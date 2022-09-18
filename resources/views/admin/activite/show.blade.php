@extends('layouts.backend')

@section('title', 'Affichage de Activite #'.$activite->id )


@section('sidebar')
    <div
        class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">

        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-1">                
                Activite {{ $activite->id }}
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
               Affichage de Activite #{{$activite->id  }}
            </h2>
        </div>
        <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
            {!! Form::open(['method' => 'GET', 'url' => '/admin/activite', 'class' => 'd-none d-sm-inline-block', 'role' => 'search']) !!}

            <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-alt_" placeholder="Rechercher.."
                    id="page-header-search-input2" name="search"  placeholder="Rechercher..." value="{{ request('search') }}"
                    name="page-header-search-input2">
                <button type="submit" class="input-group-text border-1 bg-primary text-white">
                    <i class="fa fa-fw fa-search"></i>
                </button>
            </div>
            {!! Form::close() !!}

            <a class="btn btn-sm btn-alt-secondary bg-white border space-x-1" href="{{ url('/admin/activite/create') }}">
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
                        <a href="{{ url('/admin/activite') }}" title="Back"><button class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/activite/' . $activite->id . '/edit') }}" title="Edit Activite"><button class="btn btn-alt-primary btn-sm"><i class="si si-note" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/activite', $activite->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="si si-trash" aria-hidden="true"></i> Supprimer', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Supprimer Activite',
                                    'onclick'=>'return confirm("Voulez-vous supprimer cet enrégistrement ?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $activite->id }}</td>
                                    </tr>
                                    <tr><th> Site </th><td> {{ $activite->site }} </td></tr>
                                    <tr><th> Titre </th><td> {{ $activite->titre }} </td></tr>
                                    <tr><th> Slug </th><td> {{ $activite->slug }} </td></tr>
                                    <tr><th> Image </th>
                                        <td>
                                            @if($activite->image)
                                            <img src=" {{ asset($activite->image) }}" alt="Photo" class="img-fluid">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr><th> Contenu </th><td> {!! $activite->content !!} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
