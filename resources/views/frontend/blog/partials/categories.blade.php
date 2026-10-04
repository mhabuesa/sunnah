<aside class="mb-7">
    <div class="border-bottom border-color-1 mb-5">
        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Categories</h3>
    </div>
    <div class="list-group">
        @foreach ($categories as $category)
            <a href="{{ route('blog.category', $category->slug) }}"
                class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-0"><i
                    class="mr-2 fas fa-angle-right"></i> {{ $category->name }}</a>
        @endforeach
    </div>
</aside>
