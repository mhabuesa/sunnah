<aside class="mb-7">
    <form class="" action="{{ route('blog.search') }}" method="GET">
        <div class="d-flex align-items-center">
            <label class="sr-only" for="signupSrEmail">Search Electro blog</label>
            <div class="input-group">
                <input type="text" class="form-control px-4" name="query" id="signupSrEmail" placeholder="Search..."
                    aria-label="Search Electro blog" value="{{  $searchTerm ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary text-nowrap ml-3 d-none">
                <span class="fas fa-search font-size-1 mr-2"></span> Search
            </button>
        </div>
    </form>
</aside>
