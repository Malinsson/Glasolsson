@extends('layouts.app')

@section('title', 'Index - Glas Olsson')

@section('content')

<div class="relative aspect-video min-h-screen overflow-hidden bg-slate-800">
    <img
        src="{{ asset('images/background.webp') }}"
        alt=""
        aria-hidden="true"
        fetchpriority="high"
        loading="eager"
        decoding="sync"
        class="absolute inset-0 h-full w-full object-cover hero-bg-shift"
    >

    <div class="relative z-10 h-full">
        @include('layouts.partials.login-form')
    </div>
</div>

<section id="products" class="flex flex-wrap justify-center pt-8 pb-16 bg-gray-200 ">
    <h2 class="text-4xl font-logo mb-8 text-center w-full"><strong>Produkter</strong></h2>
    <div class="flex flex-wrap justify-center pt-4 max-w-7xl mx-auto" >
        @foreach ($products as $product)
            <div tabindex="0" class="bg-white w-sm flex flex-col justify-between items-center py-10 px-4 shadow-md m-4 hover:shadow-lg transition-shadow duration-300 rounded">
                <div class="w-full h-64 flex items-center justify-center rounded overflow-hidden">
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
