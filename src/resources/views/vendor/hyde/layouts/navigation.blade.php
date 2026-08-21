@php($currentRouteKey = Hyde::currentRouteKey())
@php($navItems = [
    ['key' => 'index', 'label' => 'Home', 'url' => Hyde::url()],
    ['key' => 'about', 'label' => 'About', 'url' => Hyde::url('about')],
    ['key' => 'blog', 'label' => 'Blog', 'url' => Hyde::url('blog')],
    ['key' => 'contact', 'label' => 'Contact', 'url' => Hyde::url('contact')],
])

<nav aria-label="Main navigation" class="mzp-c-navigation mzp-is-sticky site-nav">
    <div class="mzp-c-navigation-l-content">
        <div class="mzp-c-navigation-container">
            <div class="mzp-c-navigation-logo site-nav__brand">
                <a href="{{ Hyde::url() }}" aria-label="{{ config('hyde.name', 'ferox') }} home">
                    {{ config('hyde.name', 'ferox') }}
                </a>
            </div>

            <button
                type="button"
                class="mzp-c-navigation-menu-button has-label"
                data-site-menu-toggle
                aria-controls="site-navigation-links"
                aria-expanded="false"
            >
                Menu
            </button>

            <div class="mzp-c-navigation-items" id="site-navigation-links" data-site-menu>
                <div class="site-nav__menu">
                    @foreach ($navItems as $item)
                        <a
                            href="{{ $item['url'] }}"
                            @class(['site-nav__link', 'is-active' => $currentRouteKey === $item['key']])
                        >
                            {{ $item['label'] }}
                        </a>
                    @endforeach

                    <a href="{{ Hyde::url('feed.xml') }}" class="site-nav__link site-nav__link--subtle">RSS</a>
                </div>
            </div>
        </div>
    </div>
</nav>
