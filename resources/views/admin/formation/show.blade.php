@extends('layouts.backend')

@section('title', 'Affichage de Formation #'.$formation->id )


@section('sidebar')
    <div
        class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">

        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-1">                
                Formation {{ $formation->id }}
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
               Affichage de Formation #{{$formation->id  }}
            </h2>
        </div>
        <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
            {!! Form::open(['method' => 'GET', 'url' => '/admin/formation', 'class' => 'd-none d-sm-inline-block', 'role' => 'search']) !!}

            <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-alt_" placeholder="Rechercher.."
                    id="page-header-search-input2" name="search"  placeholder="Rechercher..." value="{{ request('search') }}"
                    name="page-header-search-input2">
                <button type="submit" class="input-group-text border-1 bg-primary text-white">
                    <i class="fa fa-fw fa-search"></i>
                </button>
            </div>
            {!! Form::close() !!}

            <a class="btn btn-sm btn-alt-secondary bg-white border space-x-1" href="{{ url('/admin/formation/create') }}">
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
                        <a href="{{ url('/admin/formation') }}" title="Back" autofocus><button class="btn btn-secondary btn-sm" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/formation/' . $formation->id . '/edit') }}" title="Edit Formation"><button class="btn btn-alt-primary btn-sm"><i class="si si-note" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/formation', $formation->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="si si-trash" aria-hidden="true"></i> Supprimer', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Supprimer Formation',
                                    'onclick'=>'return confirm("Voulez-vous supprimer cet enrégistrement ?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $formation->id }}</td>
                                    </tr>
                                    <tr><th> Site </th><td> {{ $formation->site }} </td>
                                    </tr>
                                    <tr><th> Titre </th>
                                        <td> {{ $formation->titre }} </td>
                                    </tr>
                                    <tr><th> Conditions </th>
                                        <td> {!! $formation->conditions !!} </td>
                                    </tr>
                                    <tr><th> Débouchés </th>
                                        <td> {!! $formation->debouches !!} </td>
                                    </tr>
                                    <tr><th> Description </th>
                                        <td> {!! $formation->description !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Image </th>
                                        <td>
                                        @if($formation->image)
                                             <img src="{{ asset($formation->image) }}" class="img-fluid"> 
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
