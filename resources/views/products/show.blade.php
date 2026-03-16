@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')

<div class="w-full max-w-6xl mx-auto px-3 pb-3 pt-3">

    <section aria-label="Produktinformation">

        <section class="font-text pb-6 pt-6">
            <h2 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h2>
            {{ Breadcrumbs::render('products.show', $product) }}
            <a 
                href="{{ route('products.index') }}"
                aria-label="Gå tillbaka till produkter"
                class="btn-primary inline-flex items-center gap-2 mt-4"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-4 h-4" fill="#FFFFFF" aria-hidden="true">
                    <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/>
                </svg>
                Tillbaka
            </a>
        </section>
        
        <section class="font-text flex flex-col gap-3 w-full md:flex-row md:gap-6">

            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6 w-full md:w-1/2 flex flex-col gap-3 font-text pb-6 pt-6">
                <p>Id: {{$product->id}}</p>
                <strong class=" md:text-xl">Material:</strong>
                <p>{{$product->material}}</p>
                <strong class="md:text-xl">Färg:</strong>
                <p>{{$product->color}}</p>
                <strong class="md:text-xl">Pris:</strong>
                <p>{{$product->price}} kr</p>
                <strong class="md:text-xl">Kategori:</strong>
                <p>{{ $product->category?->name ?? 'Ingen kategori' }}</p>
            </div>
        
            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6 md:w-1/2 flex flex-col gap-3">
                <strong class="md:text-xl">Produktbild:</strong>
                <img src="{{ str_starts_with($product->image, 'images/stock/') ? asset($product->image) : asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class=" object-cover">
                <strong class="md:text-xl">Beskrivning:</strong>
                <p>{{$product->description}}</p>
            </div>
        </section>
    </section>
    <div class="flex flex-row justify-between gap-3 pb-3">
        <a href="{{ route('products.edit', $product->id) }}" aria-label="Redigera produkt" class="bg-slate-600 hover:bg-slate-800 text-white py-2 px-4 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">Redigera produkt</a>

        <form id="delete-form" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" style="display:inline;">
            @method('DELETE')
            @csrf
            <button id="open-delete-modal" type="button" aria-label="Radera produkt" class="bg-red-700 hover:bg-red-900 text-white py-2 px-4 rounded cursor-pointer focus:outline-2 focus:outline-indigo-500">Radera produkt</button>
        </form>

    </div>

</div>

@endsection