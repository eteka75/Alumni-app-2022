@extends('layouts.backend')

@section('title', 'Tableau de bord')

@section('sidebar')
    @parent


@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--div class="row items-push">
                <div class="col-sm-6 col-xxl-3">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ isset($nb_activites)?$nb_activites:0 }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Activités</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="si si-list fs-3 text-secondary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content text-secondary block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ url('admin/activite') }}">
                                <span>Voir toutes les activités</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xxl-3">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ isset($nb_users)?$nb_users:0 }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Utilisateurs</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-user-circle fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content text-primary block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="url('admin/users')">
                                <span>Voir tous les utilisateurs</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xxl-3">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ isset($nb_messages)?$nb_messages:0 }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Messages</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="far fa-paper-plane text-warning fs-3 text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content text-warning block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ url('admin/message') }}">
                                <span>Voir tous les messages</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xxl-3">
                    <div class="block block-rounded d-flex flex-column h-100 mb-0">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ isset($nb_stats)?$nb_stats:0 }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Visiteurs</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                <i class="fa fa-chart-bar fs-3 text-info"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content text-info block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ url('admin/stats') }}">
                                <span>Voir les statistiques</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div-->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tâches</h3>
                    <div class="block-options space-x-1">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                            data-target="#one-dashboard-search-orders" data-class="d-none">
                            <i class="fa fa-search"></i>
                        </button>
                        <!--div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                id="dropdown-recent-orders-filters" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-fw fa-flask"></i>
                                Filters
                                <i class="fa fa-angle-down ms-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end fs-sm"
                                aria-labelledby="dropdown-recent-orders-filters">
                                <a class="dropdown-item fw-medium d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    Pending
                                    <span class="badge bg-primary rounded-pill">20</span>
                                </a>
                                <a class="dropdown-item fw-medium d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    Active
                                    <span class="badge bg-primary rounded-pill">72</span>
                                </a>
                                <a class="dropdown-item fw-medium d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    Completed
                                    <span class="badge bg-primary rounded-pill">890</span>
                                </a>
                                <a class="dropdown-item fw-medium d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    All
                                    <span class="badge bg-primary rounded-pill">997</span>
                                </a>
                            </div>
                        </div-->
                    </div>
                </div>
                <div id="one-dashboard-search-orders" class="block-content border-bottom d-none">
                    <form action="https://demo.pixelcave.com/oneui/be_pages_dashboard.html" method="POST"
                        onsubmit="return false;">
                        <div class="push">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-alt"
                                    id="one-ecom-orders-search" name="one-ecom-orders-search"
                                    placeholder="Search all orders..">
                                <span class="input-group-text bg-body border-0">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="block-content block-content-full">
                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter">
                            <thead>
                                <tr>
                                    <th class="d-none d-sm-table-cell">ID</th>
                                    <th class="d-none d-xl-table-cell">Tâche</th>
                                    <th>Activé</th>
                                    <th class="d-none d-sm-table-cell text-start">Désactivé</th>
                                    <th class="d-none d-sm-table-cell text-center">Total</th>
                                    <th class="d-none d-sm-table-cell text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fs-sm">
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        1
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/categorie') }}">Catégorie d'activités</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Type d'activités</p>
                                    
                                    </td>
                                    <td>
                                        {{ isset($nb_cat)?$nb_cat:0 }} 
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_cat)?$nb_cat:0 }}
                                       
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_cat)?$nb_cat:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/categorie/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell">
                                        2
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/activite') }}">Activités</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Les activités menées</p>
                                    
                                    </td>
                                    <td>
                                        {{ isset($nb_a_activites)?$nb_a_activites:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_activites)?$nb_pa_activites:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_activites)?$nb_pa_activites:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_activites)?$nb_d_activites:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_activites)?$nb_pd_activites:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_activites)?$nb_pd_activites:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_activites)?$nb_activites:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/activite/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       3
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/pages') }}">Gestion des pages</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Gestion des pages du site web</p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_pages)?$nb_a_pages:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_pages)?$nb_pa_pages:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_pages)?$nb_pa_pages:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_pages)?$nb_d_pages:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_pages)?$nb_pd_pages:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_pages)?$nb_pd_pages:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_pages)?$nb_pages:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/pages/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       4
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/communique') }}">Communiqués</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Communiqués, annonces, nootes de services,...</p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_com)?$nb_a_com:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_com)?$nb_pa_com:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_com)?$nb_pa_com:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_com)?$nb_d_com:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_com)?$nb_pd_com:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_com)?$nb_pd_com:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_com)?$nb_com:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/communique/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       5
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/slide') }}">Slides défilantes</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Images du carrousel de la page d'accueil</p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_slide)?$nb_a_slide:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_slide)?$nb_pa_slide:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_slide)?$nb_pa_slide:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_slide)?$nb_d_slide:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_slide)?$nb_pd_slide:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_slide)?$nb_pd_slide:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_slide)?$nb_slide:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/slide/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       6
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/formation') }}">Formations offertes</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Les formations, conditions, débouchés</p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_form)?$nb_a_form:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_form)?$nb_pa_form:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_form)?$nb_pa_form:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_form)?$nb_d_form:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_form)?$nb_pd_form:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_form)?$nb_pd_form:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_form)?$nb_form:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/slide/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       7
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/evenement') }}">Evènements</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Les évènements à venir</p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_event)?$nb_a_event:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_event)?$nb_pa_event:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_event)?$nb_pa_event:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_event)?$nb_d_event:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_event)?$nb_pd_event:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_event)?$nb_pd_event:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_event)?$nb_event:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/evenement/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       8
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/message') }}">Messages contact</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Les Messages envoyés sur le site</p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_mesg)?$nb_a_mesg:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_mesg)?$nb_pa_mesg:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_mesg)?$nb_pa_mesg:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_mesg)?$nb_d_mesg:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_mesg)?$nb_pd_mesg:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_mesg)?$nb_pd_mesg:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_mesg)?$nb_mesg:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/message') }}" class="btn btn-sm btn-primary rounded-pill">Consulter</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       9
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/enseignant') }}">Enseignants</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Nos enseignants</p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_ens)?$nb_a_ens:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_ens)?$nb_pa_ens:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_ens)?$nb_pa_ens:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_ens)?$nb_d_ens:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_ens)?$nb_pd_ens:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_ens)?$nb_pd_ens:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_form)?$nb_form:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/slide/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       10
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/membre') }}">Membre administratifs</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Les membres de l'administration</p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_membre)?$nb_a_membre:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_membre)?$nb_pa_membre:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_membre)?$nb_pa_membre:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_membre)?$nb_d_membre:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_membre)?$nb_pd_membre:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_membre)?$nb_pd_membre:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_membre)?$nb_membre:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/membre/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       11
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/galerie-image') }}">Galerie Images</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Les images de la galerie</p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_img)?$nb_a_img:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_img)?$nb_pa_img:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_img)?$nb_pa_img:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_img)?$nb_d_img:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_img)?$nb_pd_img:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_img)?$nb_pd_img:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_img)?$nb_img:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/galerie-image/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       12
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/galerie-video') }}">Galerie vidéos</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Ajout de vidéos YouTube </p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_video)?$nb_a_video:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_video)?$nb_pa_video:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_video)?$nb_pa_video:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_video)?$nb_d_video:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_video)?$nb_pd_video:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_video)?$nb_pd_video:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_video)?$nb_video:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/galerie-video/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="d-none d-sm-table-cell ">
                                       13
                                    </td>
                                    <td class="d-none d-xl-table-cell">
                                        <a class="fw-semibold" href="{{ url('admin/fichier') }}">Fichiers à télécharger</a>
                                        <p class="fs-sm fw-medium text-muted mb-0">Les fichiers téléchargeables</p>
                                    </td>
                                    <td>
                                        {{ isset($nb_a_fich)?$nb_a_fich:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ isset($nb_pa_fich)?$nb_pa_fich:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pa_fich)?$nb_pa_fich:0 }}%</p>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                       {{ isset($nb_d_fich)?$nb_d_fich:0 }}
                                        <div class="progress mb-1" style="height: 5px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: {{ isset($nb_pd_fich)?$nb_pd_fich:0 }}%;" aria-valuenow="11" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <p class="fs-xs fw-semibold mb-0">{{ isset($nb_pd_fich)?$nb_pd_fich:0 }}%</p>
                                   
                                    </td>
                                    <td class="d-none d-sm-table-cell fw-semibold text-muted text-center">
                                        {{ isset($nb_fich)?$nb_fich:0 }}
                                    </td>
                                    <td class="d-none d-sm-table-cell text-end">
                                        <a href="{{ url('admin/fichier/create') }}" class="btn btn-sm btn-primary rounded-pill">Ajouter</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
@endsection
