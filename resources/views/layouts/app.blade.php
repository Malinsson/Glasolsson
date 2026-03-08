<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Glasolsson')</title>
    <link rel="preload" href="{{ asset('images/background.webp') }}" as="image">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <header class="{{ request()->is('/') ? 'absolute bg-transparent' : 'bg-slate-800' }} flex justify-center w-full h-24 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-4xl font-logo">Glas Olsson</a>
            <nav>
                <ul class="flex space-x-4">
{{--                     <li><a href="{{ route('categories.index') }}" class="hover:underline">Kategorier</a></li>--}}
                    @if(auth()->check())
                        <li><a href="/dashboard" class="font-text font-light text-xl hover:underline">Dashboard</a></li> 
                        <li><a href="/logout" class="font-text font-light text-xl hover:underline">Logout</a></li>
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

    <div class="grid grid-cols-3 gap-4 mb-6 container mx-auto py-4">
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
