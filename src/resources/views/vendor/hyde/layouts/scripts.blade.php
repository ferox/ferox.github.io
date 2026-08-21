<script>
    document.documentElement.classList.add('js');

    document.addEventListener('DOMContentLoaded', () => {
        const root = document.documentElement;
        const toggle = document.querySelector('[data-site-menu-toggle]');
        const menu = document.querySelector('[data-site-menu]');

        if (typeof window.__syncSiteThemeButtons === 'function') {
            window.__syncSiteThemeButtons(root.dataset.theme || 'auto');
        }

        if (toggle && menu) {
            toggle.addEventListener('click', () => {
                const isOpen = menu.classList.toggle('mzp-is-open');
                toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                toggle.classList.toggle('mzp-is-active', isOpen);
            });
        }
    });
</script>

@stack('scripts')

{!! config('hyde.scripts') !!}
{!! Includes::html('scripts') !!}
