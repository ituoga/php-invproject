@if ($paginator->hasPages())

    <?php
    $current = $paginator->currentPage(); // Current page number
    $before = 5; // Number of pages before the current page
    $after = 5; // Number of pages after the current page

    $totalPages = $paginator->lastPage(); // Total number of pages in the pagination

    $startPage = max(1, $current - $before); // Starting page number
    $endPage = min($startPage + $before + $after, $totalPages); // Ending page number
    $pages = range($startPage, $endPage); // Array of page numbers

    // always show last one
    if (!in_array($paginator->lastPage(), $pages)) {
        $pages[] = $paginator->lastPage();
    }
    // Always show first one
    if (!in_array(1, $pages)) {
        $pages[] = 1;
    }
    sort($pages);
    ?>

    <ul class="site-pages m-b-20">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="site-pages__items">
                <span class="site-pages__links" aria-label="ankstesnis">
                    <i class="icon-arrow-left" aria-hidden="true"></i>
                </span>
            </li>
        @else
            <li class="site-pages__items">
                <a href="{{ $paginator->previousPageUrl() }}" class="site-pages__links" aria-label="ankstesnis">
                    <i class="icon-arrow-left" aria-hidden="true"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($pages as $page)
            <?php
            $queryParams = array_merge(request()->query(), [$paginator->getPageName() => $page]);
            $url = url()->current() . '?' . http_build_query($queryParams);
            ?>
            <li class="site-pages__items">
                <a href="{{ $url }}" class="site-pages__links{{ $page == $paginator->currentPage() ? ' active' : '' }}">
                    {{ $page }}
                </a>
            </li>
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="site-pages__items">
                <a href="{{ $paginator->nextPageUrl() }}" class="site-pages__links" aria-label="sekantis">
                    <i class="icon-arrow-right" aria-hidden="true"></i>
                </a>
            </li>
        @else
            <li class="site-pages__items">
                <span class="site-pages__links" aria-label="sekantis">
                    <i class="icon-arrow-right" aria-hidden="true"></i>
                </span>
            </li>
        @endif
    </ul>

@endif
