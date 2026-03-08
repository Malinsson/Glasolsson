@extends('layouts.app')

@section('title', 'Redigera kategori')

@section('content')

<section class="p-3">

    <a href="/dashboard">Dashboard</a>

    <a href="{{ route('products.create') }}">Skapa produkt</a>

    <h2 class="p-3 text-2xl">Produkter</h2>
    
    <form method="GET" action="{{ route('products.index') }}">

        {{-- Categories --}}
        <div>
            <p>Kategori:</p>
            @foreach ($categories as $category)
                <label>
                    <input
                        type="checkbox"
                        name="categories[]"
                        value="{{ $category->id }}"
                        {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                    {{ $category->name }}
                </label>
            @endforeach
        </div>

        {{-- Colors --}}
        <div>
            <p>Färg:</p>
            @foreach ($colors as $color)
                <label>
                    <input
                        type="checkbox"
                        name="colors[]"
                        value="{{ $color }}"
                        {{ in_array($color, request('colors', [])) ? 'checked' : '' }}>
                    {{ $color }}
                </label>
            @endforeach
        </div>

        {{-- Materials --}}
        <div>
            <p>Material:</p>
            @foreach ($materials as $material)
                <label>
                    <input
                        type="checkbox"
                        name="materials[]"
                        value="{{ $material }}"
                        {{ in_array($material, request('materials', [])) ? 'checked' : '' }}>
                    {{ $material }}
                </label>
            @endforeach
        </div>

        {{-- Price --}}
        <div>
            <p>
                Max Pris: <span id="priceDisplay"> {{ request('max_price', 3500) }} kr </span>
            </p>
            <input
                type="range"
                name="max_price"
                min="1100"
                max="3500"
                value="{{ request('max_price', 3500) }}"
                id="priceSlider">
        </div>

        {{-- button --}}
        <button> Apply </button>
        <button> Reset </button>

    </form>
</section>

<section class="flex-1">

    {{-- Total products found --}}
    <p> {{ $products->total() }} produkter hitades</p>
    
    {{-- Products table --}}
    <table class="w-full table-fixed border-collapse text-sm text-left" aria-label="navigation list for extended information about products">
        
        <thead>
            <tr>
                <th class="border-b border-black-100 p-4 pl-8 text-left">ID</th>
                <th class="border-b border-black-100 p-4 pl-8 text-left">Namn</th>
                <th class="border-b border-black-100 p-4 pl-8 text-left">Material</th>
                <th class="border-b border-black-100 p-4 pl-8 text-left">Färg</th>
                <th class="border-b border-black-100 p-4 pl-8 text-left">Pris</th>
                <th class="border-b border-black-100 p-4 pl-8 text-left"></th>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $product)
                <tr class="border-b border-black-200 p-4 pt-0 pr-8 pb-3 font-medium text-black-400" aria-label="a table list of the products"> 
                    <td class="border-b border-black-100 p-4 pl-8 text-left text-black-500"> {{ $product->id }} </td>
                    <td class="border-b border-black-100 p-4 pl-8 text-left text-black-500"> {{ $product->name }} </td> 
                    <td class="border-b border-black-100 p-4 pl-8 text-left text-black-500"> {{ $product->material }} </td>  
                    <td class="border-b border-black-100 p-4 pl-8 text-left text-black-500"> {{ $product->color }} </td> 
                    <td class="border-b border-black-100 p-4 pl-8 text-left text-black-500"> {{ $product->price }} kr</td>  
                    <td class="border-b border-black-100 p-4 pl-8 text-left text-black-500 cursor-pointer" onclick="window.location='{{ route('products.show', $product->id) }}'">
                        <div class="flex items-center place-content-center gap-2">
                            <img src="{{ asset('icons/edit.svg')}}" alt="pen" class="w-6 h-6">
                            <span>Ändra</span>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Inga produkter hittades som matchade din sökning.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="pagination-white">
        {{ $products->links() }}
    </div>
</section>

{{-- Price slider --}}
<script src="{{ asset('js/products-filter.js') }}" defer></script>

@endsection