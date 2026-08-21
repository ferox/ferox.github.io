@extends('hyde::layouts.app')
@section('content')

    <main id="content" class="site-page">
        <section class="site-page-section site-page-section--article">
            <div class="mzp-l-content mzp-t-content-md site-article-shell">
                <article class="site-prose">
                    {{ $content }}
                </article>
            </div>
        </section>
    </main>

@endsection
