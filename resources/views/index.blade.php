<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Alfalah Web</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        {{-- Import Library External: TailwindCSS & AlpineJS --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        {{-- Import CSS Internal  --}}
        @stack('styles')
        
    </head>
   <body>
   
   </body>
</html>
