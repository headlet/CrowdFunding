@include('frontend.partial.header')

<body>
    @include('error')
    <!-- @include('frontend.partial.loader') -->
    @include('frontend.partial.nav')

    @yield('content')

    @include('frontend.partial.footer')

    @include('frontend.partial.script')
</body>

</html>