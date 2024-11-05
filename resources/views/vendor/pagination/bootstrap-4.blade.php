@if ($paginator->hasPages())
    <nav class="m-5">
        <ul class="pagination justify-content-center pagination-lg">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true" style="text-align:center;border-top-left-radius: 2rem;border-bottom-left-radius: 2rem;"  >&lsaquo; Anterior</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"  style="text-align:center;border-top-left-radius: 2rem;border-bottom-left-radius: 2rem;"  aria-label="@lang('pagination.previous')">&lsaquo; Anterior</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" style="text-align:center;border-top-right-radius: 2rem;border-bottom-right-radius: 2rem;"  rel="next" aria-label="@lang('pagination.next')">Siguiente &rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true" style="text-align:center;border-top-right-radius: 2rem;border-bottom-right-radius: 2rem;"  >Siguiente &rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
