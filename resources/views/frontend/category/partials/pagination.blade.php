@if ($products->hasPages())
    <ul class="pagination justify-content-center">

        {{-- Previous --}}
        <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $products->previousPageUrl() }}">
                <i class="ri-arrow-left-s-line"></i>
            </a>
        </li>

        {{-- Pages --}}
        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
            <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $url }}">
                    {{ $page }}
                </a>
            </li>
        @endforeach

        {{-- Next --}}
        <li class="page-item {{ !$products->hasMorePages() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $products->nextPageUrl() }}">
                <i class="ri-arrow-right-s-line"></i>
            </a>
        </li>

    </ul>
@endif
