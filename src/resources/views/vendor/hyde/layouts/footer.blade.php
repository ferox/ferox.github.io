<footer class="site-footer" aria-label="Page footer">
    <div class="mzp-l-content site-footer__inner">
        <div class="site-footer__grid">
            <div>
                <p class="site-footer__label">ferox.eti.br</p>
                <p class="site-footer__copy">
                    Fernando Santos. Full Stack development and life on the open web.
                </p>
            </div>
            <div class="site-footer__links">
                <a href="{{ Hyde::url('about') }}">About</a>
                <a href="{{ Hyde::url('blog') }}">Blog</a>
                <a href="{{ Hyde::url('contact') }}">Contact</a>
                <a href="{{ Hyde::url('feed.xml') }}">RSS</a>
                <a href="https://github.com/ferox">GitHub</a>
                <a href="https://www.linkedin.com/in/ferox">LinkedIn</a>
                <a href="https://mastodon.pirateparty.be/@ferox">Mastodon</a>
            </div>
        </div>
        <p class="site-footer__legal">
            &copy; {{ date('Y') }} Ferox. Built with <a href="https://github.com/hydephp/hyde">HydePHP</a>.
        </p>
    </div>
</footer>
