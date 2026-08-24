<span itemprop="author" itemscope itemtype="https://schema.org/Person">
    <span>{{ \App\Support\PageLanguage::text($page, 'by') }} </span>
    @if($page->author->website)
        <a href="{{ $page->author->website }}" rel="author" itemprop="url">
            <span itemprop="name">{{ $page->author->name ?? $page->author->username }}</span>
        </a>
    @else
        <span itemprop="name">{{ $page->author->name ?? $page->author->username }}</span>
    @endif
</span>
