@php($title = 'Blog')
@extends('hyde::layouts.app')

@section('content')
    <main id="content" class="site-page">
        <section class="site-page-section" aria-labelledby="blog-title">
            <div class="mzp-l-content">
                <header class="site-featured__header">
                    <div>
                        <p class="site-kicker">Archive</p>
                        <h1 id="blog-title" class="mzp-u-title-xl site-section-title">Blog</h1>
                    </div>
                    <p class="site-intro">
                        Essays and build logs from Fernando “ferox” dos Santos. Expect PHP, Drupal, Laravel, automation, and open web topics.
                    </p>
                </header>

                @include('hyde::components.blog-post-feed')
            </div>
        </section>
    </main>
@endsection
