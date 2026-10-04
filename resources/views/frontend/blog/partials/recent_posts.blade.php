<aside class="mb-7">
    <div class="border-bottom border-color-1 mb-5">
        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Recent Posts</h3>
    </div>
    @forelse ($latestBlogs as $latestBlog)
        <article class="mb-4">
            <div class="media">
                <div class="width-75 height-75 mr-3">
                    <img class="img-fluid object-fit-cover" src="{{ asset($latestBlog->image) }}" alt="Image Description">
                </div>
                <div class="media-body">
                    <h4 class="font-size-14 mb-1"><a href="{{ route('blog.detail', $latestBlog->slug) }}"
                            class="text-gray-39">{{ $latestBlog->title }}</a></h4>
                    <span class="text-gray-5">{{ $latestBlog->created_at->format('F j, Y') }}</span>
                </div>
            </div>
        </article>
    @empty
        <div class="text-center py-4">
            <p class="text-gray-5 mb-0">
                No recent posts available.
            </p>
        </div>
    @endforelse

</aside>
