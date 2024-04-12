@if ($paginator->hasPages())
    <ul class="rbt-pagination">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-link" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <i class="feather-chevron-left"></i>
            </li>
        @else
            <li>
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')">
                    <i class="feather-chevron-left"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                    <i class="feather-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="page-link" aria-disabled="true" aria-label="@lang('pagination.next')">
                <i class="feather-chevron-right"></i>
            </li>
        @endif
    </ul>
@endif
