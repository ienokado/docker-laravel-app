<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('common.head')
<body>
    {{-- @include('common.header') --}}

    <div class="wrapper">

      @yield('content')

      @include('common.footer')

    </div>
    <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
    @yield('javascript')
</body>
</html>
