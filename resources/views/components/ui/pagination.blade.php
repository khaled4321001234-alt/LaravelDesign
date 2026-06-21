@if ($paginator->hasPages())
    <nav class="mt-12 flex items-center justify-center gap-1.5" aria-label="Pagination">
        @if ($paginator->onFirstPage())
            <span class="pagination-btn pagination-btn-disabled" aria-disabled="true">
                <x-icons.arrow-back class="size-4" />
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-btn" aria-label="{{ __('site.news.pagination_prev') }}">
                <x-icons.arrow-back class="size-4" />
            </a>
        @endif

        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page == $paginator->currentPage())
                <span class="pagination-btn pagination-btn-active" aria-current="page">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="pagination-btn">{{ $page }}</a>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-btn" aria-label="{{ __('site.news.pagination_next') }}">
                <x-icons.arrow-forward class="size-4" />
            </a>
        @else
            <span class="pagination-btn pagination-btn-disabled" aria-disabled="true">
                <x-icons.arrow-forward class="size-4" />
            </span>
        @endif
    </nav>
@endif
