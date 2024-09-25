<!-- Pagination Component -->
<nav>
    <ul class="pagination justify-content-center">
        {{-- Link para página anterior --}}
        @if ($items->onFirstPage())
            <li class="page-item disabled"><span class="page-link">‹</span></li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $route }}?page={{ $items->currentPage() - 1 }}">‹</a>
            </li>
        @endif

        {{-- Links de páginas --}}
        @for ($i = 1; $i <= $items->lastPage(); $i++)
            @if ($i == $items->currentPage())
                <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $route }}?page={{ $i }}">{{ $i }}</a></li>
            @endif
        @endfor

        {{-- Link para próxima página --}}
        @if ($items->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $route }}?page={{ $items->currentPage() + 1 }}">›</a>
            </li>
        @else
            <li class="page-item disabled"><span class="page-link">›</span></li>
        @endif
    </ul>
</nav>