@php /** @var \Hyde\Pages\MarkdownPost $post */ @endphp
@php($postUrl = $post->getCanonicalUrl() ?? Hyde::url($post->getOutputPath()))
<article itemprop="item" itemscope itemtype="https://schema.org/BlogPosting" class="site-feed-card">
    <meta itemprop="identifier" content="{{ $post->identifier }}">
    <meta itemprop="url" content="{{ $postUrl }}">

    <p class="site-feed-card__meta">
        @isset($post->category)
            <span>{{ $post->category }}</span>
            <span class="site-dot" aria-hidden="true"></span>
        @endisset
        @isset($post->date)
            <time itemprop="dateCreated datePublished" datetime="{{ $post->date->datetime }}">{{ $post->date->short }}</time>
        @endisset
    </p>

    <h2 itemprop="headline" class="mzp-u-title-sm site-feed-card__title">
        <a href="{{ $postUrl }}">{{ $post->data('title') ?? $post->title }}</a>
    </h2>

    @if($post->data('description') !== null)
        <p itemprop="description" class="site-feed-card__description">
            {{ $post->data('description') }}
        </p>
    @endif

    <div class="site-feed-card__footer">
        @isset($post->author)
            <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                by <span itemprop="name">{{ $post->author->name ?? $post->author->username }}</span>
            </span>
        @endisset
        <a href="{{ $postUrl }}" class="site-inline-link">Read post</a>
    </div>
</article>
