@extends('layouts.app')

@section('title', 'Produkter')

@section('content')

<section class="pb-3 pt-3">
    
    
    <section class="pb-1">
        
        <div class="flex items-center justify-between pt-3 pb-12">
            <h2 class="text-2xl">Produkter</h2>
            
            <a class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer" href="{{ route('products.create') }}">Skapa ny produkt</a>
        </div>

        {{-- Total products found --}}
        
        <form method="GET" action="{{ route('products.index') }}">

            <p class="text-gray-500">{{ $products->total() }} produkter hittades</p>
    
            <div class="flex flex-row justify-between items-end">

                {{-- Categories --}}
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-bold text-gray-700">Kategori</label>
                    <select name="categories[]" class="text-gray-500 border border-gray-400 bg-white font-bold py-2 px-4 rounded cursor-pointer">
                        <option value="" disabled selected hidden>Välj kategori</option>
                        @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ in_array($category->id, request('categories', [])) ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                {{-- Materials --}}
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-bold text-gray-700">Material</label>
                    <select name="materials[]" class="text-gray-500 border border-gray-400 bg-white font-bold py-2 px-4 rounded cursor-pointer">
                        <option value="" disabled selected hidden>Välj material</option>
                        @foreach ($materials as $material)
                            <option
                                value="{{ $material }}"
                                {{ in_array($material, request('materials', [])) ? 'selected' : '' }}
                            >
                                {{ $material }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                {{-- Colors --}}
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-bold text-gray-700">Färg</label>
                    <select name="colors[]" class="text-gray-500 border border-gray-400 bg-white font-bold py-2 px-4 rounded cursor-pointer">
                        <option value="" disabled selected hidden>Välj färg</option>
                        @foreach ($colors as $color)
                            <option
                                value="{{ $color }}"
                                {{ in_array($color, request('colors', [])) ? 'selected' : '' }}
                            >
                                {{ $color }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                {{-- Price --}}
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-bold text-gray-700">
                        Max Pris: <span id="priceDisplay">{{ request('max_price', 3500) }} kr</span>
                    </label>
                    <input
                        type="range"
                        name="max_price"
                        min="1100"
                        max="3500"
                        step="100"
                        value="{{ request('max_price', 3500) }}"
                        id="priceSlider"
                        class="w-48 cursor-pointer"
                    >
                </div>
            
                {{-- Buttons --}}
                <div class="flex gap-2 items-center">
                    <button type="submit" class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded">
                        Applicera
                    </button>
                    <a href="{{ route('products.index') }}" class="text-gray-500 hover:underline px-2">
                        Återställ
                    </a>
                </div>
            
            </div>
            
        </form>
    </section>
    
    <section class="border border-gray-400 flex-1 bg-white p-4">
        
        {{-- Products table --}}
        <table class="w-full border-collapse text-sm text-left " aria-label="navigation list for extended information about products">
            
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