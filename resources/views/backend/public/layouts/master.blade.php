
<!DOCTYPE html>
<html>
    <head>
       <title> @yield('title')</title>
       <script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
        @include('message')
        @yield('content')
    </body>
</html>