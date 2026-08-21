document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('[data-site-menu-toggle]');
    const menu = document.querySelector('[data-site-menu]');

    if (!toggle || !menu) {
        return;
    }

    toggle.addEventListener('click', () => {
        const isOpen = menu.classList.toggle('mzp-is-open');
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        toggle.classList.toggle('mzp-is-active', isOpen);
    });
});
