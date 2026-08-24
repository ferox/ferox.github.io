<!DOCTYPE html>
<html lang="{{ \App\Support\PageLanguage::code($page ?? null) }}" class="mzp-has-sticky-navigation">
<head>
    @include('hyde::layouts.head')
</head>
<body id="top">
    @include('hyde::components.skip-to-content-button')

    <div class="site-shell">
        @include('hyde::layouts.navigation')

        @yield('content')

        @include('hyde::layouts.footer')
    </div>

    @include('hyde::layouts.scripts')
</body>
</html>
