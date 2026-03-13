<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Glasolsson')</title>
    @if(request()->is('/'))
        <link rel="preload" as="image" href="{{ asset('images/background.webp') }}" type="image/webp">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">

    {{-- Header --}}

    @php
        $showDesktopAside = auth()->check() && request()->is('dashboard', 'products*', 'categories*');
    @endphp

    {{-- Navbar --}}
    <header class="{{ request()->is('/') || request()->is('index') ? 'absolute bg-transparent' : 'bg-slate-800' }} flex justify-center w-full h-24 text-white py-4 z-50">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="/" class="text-4xl font-logo">Glas Olsson</a>
            <nav aria-label="Huvudnavigation">
                <ul class="flex space-x-8">

                    {{-- Admin nav menu button --}}

                    @if(auth()->check())
                        <li>
                            <button id="open-sidemenu" aria-label="Öppna meny" aria-expanded="false" aria-controls="menu" class="fixed top-4 right-4 z-50 bg-slate-800 text-white p-3 rounded hover:bg-slate-700 focus:outline-2 focus:outline-indigo-500 md:hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </li>

                        {{-- Navbar navigation links --}}

                        <aside id="menu" aria-label="Navigationsmeny" aria-hidden="true" class="fixed left-0 top-0 z-40 flex h-dvh max-h-dvh w-80 flex-col justify-between overflow-y-auto bg-slate-800 px-4 py-8 transform -translate-x-full opacity-0 transition-all duration-300 pointer-events-none overscroll-contain md:hidden">
                            @include('layouts.partials.admin-menu', ['showMobileClose' => true])
                        </aside>

                        <li class="hidden md:block"><a href="/dashboard" aria-label="Gå till dashboard" class="font-text font-light text-xl hover:underline">Dashboard</a></li>
                        <li class="hidden md:block">
                            <form method="get" action="/logout">
                                @csrf
                                <button type="submit" aria-label="Logga ut" class="flex gap-2 flex-row place-items-center
                                font-text font-light text-xl hover:underline">Logga ut<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6" fill="#FFFFFF" aria-hidden="true"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg></button>
                            </form>
                        </li>
                    @else
                        <li><a href="#" id="login-toggle" aria-label="Öppna inloggningsformulär" class="flex place-items-center gap-2 flex-row font-text font-light text-xl hover:underline">Logga in <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-6 h-6" fill="#FFFFFF" aria-hidden="true"><path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/></svg></a></li>
                    @endif

                </ul>
            </nav>
        </div>
    </header>
    

    <main aria-label="Huvudinnehåll" class="min-h-screen bg-gray-200">

        @include('layouts.partials.errors')

        @include('layouts.partials.success')
        
        @include('layouts.partials.delete-modal')

        {{-- Admin menu container --}}
        <div class="{{ $showDesktopAside ? 'flex items-stretch' : '' }}">

            {{-- Admin menu container --}}
            @if($showDesktopAside)
                <aside aria-label="Adminmeny" class="hidden md:flex md:w-50 lg:w-64 md:shrink-0 md:min-h-screen md:bg-slate-800 md:text-white md:flex-col md:justify-between md:sticky md:top-0 md:overflow-y-auto">
                    @include('layouts.partials.admin-menu', ['showMobileClose' => false])
                </aside>
            @endif

            <div class="{{ $showDesktopAside ? 'flex-1 min-w-0 w-full' : '' }}">
                @yield('content')
            </div>

        </div>
    </main>


    {{-- Footer --}}
    <footer aria-label="Sidfot" class="bg-slate-800 text-white py-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6 container mx-auto py-4 md:px-4">
        <div class="container mx-auto text-center">
            <h3 class="text-2xl font-logo md:text-3xl">Glas Olsson</h3>
            <p class="font-text text-sm mt-1 md:text-base">Din pålitliga partner för kvalitetsglas och speglar.</p>
        </div>
        <div class="container mx-auto text-center">
            <h3 class="text-lg font-logo md:text-3xl">Kontakt</h3>
            <p class="font-text text-sm mt-1 md:text-base">E-post: kontakt@glasolsson.se</p>
        </div>
        <div class="container mx-auto text-center">
            <h3 class="text-lg font-logo md:text-3xl">Följ oss</h3>
            <p class="font-text text-sm mt-1 md:text-base">Facebook | Instagram | LinkedIn</p>
        </div>
    </div>

        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Glas Olsson. All rights reserved.
        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
