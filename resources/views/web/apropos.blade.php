@extends('layouts.web')

@section('title', isset($data,$data['title'])?$data['title']:'A propos')

@section('sidebar')

    <section class="breadcrumb-section py-5">
        <div class="container">
            <h2 class="h2">{{ isset($data,$data['title'])?$data['title']:'A propos' }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Index')}}">Accueil</a></li>
                <li class="breadcrumb-item">{{ isset($data,$data['title'])?$data['title']:'A propos' }}</li>
            </ol>
        </div><!-- /.container -->
    </section> 
    
@endsection

@section('content')


@endsection