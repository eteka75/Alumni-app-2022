@extends('layouts.backend')

@section('title', 'Editer Message  #'.$message->id  )


@section('sidebar')
    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">

        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-1">                
                 Message #{{ $message->id }}
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
               Edition de Message #{{ $message->id }}
            </h2>
        </div>
        <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
            {!! Form::open(['method' => 'GET', 'url' => '/admin/message', 'class' => 'd-none d-sm-inline-block', 'role' => 'search']) !!}

            <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-alt_" placeholder="Rechercher.."
                    id="page-header-search-input2" name="search" value="{{ request('search') }}"
                    name="page-header-search-input2">
                <button type="submit" class="input-group-text border-1 bg-primary text-white">
                    <i class="fa fa-fw fa-search"></i>
                </button>
            </div>
            {!! Form::close() !!}

            <a class="btn btn-sm btn-alt-secondary bg-white border space-x-1" href="{{ url('/admin/message/create') }}">
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
                        <a href="{{ url('/admin/message') }}" title="Back" autofocus><button class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($message, [
                            'method' => 'PATCH',
                            'url' => ['/admin/message', $message->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.message.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
