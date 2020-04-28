<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('common.head')
<body class="body-bg-custom-pink">
    {{-- @include('common.header') --}}

    <div class="wrapper">

      @yield('content')

      @include('common.footer')

    </div>
    @yield('javascript')
</body>
</html>
