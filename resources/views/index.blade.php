@extends('layouts.app')

@section('title', 'Index - Glas Olsson')

@section('content')

<div style="background-image: url('{{ asset('images/background.webp') }}');" class="bg-cover bg-center aspect-video min-h-screen hero-bg-shift">

    <div id="login-form" class="hidden items-center justify-center h-screen">
        <div class="bg-white bg-opacity-75 p-8 rounded shadow-md mx-4 w-full max-w-md">
            <span id="close-login" tabindex="0" class="focus:outline-2 focus:outline-indigo-500 rounded cursor-pointer float-right text-black text-4xl hover:text-gray-600">×</span>
            <h2 class="text-2xl mb-6 text-center"><strong>Login</strong></h2>

            <form method="post" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-black">Email</label>
                    <div class="mt-2">
                        <input name="email" id="email" type="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-2 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 invalid:border-red-500"/>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="password" class="block text-sm/6 font-medium text-black">Lösenord</label>
                    <input name="password" id="password" type="password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-2 -outline-offset-1 outline-black/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"/>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="mt-4 w-full bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer"><strong>Login</strong></button>
            
            </form>
        </div>
    </div>
</div>

<section id="products" class="flex flex-wrap justify-center pt-8 pb-16 bg-gray-200">
    <h2 class="text-4xl font-logo mb-8 text-center w-full"><strong>Produkter</strong></h2>

    @foreach ($products as $product)
        <div tabindex="0" class="bg-white w-sm flex flex-col justify-between items-center py-10 px-4 shadow-md m-4 hover:shadow-lg transition-shadow duration-300 rounded">
            <img src="{{ str_starts_with($product->image, 'images/stock/') ? asset($product->image) : asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover">
            <h3 class="text-text mt-2"><strong>{{ $product->name }}</strong></h3>
            <p class="mt-2"><span>{{ $product->color }}</span> <span>{{ $product->category?->name ?? 'Ingen kategori' }}</span></p>
            <p class="text-lg mt-2"><strong>{{ number_format($product->price, 2) }}:-</strong></p>
        </div>
    @endforeach

    <div class="w-full flex justify-center mt-8">
        {{ $products->links() }}
    </div>

</section>


@endsection
