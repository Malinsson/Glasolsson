@extends('layouts.app')

@section('title', 'Produkter')

@section('content')

<section class="p-3">
    
    <div class="flex items-center justify-between">
        <h2 class="p-3 text-2xl">Produkter</h2>
        <a class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer" href="{{ route('products.create') }}">Skapa ny produkt</a>
    </div>
        
    <section class="p-3">
    
        <h2 class="p-3 text-2xl">Produkter</h2>
        
        <form method="GET" action="{{ route('products.index') }}">
    
            <div class="flex flex-row gap-8">
                {{-- Categories --}}
                <div class="mb-6">
                    <p class="font-bold mb-2">Kategori:</p>
                    <select name="categories[]">
                        <option value="" disabled selected hidden>Välj kategori</option>
                        @foreach ($categories as $category)
                            <label>
                                <option
                                    value="{{ $category->id }}"
                                    {{ in_array($category->id, request('categories', [])) ? 'selected' : '' }}
                                    >
                                {{ $category->name }}
                            </label>
                        @endforeach
                    </select>
                </div>
                
                {{-- Materials --}}
                <div class="mb-6">
                    <p class="font-bold mb-2">Material:</p>
                    <select name="materials[]">
                        <option value="" disabled selected hidden>Välj material</option>
                        @foreach ($materials as $material)
                        <label>
                            <option
                            value="{{ $material }}" 
                            {{ in_array($material, request('materials', [])) ? 'selected' : '' }}
                            >
                            {{ $material }}
                        </label>
                        @endforeach
                    </select>
                </div>
                
                {{-- Colors --}}
                <div class="mb-6">
                    <p class="font-bold mb-2">Färg:</p>
                    <select name="colors[]">
                        <option value="" disabled selected hidden>Välj färg</option>
                        @foreach ($colors as $color)
                        <label>
                            <option
                            value="{{ $color }}" 
                            {{ in_array($color, request('colors', [])) ? 'selected' : '' }}
                            >
                            {{ $color }}
                        </label>
                        @endforeach
                    </select>
                </div>
            </div>
    
            {{-- Price --}}
            <div class="mb-6">
                <p class="font-bold mb-2">Max Pris: <span id="priceDisplay">{{ request('max_price', 3500) }} kr</span></p>
                <input
                    type="range"
                    name="max_price"
                    min="1100"
                    max="3500"
                    step="100"
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

@endsection