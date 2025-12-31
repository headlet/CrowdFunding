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
    @include('message')
    <section class="flex min-h-screenbg-gray-100">
        <aside class="w-64 transition-all duration-300 flex flex-col justify-between sidebars">
            @include('backend.system.layout.partial.sidebar')
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col contentss">
            @include('backend.system.layout.partial.nav')
            <main class="p-6 flex-1 overflow-y-auto ">
                @yield('content')
            </main>
        </div>
    </section>

    @yield('script')


</body>

</html>
