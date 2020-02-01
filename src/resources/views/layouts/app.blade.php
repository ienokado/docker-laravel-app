<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('common.head')
<body>
    <div id="app">
        {{-- @include('common.header') --}}

        <main role="main" class="inner cover">
            @yield('content')
        </main>

        <!-- @include('common.footer') -->
    </div>

    <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
</body>
</html>
