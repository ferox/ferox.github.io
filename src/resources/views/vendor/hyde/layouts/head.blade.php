<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $page->title() }}</title>

@if (Asset::exists('favicon.ico'))
    <link rel="shortcut icon" href="{{ Asset::get('media/favicon.ico') }}" type="image/x-icon">
@endif

@include('hyde::layouts.meta')
@include('hyde::layouts.styles')

@stack('head')

{!! config('hyde.head') !!}
{!! Includes::html('head') !!}
