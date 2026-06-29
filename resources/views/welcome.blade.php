<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>TuActivo - Gestion de Activos</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts / Tailwind CSS Integration -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-900 font-sans">

    <!-- Top Navigation & Authentication Bar -->
    <nav class="absolute w-full z-20 top-0 py-5 px-6 lg:px-12 flex justify-between items-center border-b border-white/10 bg-black/30 backdrop-blur-md">
        <div class="text-2xl font-extrabold text-indigo-400 tracking-tight flex items-center gap-2 drop-shadow-md">
            <svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            TuActivo
        </div>
        
        <!-- Standard Laravel Breeze Auth Logic -->
        @if (Route::has('login'))
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-indigo-400 transition duration-300">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-white hover:text-indigo-400 transition duration-300">
                        Iniciar Sesion
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-semibold text-white bg-indigo-600 hover:bg-indigo-500 px-5 py-2.5 rounded-md shadow-lg transition duration-300">
                            Registrarse
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </nav>

    <!-- Hero Section -->
    <main class="relative h-screen flex items-center justify-center bg-cover bg-center" 
          style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop');">
        
        <!-- Dark Overlay for Text Readability -->
        <div class="absolute inset-0 bg-gray-900/75 z-0"></div>

        <!-- Main Content -->
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-16">
            <span class="text-indigo-400 font-bold tracking-wider uppercase text-sm mb-4 block">
                Seguimiento y Gestión de Activos
            </span>
            
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 drop-shadow-lg leading-tight">
                Ten Control Completo sobre <br/> Tus Activos
            </h1>
            
            <p class="text-lg md:text-xl text-gray-300 mb-10 drop-shadow max-w-2xl mx-auto leading-relaxed">
                Desde hardware de TI y bienes de oficina hasta vehículos. Sigue los ciclos de vida,y las asignaciones de tus activos de forma sencilla en una plataforma unificada.
            </p>

            <!-- Call to Action Buttons -->
            @if (Route::has('login'))
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 px-8 rounded-lg shadow-xl text-lg transition transform hover:-translate-y-1">
                            Access Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3.5 px-8 rounded-lg shadow-xl text-lg transition transform hover:-translate-y-1">
                            Inicia sesion en tu cuenta
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block bg-white hover:bg-gray-100 text-gray-900 font-bold py-3.5 px-8 rounded-lg shadow-xl text-lg transition transform hover:-translate-y-1">
                                Solicitar Acceso
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </main>

</body>
</html>