@if ($paginator->hasPages())
<ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li><a href="javascript:void(0)" class="page-numbers prev"><span class="fa fa-angle-left"></span></a></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" class="page-numbers prev"><span class="fa fa-angle-left"></span></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><a href="#" class="page-numbers">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a href="#" class="page-numbers current">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="page-numbers">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" class="page-numbers next"><span class="fa fa-angle-right"></span></a></li>
            @else
                <li><a href="#" class="page-numbers next">  <span class="fa fa-angle-right"></span></a></li>
            @endif
        </ul>
@endif




