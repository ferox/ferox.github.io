@if(Vite::running())
    {{ Vite::assets(['resources/assets/app.js']) }}
@elseif(Asset::exists('app.js'))
    <script type="module" defer src="{{ Asset::get('app.js') }}"></script>
@endif

@stack('scripts')

{!! config('hyde.scripts') !!}
{!! Includes::html('scripts') !!}
