@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')

<header>
    <nav>
        <a href="/dashboard">Dashboard</a>
        
            <a href="{{ route('products.create') }}">Skapa produkt</a>
    </nav>
</header>

<main class="p-3">
    <section class="p-3">
    
        <h2 class="p-3 text-2xl">Produkter</h2>
        
        <form method="GET" action="{{ route('products.index') }}">
    
            {{-- Categories --}}
            <div class="mb-6">
                <p class="font-bold mb-2">Kategori:</p>
                @foreach ($categories as $category)
                    <label class="flex items-center gap-2 mb-1">
                        <input
                            type="checkbox"
                            name="categories[]"
                            value="{{ $category->id }}"
                            {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}
                            class="rounded">
                        {{ $category->name }}
                    </label>
                @endforeach
            </div>
    
            {{-- Colors --}}
            <div class="mb-6">
                <p class="font-bold mb-2">Färg:</p>
                @foreach ($colors as $color)
                    <label class="flex items-center gap-2 mb-1">
                        <input
                            type="checkbox"
                            name="colors[]"
                            value="{{ $color }}"
                            {{ in_array($color, request('colors', [])) ? 'checked' : '' }}
                            class="rounded">
                        {{ $color }}
                    </label>
                @endforeach
            </div>
    
            {{-- Materials --}}
            <div class="mb-6">
                <p class="font-bold mb-2">Material:</p>
                @foreach ($materials as $material)
                    <label class="flex items-center gap-2 mb-1">
                        <input
                            type="checkbox"
                            name="materials[]"
                            value="{{ $material }}"
                            {{ in_array($material, request('materials', [])) ? 'checked' : '' }}
                            class="rounded">
                        {{ $material }}
                    </label>
                @endforeach
            </div>
    
            {{-- Price --}}
            <div class="mb-6">
                <p class="font-bold mb-2">
                    Max Pris: <span id="priceDisplay"> {{ request('max_price', 3500) }} kr </span>
                </p>
                <input
                    type="range"
                    name="max_price"
                    min="1100"
                    max="3500"
                    value="{{ request('max_price', 3500) }}"
                    id="priceSlider"
                >
            </div>
    
            {{-- button --}}
            <button type="submit" class="p-3 bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                Apply
            </button>
            <a href="{{ route('products.index') }}" class="p-3 text-center mt-2 text-gray-500 hover:underline">
                Reset
            </a>
    
        </form>
    </section>
    
    <section class="flex-1">
    
        {{-- Total products found --}}
        <p class="text-gray-500 mb-4"> {{ $products->total() }} products found</p>
        
        {{-- Products table --}}
        <table class="w-full table-fixed border-collapse text-sm text-left" aria-label="navigation list for extended information about products">
            
            <thead>
                <tr>
                    <th class="table-col">ID</th>
                    <th class="table-col">Namn</th>
                    <th class="table-col">Material</th>
                    <th class="table-col">Färg</th>
                    <th class="table-col">Pris</th>
                    <th class="table-col">Kategori</th>
                    <th class="table-col"></th>
                </tr>
            </thead>
    
            <tbody>
                @forelse ($products as $product)
                    <tr class="table-row" aria-label="a table list of the products"> 
                        <td class="table-cell"> {{ $product->id }} </td>
                        <td class="table-cell"> {{ $product->name }} </td> 
                        <td class="table-cell"> {{ $product->material }} </td>  
                        <td class="table-cell"> {{ $product->color }} </td> 
                        <td class="table-cell"> {{ $product->price }} kr</td>  
                        <td class="table-cell">
                            {{ $product->category->name ?? 'Ingen kategori' }}
                        </td>
                        <td class="table-cell cursor-pointer" onclick="window.location='{{ route('products.show', $product->id) }}'">
                            <div class="flex items-center place-content-center gap-2">
                                <img src="{{ asset('icons/edit.svg')}}" alt="pen" class="w-6 h-6">
                                <span>Ändra</span>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-gray-500 p-4">Inga produkter hittades som matchade din sökning.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    
        {{-- Pagination --}}
        <div class="pagination-white">
            {{ $products->links() }}
        </div>
    </section>
</main>

{{-- Price slider --}}
<script src="{{ asset('js/products-filter.js') }}" defer></script>

@endsection