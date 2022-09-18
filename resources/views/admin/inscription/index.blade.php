@extends('layouts.backend')

@section('title', "Inscriptions")

@section('sidebar')
    <div
        class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
        <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-1">
            Inscriptions
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                Création et gestion des Inscriptions
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

            <a class="btn btn-sm btn-alt-secondary bg-white border space-x-1" href="{{ url('/admin/inscription/create') }}" autofocus>
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
                   
                    <a class="dropdown-item fw-medium" href="{{ url('/admin/inscription') }}?nb=5&order={{ isset($order)?$order:"ASC" }}&search={{ isset($search)?$search:null }}">5 enrégistrements {!! (isset($nb) && $nb==5)?'<i class="fa fa-check"></i>':'' !!}</a>
                    <a class="dropdown-item fw-medium" href="{{ url('/admin/inscription') }}?nb=10&order={{ isset($order)?$order:"ASC" }}&search={{ isset($search)?$search:null }}">10 enrégistrements {!! (isset($nb) && $nb==10)?'<i class="fa fa-check"></i>':'' !!}</a>
                    <a class="dropdown-item fw-medium" href="{{ url('/admin/inscription') }}?nb=20&order={{ isset($order)?$order:"ASC" }}&search={{ isset($search)?$search:null }}">20 enrégistrements {!! (isset($nb) && $nb==20)?'<i class="fa fa-check"></i>':'' !!}</a>
                    <a class="dropdown-item fw-medium" href="{{ url('/admin/inscription') }}?nb=30&order={{ isset($order)?$order:"ASC" }}&search={{ isset($search)?$search:null }}">30 enrégistrements {!! (isset($nb) && $nb==30)?'<i class="fa fa-check"></i>':'' !!}</a>
                    
                    <!--a class="dropdown-item fw-medium d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            <span>All time</span>
                            <i class="fa fa-check"></i>
                        </a-->
                </div>
                <div  class="dropdown d-inline-block">
                    @if(Request::input('order')=="DESC")
                        <a href="{{ url('/admin/inscription') }}?order=ASC&nb={{ isset($nb)?$nb:5 }}&search={{ isset($search)?$search:null }}" target="_self" class="btn btn-sm btn-alt-secondary bg-white border space-x-1">
                            <i  title="Trie croissant" class="fa fa-arrow-up"></i>
                        </a>
                    @else
                        <a href="{{ url('/admin/inscription') }}?order=DESC&nb={{ isset($nb)?$nb:5 }}&search={{ isset($search)?$search:null }}"  target="_self" class="btn btn-sm btn-alt-secondary bg-white border space-x-1">
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
                        <h3 class="block-title">{{ isset($nb)?$nb:'' }} Enrégistrements {{ isset($nb)?'par page':'' }}</h3>  {!! isset($search) && $search!="" ?'<span class=" float-end "><span class="text-capitalize">Recherche : </span><span class="text-primary">'.$search.'</span></span>':'' !!}
                        <div class="block-options space-x-1">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                                data-target="#one-dashboard-search-orders" data-class="d-none">
                                <i class="fa fa-search"></i>
                            </button>

                        </div>
                    </div>
                    <div id="one-dashboard-search-orders" class="block-content border-bottom d-none">
                         {!! Form::open(['method' => 'GET', 'url' => '/admin/inscription', 'class' => 'd-none d-none d-sm-block', 'role' => 'search']) !!}

                        <div class="push">
                            <div class="input-group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control form-control-alt" id="one-ecom-orders-search"
                                    placeholder="Rechercher...">
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
                                        <th class="text-start">#</th>
                                        <th>SITE</th>
                                        <th>Nom et Prénom</th>
                                        <th>CODE</th>
                                        <th>FORMATION</th>
                                        <th>Sexe</th>
                                        
                                        <th class="d-none d-sm-table-cell text-start">Date d'inscription</th>
                                        <th class="d-none d-xl-table-cell text-end">Actions</th>
                                    </tr>
                                </thead>
                                 <tbody class="fs-sm">
                                @foreach($inscription as $item)
                                    <tr>
                                        <td class="text-start">{{  $item->id }}</td>
                                        <td>{{ $item->site }}</td>
                                        <td>{{ $item->nom }} {{ $item->prenom }}</td>
                                        <td class="text-start">{{  $item->code }}</td>
                                        <td class="text-start">{{  $item->formation?$item->formation->titre:'-' }}</td>
                                        <td>{{ $item->sexe=="M"?'Masculin':'Féminin' }}</td>
                                        <td class="">
                                        <div class="text-sm text-dark">{{ date('d/m/Y à H\h i\m\i\n',strtotime($item->created_at)) }}</div>
                                        
                                        </td>
                                        <td class="text-end">
                                         @if(Auth::user()->hasRole('Redacteur') || Auth::user()->hasRole('Admin')|| Auth::user()->hasRole('SuperU'))
                                            <a href="{{ url('/inscription/fiche?code=' . $item->code) }}" target="_blanck" title="Imprimer la fiche de pré-inscription"><button class="btn btn-alt-success btn-sm"><i class="si si-doc" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/inscription/' . $item->id) }}" title="Voir inscription"><button class="btn btn-alt-primary btn-sm"><i class="si si-eye" aria-hidden="true"></i></button></a>
                                            
                                            <a href="{{ url('/admin/inscription/' . $item->id . '/edit') }}" title="Editer inscription"><button class="btn btn-alt-primary btn-sm"><i class="si si-note" aria-hidden="true"></i></button></a>
                                           @endif
                                            @if(Auth::user()->hasRole('SuperU') || Auth::user()->hasRole('Admin'))
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/inscription', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="si si-trash" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Supprimer inscription',
                                                        'onclick'=>'return confirm("Voulez-vous supprimer cet enrégistrements ?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @if($inscription->count()==0)
                                     <td class="text-center" colspan="8">
                                        Aucun enrégistrement disponible !<br>
                                        @if(!(isset($search) && $search!=""))
                                         <a accesskey="n"  class="btn btn-sm btn-alt-secondary  border space-x-1" href="{{ url('/admin/inscription/create') }}">
                                            <i class="fa fa-plus opacity-50"></i>
                                            <span>Ajouter</span>
                                        </a> 
                                        @endif
                                     </td>
                                @endif
                                </tbody>
                            </table>
                            </div>
                            

                    </div>
                    @if($inscription->lastPage()>1)
                        <div class="block-content block-content-full bg-body-light">
                            {{ $inscription->appends(['search' => $search,'nb'=>isset($nb)?$nb:'',"order"=>isset($order)?$order:''])->links('vendor.pagination.custom') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
