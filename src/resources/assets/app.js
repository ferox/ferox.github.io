document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', () => {
    const root = document.documentElement;
    const themeOptions = Array.from(document.querySelectorAll('[data-theme-option]'));
    const darkModeMedia = window.matchMedia('(prefers-color-scheme: dark)');
    const toggle = document.querySelector('[data-site-menu-toggle]');
    const menu = document.querySelector('[data-site-menu]');

    const isValidTheme = (value) => ['auto', 'light', 'dark'].includes(value);
    const resolveTheme = (theme) => theme === 'auto' ? (darkModeMedia.matches ? 'dark' : 'light') : theme;

    const syncThemeControls = (theme) => {
        themeOptions.forEach((option) => {
            const isActive = option.dataset.themeOption === theme;

            option.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            option.dataset.active = isActive ? 'true' : 'false';
        });
    };

    const applyTheme = (theme, persist = true) => {
        const nextTheme = isValidTheme(theme) ? theme : 'auto';
        const resolvedTheme = resolveTheme(nextTheme);

        root.dataset.theme = nextTheme;
        root.dataset.themeResolved = resolvedTheme;
        root.style.colorScheme = resolvedTheme;

        syncThemeControls(nextTheme);
    };

    applyTheme(isValidTheme(root.dataset.theme) ? root.dataset.theme : 'auto', false);

    themeOptions.forEach((option) => {
        option.addEventListener('click', () => {
            applyTheme(option.dataset.themeOption, false);
        });
    });

    const handleSystemThemeChange = () => {
        if ((root.dataset.theme || 'auto') === 'auto') {
            applyTheme('auto', false);
        }
    };

    if (typeof darkModeMedia.addEventListener === 'function') {
        darkModeMedia.addEventListener('change', handleSystemThemeChange);
    } else if (typeof darkModeMedia.addListener === 'function') {
        darkModeMedia.addListener(handleSystemThemeChange);
    }

    if (toggle && menu) {
        toggle.addEventListener('click', () => {
            const isOpen = menu.classList.toggle('mzp-is-open');
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            toggle.classList.toggle('mzp-is-active', isOpen);
        });
    }
});
