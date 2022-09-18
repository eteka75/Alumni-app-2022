@extends('layouts.backend')

@section('title', "%%crudNameCap%%")

@section('sidebar')
    <div
        class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-1">
                Gestion des %%crudNameCap%%
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                Créer et modifiez vos %%crudNameCap%%
            </h2>
        </div>
        <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
            {!! Form::open(['method' => 'GET', 'url' => '/%%routeGroup%%%%viewName%%', 'class' => 'd-none d-sm-inline-block', 'role' => 'search']) !!}

            <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-alt_" placeholder="Rechercher.."
                    id="page-header-search-input2" name="search"  placeholder="Rechercher..." value="{{ request('search') }}"
                    name="page-header-search-input2">
                <button type="submit" class="input-group-text border-1 bg-primary text-white">
                    <i class="fa fa-fw fa-search"></i>
                </button>
            </div>
            {!! Form::close() !!}

            <a class="btn btn-sm btn-alt-secondary bg-white border space-x-1" href="{{ url('/%%routeGroup%%%%viewName%%/create') }}">
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
                   
                    <a class="dropdown-item fw-medium" href="{{ url('/%%routeGroup%%%%viewName%%') }}?nb=5&order={{ isset($order)?$order:"ASC" }}">5 enrégistrements {!! Request::input('nb')==5?'<i class="fa fa-check"></i>':'' !!}</a>
                    <a class="dropdown-item fw-medium" href="{{ url('/%%routeGroup%%%%viewName%%') }}?nb=10&order={{ isset($order)?$order:"ASC" }}">10 enrégistrements {!! Request::input('nb')==10?'<i class="fa fa-check"></i>':'' !!}</a>
                    <a class="dropdown-item fw-medium" href="{{ url('/%%routeGroup%%%%viewName%%') }}?nb=20&order={{ isset($order)?$order:"ASC" }}">20 enrégistrements {!! Request::input('nb')==20?'<i class="fa fa-check"></i>':'' !!}</a>
                    <a class="dropdown-item fw-medium" href="{{ url('/%%routeGroup%%%%viewName%%') }}?nb=30&order={{ isset($order)?$order:"ASC" }}">30 enrégistrements {!! Request::input('nb')==30?'<i class="fa fa-check"></i>':'' !!}</a>
                    
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
                        <a href="{{ url('/%%routeGroup%%%%viewName%%') }}?order=DESC&nb={{ isset($nb)?$nb:10 }}"  target="_self" class="btn btn-sm btn-alt-secondary bg-white border space-x-1">
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
                         {!! Form::open(['method' => 'GET', 'url' => '/%%routeGroup%%%%viewName%%', 'class' => 'd-none d-sm-inline-block', 'role' => 'search']) !!}

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
                                        <th>#</th>%%formHeadingHtml%%<th class="d-none d-xl-table-cell">Actions</th>
                                    </tr>
                                </thead>
                                 <tbody class="fs-sm">
                                @foreach($%%crudName%% as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->%%primaryKey%% }}</td>
                                        %%formBodyHtml%%
                                        <td>
                                            <a href="{{ url('/%%routeGroup%%%%viewName%%/' . $item->%%primaryKey%%) }}" title="Voir %%modelName%%"><button class="btn btn-alt-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/%%routeGroup%%%%viewName%%/' . $item->%%primaryKey%% . '/edit') }}" title="Editer %%modelName%%"><button class="btn btn-alt-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/%%routeGroup%%%%viewName%%', $item->%%primaryKey%%],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Supprimer %%modelName%%',
                                                        'onclick'=>'return confirm("Voulez-vous supprimer cet enrégistrements ?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                             <div class="block-content block-content-full bg-body-light">
                                {{ $pages->appends(['search' => $search,'nb'=>isset($nb)?$nb:'',"order"=>isset($order)?$order:''])->links('vendor.pagination.custom') }}
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
