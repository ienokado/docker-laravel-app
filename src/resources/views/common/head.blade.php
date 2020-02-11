<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- ファビコン -->
    <link rel="icon" href="{{ asset('/favicon.ico') }}">

    <!-- スマホ用アイコン -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    <!-- OGP画像 -->
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:image" content="{{ asset('ogp.png') }}" />
    <meta property="og:description" content="{{ config('app.description', 'Laravel') }}" />

    <!-- Windows用アイコン -->
    <meta name="application-name" content="{{ config('app.name', 'Laravel') }}"/>
    <meta name="msapplication-square70x70logo" content="{{ asset('small.png') }}"/>
    <meta name="msapplication-square150x150logo" content="{{ asset('medium.png') }}"/>
    <meta name="msapplication-wide310x150logo" content="{{ asset('wide.png') }}"/>
    <meta name="msapplication-square310x310logo" content="{{ asset('large.png') }}"/>
    <meta name="msapplication-TileColor" content="#FAA500"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
