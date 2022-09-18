@extends('layouts.web')

@section('title', "Forum aux questions")

@section('sidebar')

    <section class="breadcrumb-section py-5">
        <div class="container">
            <h2 class="h2">Forum aux questions</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Index')}}">Accueil</a></li>
                <li class="breadcrumb-item">Forum aux questions</li>
            </ol>
        </div><!-- /.container -->
    </section> 
    
@endsection

@section('content')
<section class="container py-5">
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-9">
      <div class="accordion accordion-alt" id="faq">
        <div class="card border-0 box-shadow card-active">
          <div class="card-header">
            <h3 class="accordion-heading"><a href="#faq-1" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="faq-1">Can I import my projects from Teamwork?<span class="accordion-indicator"></span></a></h3>
          </div>
          <div class="collapse show" id="faq-1" data-parent="#faq">
            <div class="card-body font-size-sm">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim.</p>
              <p class="mb-0">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
            </div>
          </div>
        </div>
        <div class="card border-0 box-shadow">
          <div class="card-header">
            <h3 class="accordion-heading"><a class="collapsed" href="#faq-2" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="faq-2">What are correct file permissions?<span class="accordion-indicator"></span></a></h3>
          </div>
          <div class="collapse" id="faq-2" data-parent="#faq">
            <div class="card-body font-size-sm">
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim.</p>
            </div>
          </div>
        </div>
        <div class="card border-0 box-shadow">
          <div class="card-header">
            <h3 class="accordion-heading"><a class="collapsed" href="#faq-3" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="faq-3">How to set default projects for new users?<span class="accordion-indicator"></span></a></h3>
          </div>
          <div class="collapse" id="faq-3" data-parent="#faq">
            <div class="card-body font-size-sm">
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim.</p>
            </div>
          </div>
        </div>
        <div class="card border-0 box-shadow">
          <div class="card-header">
            <h3 class="accordion-heading"><a class="collapsed" href="#faq-4" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="faq-4">Is it possible to upload files from Google Drive?<span class="accordion-indicator"></span></a></h3>
          </div>
          <div class="collapse" id="faq-4" data-parent="#faq">
            <div class="card-body font-size-sm">
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center py-5">
       
      </div>
    </div>
  </div>
</section>

@endsection