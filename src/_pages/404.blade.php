@extends('hyde::layouts.app')

@section('content')
    <main id="content">
        <section class="mzp-l-content mzp-t-content-md site-not-found">
            <p class="site-kicker">404</p>
            <h1 class="mzp-u-title-xl">That page is gone or never existed.</h1>
            <p class="mzp-u-body-lg site-intro">
                Try the homepage or jump straight into the blog.
            </p>
            <div class="site-actions" style="justify-content: center;">
                <a href="{{ Hyde::url() }}" class="site-button">Go home</a>
                <a href="{{ Hyde::url('blog') }}" class="site-button--secondary">Open the blog</a>
            </div>
        </section>
    </main>
@endsection
