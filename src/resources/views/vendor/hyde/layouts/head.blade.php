<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="color-scheme" content="light dark">
<title>{{ $page->identifier === 'index' ? config('hyde.name', 'ferox') . ' - Homepage' : $page->title() }}</title>

<script>
    (() => {
        const storageKey = 'ferox-site-theme';
        const root = document.documentElement;
        const darkModeMedia = typeof window.matchMedia === 'function'
            ? window.matchMedia('(prefers-color-scheme: dark)')
            : null;
        const isValidTheme = (value) => ['auto', 'light', 'dark'].includes(value);
        const resolveTheme = (theme) => theme === 'auto'
            ? (darkModeMedia?.matches ? 'dark' : 'light')
            : theme;

        window.__setSiteTheme = (theme) => {
            const nextTheme = isValidTheme(theme) ? theme : 'auto';
            const resolvedTheme = resolveTheme(nextTheme);

            root.dataset.theme = nextTheme;
            root.dataset.themeResolved = resolvedTheme;
            root.style.colorScheme = resolvedTheme;

            try {
                window.localStorage.setItem(storageKey, nextTheme);
            } catch (error) {
                // Ignore storage failures and keep the in-memory state.
            }

            if (typeof window.__syncSiteThemeButtons === 'function') {
                window.__syncSiteThemeButtons(nextTheme);
            }
        };

        window.__syncSiteThemeButtons = (theme = root.dataset.theme || 'auto') => {
            document.querySelectorAll('[data-theme-option]').forEach((option) => {
                const isActive = option.dataset.themeOption === theme;

                option.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                option.dataset.active = isActive ? 'true' : 'false';
            });
        };

        if (darkModeMedia) {
            const handleSystemThemeChange = () => {
                if ((root.dataset.theme || 'auto') === 'auto') {
                    window.__setSiteTheme('auto');
                }
            };

            if (typeof darkModeMedia.addEventListener === 'function') {
                darkModeMedia.addEventListener('change', handleSystemThemeChange);
            } else if (typeof darkModeMedia.addListener === 'function') {
                darkModeMedia.addListener(handleSystemThemeChange);
            }
        }

        let initialTheme = 'auto';

        try {
            const storedTheme = window.localStorage.getItem(storageKey);

            if (isValidTheme(storedTheme)) {
                initialTheme = storedTheme;
            }
        } catch (error) {
            initialTheme = 'auto';
        }

        window.__setSiteTheme(initialTheme);
    })();
</script>

@if (Asset::exists('favicon.ico'))
    <link rel="shortcut icon" href="{{ Asset::get('media/favicon.ico') }}" type="image/x-icon">
@endif

@include('hyde::layouts.meta')
@include('hyde::layouts.styles')

@stack('head')

{!! config('hyde.head') !!}
{!! Includes::html('head') !!}
