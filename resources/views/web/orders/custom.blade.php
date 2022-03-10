@if (isset($paginator) && $paginator->lastPage() > 1)
    <nav aria-label="Page navigation example" class="styled-pagination text-center">
        <ul class="pagination justify-content-center clearfix">

        <?php
        $interval = isset($interval) ? abs(intval($interval)) : 3;
        $from = $paginator->currentPage() - $interval;
        if ($from < 1) {
            $from = 1;
        }

        $to = $paginator->currentPage() + $interval;
        if ($to > $paginator->lastPage()) {
            $to = $paginator->lastPage();
        }
        ?>

        <!-- first/previous -->
            @if($paginator->currentPage() > 1)
                <li class="prev">
                    <a href="{{ $paginator->url(1) }}" class="page-link" tabindex="-1" aria-label="First">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <li class="prev">
                    <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" class="page-link" tabindex="-1"
                       aria-label="Previous">
                        <span aria-hidden="true" class="fa fa-angle-left"></span>
                    </a>
                </li>
            @endif

        <!-- links -->
            @for($i = $from; $i <= $to; $i++)
                <?php
                $isCurrentPage = $paginator->currentPage() == $i;
                ?>
                <li class="{{ $isCurrentPage ? 'active' : '' }} page-item">
                    <a href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}" class="page-link">
                        {{ $i }}
                    </a>
                </li>
            @endfor

        <!-- next/last -->
            @if($paginator->currentPage() < $paginator->lastPage())
                <li class="next">
                    <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" class="page-link" tabindex="-1"
                       aria-label="Next">
                        <span aria-hidden="true" class="fa fa-angle-right"></span>
                    </a>
                </li>

                <li class="next">
                    <a href="{{ $paginator->url($paginator->lastpage()) }}" class="page-link" tabindex="-1"
                       aria-label="Last">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @endif

        </ul>
    </nav>
@endif
