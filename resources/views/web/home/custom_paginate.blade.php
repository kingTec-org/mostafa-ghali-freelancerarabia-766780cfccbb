@if ($paginator->hasPages())
    <nav aria-label="Page navigation example" class="pt-4">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link page-link-nav" href="#" aria-label="Previous">
                        <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link page-link-nav" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="disabled page-item"><a class="page-link page-link-nav" href="#">{{ $element }}</a></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active my-active">
                                <a class="page-link page-link-nav" href="#">{{ $page }} <span
                                        class="sr-only">(current)</span></a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link page-link-nav" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link page-link-nav" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        <span ><i class="fas fa-fw fa-chevron-right"></i></span>

                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link page-link-nav" aria-label="Next">
                        <span ><i class="fas fa-fw fa-chevron-right"></i></span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
