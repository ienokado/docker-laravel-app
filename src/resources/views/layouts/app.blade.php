<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('common.head')
<body>
    {{-- @include('common.header') --}}


    <div id="content">
        @yield('content')
    </div>

    {{-- @include('common.footer') --}}

    <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
</body>
</html>
