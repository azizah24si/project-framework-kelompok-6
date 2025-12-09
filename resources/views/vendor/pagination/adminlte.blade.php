@if ($paginator->hasPages())
    <nav aria-label="Navigasi pagination" class="pagination-wrapper">
        <ul class="pagination pagination-sm mb-0 gap-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="Sebelumnya">
                    <span class="page-link pagination-pill">Prev</span>
                </li>
            @else
                <li class="page-item" aria-label="Sebelumnya">
                    <a class="page-link pagination-pill" href="{{ $paginator->previousPageUrl() }}" rel="prev">Prev</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link pagination-pill">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link pagination-pill">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link pagination-pill" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item" aria-label="Berikutnya">
                    <a class="page-link pagination-pill" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="Berikutnya">
                    <span class="page-link pagination-pill">Next</span>
                </li>
            @endif
        </ul>
    </nav>
@push('css')
    <style>
        .pagination-wrapper {
            display: flex;
            justify-content: flex-end;
        }

        .pagination-pill {
            border-radius: 999px !important;
            padding-inline: 14px;
            min-width: 44px;
            text-align: center;
            font-weight: 600;
        }
    </style>
@endpush
@endif


