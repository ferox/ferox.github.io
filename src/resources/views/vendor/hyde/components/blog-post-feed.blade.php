<div class="site-feed">
    @forelse($posts ?? \App\Support\BlogPosts::listed() as $post)
        @include('hyde::components.article-excerpt')
    @empty
        <p class="site-empty">No posts published yet.</p>
    @endforelse
</div>
