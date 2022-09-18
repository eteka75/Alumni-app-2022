
@if ($paginator->hasPages())
<nav aria-label="Photos Search Navigation">
    <ul class="pagination pagination-sm justify-content-end mb-0">
   
    @if ($paginator->onFirstPage())
        <li class="page-item disabled"><span>← Précédent</span></li>
    @else
        <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">← Précédent</a></li>
    @endif


  
    @foreach ($elements as $element)
       
        @if (is_string($element))
            <li class="page-item disabled"><span class="">{{ $element }}</span></li>
        @endif


       
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active page-item my-actives"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach


    
    @if ($paginator->hasMorePages())
        <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Suivant →</a></li>
    @else
        <li class="page-item disabled"><span>Suivant →</span></li>
    @endif
</ul>
</nav>
@endif 