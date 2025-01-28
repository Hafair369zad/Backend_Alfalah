<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Alfalah Web</title>


        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('style')

       
    </head>

    <body id="app" class="antialiased text-gray-800 bg-white" >

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4 max-w-5xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex h-screen overflow-y-hidden bg-white">

          
                <!-- Sidebar Component -->
                <sidebar-admin></sidebar-admin>
       
            <!-- ================== End Sidebar ====================== -->

            

            <!-- ==================== Main Content + Sidebar ================== -->
            <div class="flex flex-col flex-1 h-full overflow-hidden">
                
                <!-- ================== Navbar ================== -->
                <header class="flex-shrink-0 border-b">
                    <navbar-admin></navbar-admin>
                </header>
                <!-- ================== End Navbar ================== -->

                <!-- ================== Main Content ================== -->
                <main
                    class="flex-1 max-h-full p-5 overflow-hidden overflow-y-auto bg-slate-50 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-50">
                    @yield('content')
                </main>
                <!-- ================== End Main Content ================== -->


                <!-- ================== Footer ================== -->
                <footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">
                    <footer-admin></footer-admin>
                </footer>
                <!-- ================== End Footer ================== -->

                

            </div>
            <!-- ==================== End Main Content + Sidebar ================== -->

        </div>
        <!-- ================== End Layout  ====================== -->
    </body>
</html>

