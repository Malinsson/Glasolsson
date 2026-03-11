@extends('layouts.app')

@section('title', 'Index - Glas Olsson')

@section('content')

<section class="relative min-h-screen overflow-hidden bg-slate-800">
    <img
        src="{{ asset('images/background.webp') }}"
        alt=""
        aria-hidden="true"
        fetchpriority="high"
        loading="eager"
        decoding="sync"
        class="absolute inset-0 h-full w-full object-cover hero-bg-shift"
    >

    <div class="relative z-50 h-full">
        @include('layouts.partials.login-form')
    </div>

    <div class="absolute z-10 flex flex-col justify-end-safe h-full px-8">
        <h1 class="text-5xl md:text-8xl font-logo text-white mb-6">Glas Olsson</h1>
        <p class="font-text text-lg md:text-xl text-white mb-8 max-w-2xl">Din pålitliga partner för kvalitetsglas och speglar.</p>
    </div>

</section>

<section id="products" class="flex flex-wrap justify-center pt-8 pb-16 bg-gray-200 ">
    <h2 class="text-4xl font-logo mb-8 text-center w-full"><strong>Produkter</strong></h2>
    <div class="w-full max-w-6xl mx-auto px-8 md:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-4" >
        @foreach ($products as $product)
            <div tabindex="0" class="bg-white w-full flex flex-col justify-between items-center py-6 px- shadow-md hover:shadow-lg transition-shadow duration-300 rounded">
                <div class="w-full h-55 flex items-center justify-center rounded overflow-hidden">
                    <img src="{{ str_starts_with($product->image, 'images/stock/') ? asset($product->image) : asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover">
                </div>
                <h3 class="text-text mt-2"><strong>{{ $product->name }}</strong></h3>
                <p class="mt-2"><span>{{ $product->color }}</span> <span>{{ $product->category?->name ?? 'Ingen kategori' }}</span></p>
                <p class="text-lg mt-2"><strong>{{ number_format($product->price, 2) }}:-</strong></p>
            </div>
        @endforeach
    </div>
    <div class="w-full flex justify-center mt-8">
        {{ $products->links() }}
    </div>

</section>


@endsection
