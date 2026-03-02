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

    <header class="absolute w-full bg-transparent h-24 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-lg font-bold">Glas Olsson</a>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('categories.index') }}" class="hover:underline">Kategorier</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:underline">Produkter</a></li>
                    <li><a href="#" id="login-toggle" class="hover:underline cursor-pointer">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <main class="min-h-screen">

        @include('errors')
        @yield('content')

    </main>


    <footer class="bg-slate-700 text-white py-4">
        <div class="container mx-auto text-center">
            &copy; {{ date('Y') }} Glas Olsson. All rights reserved.
        </div>
    </footer>

</body>
</html>
