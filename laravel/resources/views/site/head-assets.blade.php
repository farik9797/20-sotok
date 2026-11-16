{{-- То, что тема выводит через wp_head(): robots, стили темы, иконка сайта --}}
<meta name='robots' content='max-image-preview:large' />

<link rel='stylesheet' id='s20-main-css' href='{{ s20_a() }}css/main.css?ver={{ \App\Support\Site::version() }}' media='all' />
<link rel='stylesheet' id='s20-tailwind-css' href='{{ s20_a() }}css/tailwind.css?ver={{ \App\Support\Site::version() }}' media='all' />
@php($icon = asset('uploads/'.s20_opt('site_icon', \App\Support\Site::OPTIONS['site_icon'][1])))
<link rel="icon" href="{{ $icon }}" sizes="32x32" />
<link rel="icon" href="{{ $icon }}" sizes="192x192" />
<link rel="apple-touch-icon" href="{{ $icon }}" />
<meta name="msapplication-TileImage" content="{{ $icon }}" />
