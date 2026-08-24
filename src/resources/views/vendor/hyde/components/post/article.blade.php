@php($pageLanguage = \App\Support\PageLanguage::code($page))
<article
    id="{{ $page->identifier }}"
    class="site-post"
    itemscope
    itemtype="https://schema.org/BlogPosting"
    aria-label="{{ \App\Support\PageLanguage::text($page, 'article') }}"
>
    <meta itemprop="identifier" content="{{ $page->identifier }}">
    @if($page->getCanonicalUrl() !== null)
        <meta itemprop="url" content="{{ $page->getCanonicalUrl() }}">
    @endif

    <header class="site-post__header" aria-label="{{ \App\Support\PageLanguage::text($page, 'post_header') }}" role="doc-pageheader">
        @isset($page->category)
            <p class="site-post__kicker">{{ $page->category }}</p>
        @endisset

        <h1 itemprop="headline" class="mzp-u-title-xl">{{ $page->title }}</h1>

        @if($page->data('description'))
            <p class="mzp-u-body-lg site-post__description">{{ $page->data('description') }}</p>
        @endif

        <div class="site-post__meta" aria-label="{{ \App\Support\PageLanguage::text($page, 'about_post') }}" role="doc-introduction">
            <span class="site-language-badge" lang="{{ $pageLanguage }}">{{ \App\Support\PageLanguage::badge($page) }}</span>
            @includeWhen(isset($page->date), 'hyde::components.post.date')
            @includeWhen(isset($page->author), 'hyde::components.post.author')
            @includeWhen(isset($page->category), 'hyde::components.post.category')
        </div>
    </header>

    <div class="site-prose" aria-label="{{ \App\Support\PageLanguage::text($page, 'article_body') }}" itemprop="articleBody">
        {{ $content }}
    </div>
</article>
