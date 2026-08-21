@extends('hyde::layouts.app')

@section('content')
    @php($featuredPosts = \App\Support\BlogPosts::listed()->take(3))

    <main id="content" class="site-home">
        <header class="site-hero" aria-labelledby="home-hero-title">
            <div class="mzp-l-content">
                <div class="site-hero__layout">
                    <div>
                        <p class="site-hero__eyebrow">Personal site and journal</p>
                        <h1 id="home-hero-title" class="site-hero__title">Fernando builds FLOSS with FLOSS.</h1>
                        <p class="mzp-u-body-lg site-hero__lede">
                            Full Stack developer working across PHP, Laravel, Drupal, automation, and scripting.
                            This site is where I publish blog posts about code, open source, and the practical side of shipping useful things.
                        </p>
                        <div class="site-actions">
                            <a href="{{ Hyde::url('about') }}" class="site-button--secondary">About me</a>
                            <a href="{{ Hyde::url('blog') }}" class="site-button">Read the blog</a>
                            <a href="{{ Hyde::url('feed.xml') }}" class="site-button--secondary">Subscribe via RSS</a>
                        </div>
                    </div>

                    <aside class="site-hero__panel" aria-label="Site summary">
                        <dl>
                            <dt>Name</dt>
                            <dd>Fernando Santos</dd>
                        </dl>
                        <dl>
                            <dt>a.k.a</dt>
                            <dd>ferox</dd>
                        </dl>
                        <dl>
                            <dt>Primary stack</dt>
                            <dd>$php = ["Laravel", "Drupal",];</dd>
                        </dl>
                        <dl>
                            <dt>Focus</dt>
                            <dd>web development and scripts</dd>
                        </dl>
                    </aside>
                </div>
            </div>
        </header>

        <section class="site-home-section" aria-labelledby="home-overview-title">
            <div class="mzp-l-content">
                <header class="site-featured__header">
                    <div>
                        <p class="site-kicker">What lives here</p>
                        <h2 id="home-overview-title" class="mzp-u-title-lg site-section-title">A developer site, not a brochure</h2>
                    </div>
                    <p class="site-intro">
                        The homepage stays personal, the blog stays technical, and the whole thing stays portable:
                        plain files, static output, and no unnecessary publishing friction.
                    </p>
                </header>

                <div class="site-grid">
                    <article class="site-card">
                        <p class="site-card__label">Development</p>
                        <h3 class="mzp-u-title-sm site-card__title">Laravel and Drupal</h3>
                        <p class="site-card__copy">
                            Most of my day-to-day work lives in the PHP ecosystem, with Laravel and Drupal as recurring tools rather than abstract buzzwords.
                        </p>
                    </article>
                    <article class="site-card">
                        <p class="site-card__label">Automation</p>
                        <h3 class="mzp-u-title-sm site-card__title">Scripts that remove friction</h3>
                        <p class="site-card__copy">
                            Automation Ops and script writing are part of how I work: reduce repetition, make systems clearer, and keep delivery practical.
                        </p>
                    </article>
                    <article class="site-card">
                        <p class="site-card__label">Open Source</p>
                        <h3 class="mzp-u-title-sm site-card__title">FLOSS all the way down</h3>
                        <p class="site-card__copy">
                            I care about Free/Libre Open Source Software, open standards, and publishing on infrastructure I can inspect and control.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="site-home-section" aria-labelledby="home-values-title">
            <div class="mzp-l-content">
                <header class="site-featured__header">
                    <div>
                        <p class="site-kicker">How I work</p>
                        <h2 id="home-values-title" class="mzp-u-title-lg site-section-title">Technical practice with community behind it</h2>
                    </div>
                </header>

                <div class="site-grid">
                    <article class="site-card">
                        <p class="site-card__label">Community</p>
                        <h3 class="mzp-u-title-sm site-card__title">Fedora Ambassador and Drupal Brazil Community Leader</h3>
                        <p class="site-card__copy">
                            Community work matters to me. Open source is not only a stack choice, it is also a cultural choice about how people build together.
                        </p>
                    </article>
                    <article class="site-card">
                        <p class="site-card__label">Elsewhere</p>
                        <h3 class="mzp-u-title-sm site-card__title">Follow the work</h3>
                        <p class="site-card__copy">
                            You can find me on GitHub, LinkedIn, Mastodon, and Pinkary when the conversation moves beyond the blog archive.
                        </p>
                    </article>
                    <article class="site-card">
                        <p class="site-card__label">Style</p>
                        <h3 class="mzp-u-title-sm site-card__title">Readable, fast, and inspectable</h3>
                        <p class="site-card__copy">
                            That is the bar for the code I like to ship and for the websites I like to maintain over time.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="site-home-section site-featured" aria-labelledby="home-posts-title">
            <div class="mzp-l-content">
                <header class="site-featured__header">
                    <div>
                        <p class="site-kicker">Recent posts</p>
                        <h2 id="home-posts-title" class="mzp-u-title-lg site-section-title">Start with the latest posts</h2>
                    </div>
                    <a href="{{ Hyde::url('blog') }}" class="site-inline-link">Browse all posts</a>
                </header>

                @include('hyde::components.blog-post-feed', ['posts' => $featuredPosts])
            </div>
        </section>

        <section class="site-home-section site-home-section--closing" aria-labelledby="home-direction-title">
            <div class="mzp-l-content">
                <div class="site-callout">
                    <p class="site-kicker">Current direction</p>
                    <h2 id="home-direction-title" class="mzp-u-title-lg">Building a personal site that reflects how I actually work.</h2>
                    <p class="mzp-u-body-lg">
                        HydePHP gives me Markdown where writing matters, Blade where structure matters, and static output where long-term maintenance matters.
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection
