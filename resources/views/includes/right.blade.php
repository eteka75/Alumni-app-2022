<div class="b-shadow sidebar course-sidebar">
    <div class="widget-area">
        @if($video)
        <div class="widget mb-3 video-widget">
            <div class="course-video">
                {!! isset($video)?$video:'-' !!}
            </div>
                                                     
        </div><!-- /.widget -->
        @endif
      
@if(isset($categories) && $categories->count())
        <div class="widget widget_categories">
            <h3 class="widget_title">Catégories</h3>
            <ul>
                @foreach($categories as $cat)
                <li><a href="{{ route('categorie',$cat->slug!=""?$cat->slug:$cat->id)}}">{{ $cat->nom }}</a>({{ $cat->activites->count() }})</li>
                @endforeach
            </ul>
        </div><!-- /.widget -->    
@endif
        <div class="widget widget_recent_entries">
            <h3 class="widget_title">Actualités</h3>
            <ul>
                @foreach($actus as $act)                    
                <li class="media">
                    <div class="entry-thumbnail">
                        <a href="{{ route('activite',$act->slug) }}">
                        @if($act->image && $act->image!="")
                        <img src="{{ asset($act->image) }}" alt="{{ $act->titre }}" class="img-fluid">
                        @else
                        <img src="{{ asset('assets/images/cpet/actualite-default.jpg') }}" alt="{{ $act->titre }}" class="img-fluid">
                        @endif
                        </a>
                    </div>
                    <div class="media-body">
                        <small class="post-date fs-xs">{{ $act->created_at->diffForHumans() }}</small><br>
                        <a href="{{ route('activite',$act->slug) }}">{{ substr($act->titre,0,100) }}</a>
                    </div>
                </li>
                @endforeach
               
            </ul>
        </div><!-- /.widget -->                                                                    
    </div><!-- /.widget-area -->  
</div><!-- /.course-sidebar -->    