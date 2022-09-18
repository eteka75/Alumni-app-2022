@extends('layouts.backend')
@section('title', 'Création de pages')

@section('sidebar')
    <div
        class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">

        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-1">
                Gestion des pages
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                Créer et modifiez vos Pages
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

            <a autofocus class="btn btn-sm btn-alt-secondary bg-white border space-x-1" href="{{ url('/admin/pages/create') }}">
                <i class="fa fa-plus opacity-50"></i>
                <span>Ajouter</span>
            </a>

           
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-sm btn-alt-secondary bg-white space-x-1"
                    id="dropdown-analytics-overview" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-list-alt opacity-50"></i>
                    <span>Afficher</span>
                    <i class="fa fa-fw fa-angle-down"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-analytics-overview">
                   
                    <a class="dropdown-item fw-medium" href="{{ url('admin/pages') }}?nb=5&order={{ isset($order)?$order:"ASC" }}">5 enrégistrements {!! Request::input('nb')==5?'<i class="fa fa-check"></i>':'' !!}</a>
                    <a class="dropdown-item fw-medium" href="{{ url('admin/pages') }}?nb=10&order={{ isset($order)?$order:"ASC" }}">10 enrégistrements {!! Request::input('nb')==10?'<i class="fa fa-check"></i>':'' !!}</a>
                    <a class="dropdown-item fw-medium" href="{{ url('admin/pages') }}?nb=20&order={{ isset($order)?$order:"ASC" }}">20 enrégistrements {!! Request::input('nb')==20?'<i class="fa fa-check"></i>':'' !!}</a>
                    <a class="dropdown-item fw-medium" href="{{ url('admin/pages') }}?nb=30&order={{ isset($order)?$order:"ASC" }}">30 enrégistrements {!! Request::input('nb')==30?'<i class="fa fa-check"></i>':'' !!}</a>
                    
                    <!--a class="dropdown-item fw-medium d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            <span>All time</span>
                            <i class="fa fa-check"></i>
                        </a-->
                </div>
                <div  class="dropdown d-inline-block">
                    @if(Request::input('order')=="DESC")
                        <a href="{{url('admin/pages') }}?order=ASC" target="_self" class="btn btn-sm btn-alt-secondary bg-white border space-x-1">
                            <i  title="Trie croissant" class="fa fa-arrow-up"></i>
                        </a>
                    @else
                        <a href="{{ url('admin/pages') }}?order=DESC&nb={{ isset($nb)?$nb:10 }}"  target="_self" class="btn btn-sm btn-alt-secondary bg-white border space-x-1">
                            <i  title="Trie décroissant" class="fa fa-arrow-down"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="">
        <div class="row">

            <div class="col-md-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ isset($nb)?$nb:'' }} Enrégistrements {{ isset($nb)?'par page':'' }}</h3>
                        <div class="block-options space-x-1">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                                data-target="#one-dashboard-search-orders" data-class="d-none">
                                <i class="fa fa-search"></i>
                            </button>

                        </div>
                    </div>
                    <div id="one-dashboard-search-orders" class="block-content border-bottom d-none">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/pages', 'class' => 'd-none d-sm-block', 'role' => 'search']) !!}

                        <div class="push">
                            <div class="input-group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control form-control-alt" id="one-ecom-orders-search"
                                    placeholder="Rechercher..">
                                <button type="submit" class="input-group-text bg-body border-0">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="table-responsive">
                            <table class="table table-hover table-vcenter">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="d-none d-xl-table-cell">Titre</th>
                                        <th>Etat</th>
                                        <th class="d-none d-sm-table-cell text-center">Etat</th>
                                        <th class="d-none d-sm-table-cell text-start">Date d'ajout</th>
                                        <th class="d-none d-sm-table-cell text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="fs-sm">
                                    @foreach ($pages as $item)
                                        <tr>
                                            <td>
                                                {{ $item->id }}  </td>
                                            <td>{{ $item->title }}<br>
                                                <small class="text-muted">  {{ $item->slug }}</small>                                            
                                            
                                              </td>
                                            <td>
                                                @if($item->etat==1)
                                                <span class="badge bg-success rounded-pill">Activé</span>
                                                @else
                                                <span class="badge bg-secondary rounded-pill">Inactif</span>
                                                @endif
                                            </td>
                                            <td></td>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('/admin/pages/' . $item->id) }}" title="Voir Page"><button
                                                        class="btn btn-alt-primary btn-sm"><i class="si si-eye"
                                                            aria-hidden="true"></i></button></a>
                                                <a href="{{ url('/admin/pages/' . $item->id . '/edit') }}"
                                                    title="Editer Page"><button class="btn btn-alt-primary btn-sm"><i
                                                            class="si si-note" aria-hidden="true"></i></button></a>
                                                {!! Form::open([
    'method' => 'DELETE',
    'url' => ['/admin/pages', $item->id],
    'style' => 'display:inline',
]) !!}
                                                {!! Form::button('<i class="si si-trash" aria-hidden="true"></i>', [
    'type' => 'submit',
    'class' => 'btn btn-danger btn-sm',
    'title' => 'Supprimer Page',
    'onclick' => 'return confirm("Voulez-vous supprimer cette page ?")',
]) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="block-content block-content-full bg-body-light">
                       
                        {{ $pages->appends(['search' => $search,'nb'=>$nb,"order"=>$order])->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
