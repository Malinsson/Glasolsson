<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Glasolsson')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">

    <header class="{{ request()->is('/') ? 'absolute bg-transparent' : 'bg-slate-800' }} flex justify-center w-full h-24 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a href="/" class="text-4xl font-logo">Glas Olsson</a>
            <nav>
                <ul class="flex space-x-4">

                    @if(auth()->check() && $isMobile)
                        <button id="open-sidemenu" class="fixed top-4 right-4 z-50 bg-slate-800 text-white p-3 rounded hover:bg-slate-700 focus:outline-2 focus:outline-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>

                        <aside id="menu" class="absolute flex justify-between left-0 top-0 py-8 px-4 flex-col h-screen bg-slate-800 w-80 transform -translate-x-full opacity-0 transition-all duration-300 z-40 pointer-events-none md:block md:relative md:translate-x-0 md:opacity-100 md:pointer-events-auto">
                            
                            <div class="flex flex-col gap-4 mt-8 text-center text-lg">
                            <span id="close-sidemenu" tabindex="0" class="text-right px-4 focus:outline-2 focus:outline-indigo-500 rounded cursor-pointer float-right text-white text-3xl hover:text-gray-600">×</span>
                                <div class="text-white font-logo text-2xl align-middle p-4">Hej, {{ auth()->user()->name }}</div>
                                <a class="text-white font-text align-middle p-4 hover:bg-gray-950 active:bg-gray-950" href="/dashboard">Översikt</a>
                                <a class="text-white font-text align-middle p-4 hover:bg-gray-950 active:bg-gray-950" href="{{ route('products.index') }}">Produkter</a>
                                <a class="text-white font-text align-middle p-4 hover:bg-gray-950 active:bg-gray-950" href="{{ route('categories.index') }}">Kategorier</a>
                            </div>
                            <div class="flex flex-col gap-4 mt-8 text-center text-lg">
                                <form method="get" action="/logout">
                                    @csrf
                                    <button type="submit" class="w-full bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer">Logout</button>
                                </form>

                            </div>
                        </aside>
                    @else
                        <li><a href="#" id="login-toggle" class="font-text font-light text-xl hover:underline">Login</a></li>
                    @endif 

                </ul>
            </nav>
        </div>
    </header>


    <main class="min-h-screen">

        @include('errors')
        @yield('content')

    </main>


    <footer class="bg-slate-800 text-white py-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6 container mx-auto py-4 md:px-4">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-logo">Glas Olsson</h2>
            <p class="font-text text-sm mt-1">Din pålitliga partner för kvalitetsglas och speglar.</p>
        </div>
        <div class="container mx-auto text-center">
            <h3 class="text-lg font-logo">Kontakt</h3>
            <p class="font-text text-sm mt-1">E-post: kontakt@glasolsson.se</p>
        </div>
        <div class="container mx-auto text-center">
            <h3 class="text-lg font-logo">Följ oss</h3>
            <p class="font-text text-sm mt-1">Facebook | Instagram | LinkedIn</p>
        </div>
    </div>

        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Glas Olsson. All rights reserved.
        </div>

    </footer>

</body>
</html>
