<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="font-[Roboto]">
    <Section class="flex min-h-screen bg-gray-100">

        @include('backend.system.layout.partial.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            @include('backend.system.layout.partial.nav')
            @yield('content')
        </div>
    </Section>

    @yield('script')
</body>

</html>
