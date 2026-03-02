<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Glasolsson')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div style="background-image: url('{{ asset('images/background.png') }}');" class="bg-cover bg-center bg-fixed min-h-screen">
    <header class="bg-transparent h-24 text-white py-4 backdrop-blur-sm">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-lg font-bold">Glasolsson</a>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('categories.index') }}" class="hover:underline">Kategorier</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:underline">Produkter</a></li>
                    <li><a href="/dashboard" class="hover:underline">Dashboard</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <main class="mx-auto max-w-5xl px-4 py-8>
        @include('errors')
        @yield('content')
    </main>

    </div>

    <footer class="bg-cyan-500 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Glasolsson. All rights reserved.
        </div>
    </footer>

</body>
</html>