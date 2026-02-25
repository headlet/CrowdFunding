<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="font-[Roboto] bg-gray-100">

    @include('message')

    <section class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="flex flex-col justify-between w-64 transition-all duration-300 sidebars">
            @include('backend.system.layout.partial.sidebar')
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 min-w-0 contentss">
            @include('backend.system.layout.partial.nav')

            <main class="flex-1 p-4 md:p-6 overflow-y-auto">
                @yield('content')
            </main>
        </div>

    </section>

    @yield('script')

</body>

</html>