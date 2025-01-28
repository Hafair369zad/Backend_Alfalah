<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alfalah Web</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('style')

       
    </head>

    <body id="app"> 

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4 max-w-5xl">
                {{ session('success') }}
            </div>
        @endif

        <header>
            <navbar-user></navbar-user>
        </header>
        <main class="bg-gradient-to-br from-blue-50 via-green-50 to-blue-50 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-50">
            @yield('content')
        </main>
        <footer class="bg-gray-900">
            <footer-user></footer-user>
        </footer>
    
    </body>
</html>