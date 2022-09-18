@extends('layouts.backend')
@section('title', 'Affichage #'.$page->id )


@section('sidebar')
    <div
        class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">

        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-1">                
                Page {{ $page->id }}
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
               Affichage de la Page {{ $page->id }}
            </h2>
        </div>
        <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
            {!! Form::open(['method' => 'GET', 'url' => '/admin/pages', 'class' => 'd-none d-sm-inline-block', 'role' => 'search']) !!}

            <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-alt_" placeholder="Rechercher.."
                    id="page-header-search-input2" name="search" value="{{ request('search') }}"
                    name="page-header-search-input2">
                <button type="submit" class="input-group-text border-1 bg-primary text-white">
                    <i class="fa fa-fw fa-search"></i>
                </button>
            </div>
            {!! Form::close() !!}

            <a class="btn btn-sm btn-alt-secondary bg-white border space-x-1" href="{{ url('/admin/pages/create') }}">
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
                <div class="card">
                    <div class="card-body">

                        <a href="{{ url('/admin/pages') }}" title="Retour"><button class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/pages/' . $page->id . '/edit') }}" title="Editer Page"><button class="btn btn-alt-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/pages', $page->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-alt-danger btn-sm',
                                    'title' => 'Delete Page',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $page->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $page->title }} </td></tr>
                                    <tr><th> Image </th>
                                        <td>
                                            @if($page->photo)
                                            <img src=" {{ asset($page->photo) }}" alt="Photo" class="img-fluid">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr><th> Content </th><td> {!! $page->content !!} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
