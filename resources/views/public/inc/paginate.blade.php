@if ($paginator->hasPages())
    <nav aria-label="bsp_Page bsp_navigation bsp_example">
        <ul class="bsp_pagination">
            @if ($paginator->onFirstPage())

                <li class="bsp_disabled bsp_page-item"><span class="bsp_page-link">&laquo;</span></li>

            @else

                <li class="bsp_page-item"><a href="{{ $paginator->previousPageUrl() }}" class="bsp_page-link" rel="prev">&laquo;</a></li>

            @endif
            @foreach ($elements as $element)
                @if (is_string($element))

                    <li class="bsp_disabled bsp_page-item"><span class="bsp_page-link">{{ $element }}</span></li>

                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())

                            <li class="bsp_page-item bsp_active"><span class="bsp_page-link">{{ $page }}</span></li> {{--Строка отвечающая за вывод текущей пагинации--}}

                        @else

                            <li class="bsp_page-item"><a href="{{ $url }}" class="bsp_page-link">{{ $page }}</a></li>

                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="bsp_page-item"><a href="{{ $paginator->nextPageUrl() }}" class="bsp_page-link" rel="next">&raquo;</a></li>
            @else
                <li class="bsp_disabled bsp_page-item"><span class="bsp_page-link">&raquo;</span></li>
            @endif
        </ul>
    </nav>

@endif
