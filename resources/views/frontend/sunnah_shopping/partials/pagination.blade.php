@if ($products->hasPages())
    <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
        {{-- Previous --}}
        <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link ajax-pagination-link" href="{{ $products->previousPageUrl() }}" data-page="{{ $products->currentPage() - 1 }}">
                <i class="ri-arrow-left-s-line"></i>
            </a>
        </li>

        {{-- Pages --}}
        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
            <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                <a class="page-link ajax-pagination-link" href="{{ $url }}" data-page="{{ $page }}">
                    {{ $page }}
                </a>
            </li>
        @endforeach

        {{-- Next --}}
        <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
            <a class="page-link ajax-pagination-link" href="{{ $products->nextPageUrl() }}" data-page="{{ $products->currentPage() + 1 }}">
                <i class="ri-arrow-right-s-line"></i>
            </a>
        </li>
    </ul>
@endif