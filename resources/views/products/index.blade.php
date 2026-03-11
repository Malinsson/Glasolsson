@extends('layouts.app')

@section('title', 'Produkter')

@section('content')

<section class="size-full pb-3 pt-3">
    
    <section class="p-3 pb-1">
        
        <div class="flex items-center justify-between pt-3 pb-12">
            <h2 class="text-2xl">Produkter</h2>
            <a class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded cursor-pointer" aria-label="Skapa ny produkt" href="{{ route('products.create') }}">Skapa ny produkt</a>
        </div>

        <form aria-label="Filtrera produkter" method="GET" action="{{ route('products.index') }}">

            {{-- Total products found --}}
            <p class="text-gray-500">{{ $products->total() }} produkter hittades</p>
    
            <div class="hidden sm:flex flex-row justify-between items-end">

                {{-- Categories --}}
                <div class="flex flex-col gap-1">
                    <label class="text-sm font-bold text-gray-700">Kategori</label>
                    <select name="categories[]" aria-label="Filtrera på kategori" class="text-gray-500 border border-gray-400 bg-white font-bold py-2 px-4 rounded cursor-pointer">
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
                <div class="hidden lg:flex flex-col">
                    <label class="text-sm font-bold text-gray-700">Material</label>
                    <select name="materials[]" aria-label="Filtrera på material" class="text-gray-500 border border-gray-400 bg-white font-bold py-2 px-4 rounded cursor-pointer">
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
                <div class="hidden lg:flex flex-col">
                    <label class="text-sm font-bold text-gray-700">Färg</label>
                    <select name="colors[]" aria-label="Filtrera på färg" class="text-gray-500 border border-gray-400 bg-white font-bold py-2 px-4 rounded cursor-pointer">
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
                <div class="hidden md:flex flex-col gap-1">
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
                        aria-label="Filtrera på maxpris"
                        aria-valuemin="1100"                 
                        aria-valuemax="3500"
                        class="w-48 cursor-pointer"
                    >
                </div>
            
                {{-- Buttons --}}
                <div class="flex flex-wrap-reverse items-center">
                    <button type="submit" aria-label="Applicera filter" class="bg-slate-600 hover:bg-slate-800 text-white font-bold py-2 px-4 rounded">
                        Applicera
                    </button>
                    <a href="{{ route('products.index') }}" aria-label="Återställ filter" class="text-gray-500 hover:underline py-3 px-4 text-">
                        Återställ
                    </a>
                </div>
            
            </div>
            
        </form>
    </section>

    <section class="border border-gray-400 flex-1 bg-white p-4 ">
        
        {{-- Products table --}}
        <table class="table" aria-label="Navigeringslista för utökad information om produkter" aria-rowcount="{{ $products->total() + 1 }}">
            
            <thead>
                <tr>
                    <th scope="col" class="th-col">ID</th>                              
                    <th scope="col" class="th-col">Namn</th>                         
                    <th scope="col" class="th-col hidden sm:table-cell">Kategori</th>   
                    <th scope="col" class="th-col hidden md:table-cell">Pris</th>    
                    <th scope="col" class="th-col hidden lg:table-cell">Material</th>
                    <th scope="col" class="th-col hidden lg:table-cell">Färg</th>    
                    <th scope="col" class="th-col"></th>                           
                </tr>
            </thead>
            
            <tbody>
                @forelse ($products as $product)
                    <tr class="tr-row" aria-label="Produktrad">
                        <td class="td-cell">{{ $product->id }}</td>
                        <td class="td-cell">{{ $product->name }}</td>
                        <td class="td-cell hidden sm:table-cell">{{ $product->category->name ?? 'Ingen kategori' }}</td>
                        <td class="td-cell hidden md:table-cell">{{ $product->price }} kr</td>
                        <td class="td-cell hidden lg:table-cell">{{ $product->material }}</td>
                        <td class="td-cell hidden lg:table-cell">{{ $product->color }}</td>
                        <td class="td-cell cursor-pointer" onclick="window.location='{{ route('products.show', $product->id) }}'">
                            <button class="flex items-center place-content-center gap-2">
                                <img src="{{ asset('icons/edit.svg')}}" alt="penna" class="w-6 h-6">
                                Ändra
                            </button>
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
        <nav role="navigation" aria-label="Pagination Navigering" class="pagination-white">
            {{ $products->links() }}
        </nav>
    </section>
</section>

@endsection