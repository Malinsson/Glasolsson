@extends('layouts.app')

@section('title', 'Produkter')

@section('content')

<div class="w-full max-w-6xl mx-auto px-3 pb-3 pt-3">

    {{-- Header --}}
    <div class="flex items-center justify-between pb-6 pt-6">
        <h2 class="text-2xl font-bold text-gray-900">Produkter</h2>
        <a 
            class="bg-slate-700 hover:bg-slate-900 text-white text-sm font-semibold py-2 px-4 rounded transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500" 
            href="{{ route('products.create') }}"
            aria-label="Skapa ny produkt">
            Skapa ny produkt
        </a>
    </div>

    {{-- Filter --}}
    <form 
    aria-label="Filtrera produkter" 
    method="GET" 
    action="{{ route('products.index') }}"
    class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm mb-6">
        <div class="flex flex-wrap gap-3 items-end">

            {{-- Categories --}}
            <div class="flex flex-col gap-1 min-w-35">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Kategori</label>
                <select 
                name="categories[]" 
                aria-label="Filtrera på kategori" 
                class="text-sm text-gray-700 border border-gray-300 bg-white py-2 px-3 rounded cursor-pointer">
                    <option value="" disabled selected hidden>Välj...</option>
                    @if ($null)
                        <option value="{{ $null }}" {{ in_array($null, request('categories', [])) ? 'selected' : '' }}>
                            Ingen kategori
                        </option>
                    @endif
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ in_array($category->id, request('categories', [])) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Materials --}}
            <div class="hidden md:flex flex-col gap-1 min-w-35">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Material</label>
                <select 
                name="materials[]" 
                aria-label="Filtrera på material" 
                class="text-sm text-gray-700 border border-gray-300 bg-white py-2 px-3 rounded cursor-pointer">
                    <option value="" disabled selected hidden>Välj...</option>
                    @foreach ($materials as $material)
                        <option value="{{ $material }}" {{ in_array($material, request('materials', [])) ? 'selected' : '' }}>
                            {{ $material }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Colors --}}
            <div class="hidden md:flex flex-col gap-1 min-w-35">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Färg</label>
                <select 
                name="colors[]" 
                aria-label="Filtrera på färg" 
                class="text-sm text-gray-700 border border-gray-300 bg-white py-2 px-3 rounded cursor-pointer">
                    <option value="" disabled selected hidden>Välj...</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color }}" {{ in_array($color, request('colors', [])) ? 'selected' : '' }}>
                            {{ $color }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Sort by --}}
            <div class="hidden lg:flex flex-col gap-1">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Sortera efter</label>
                <select
                    name="sort"
                    aria-label="Sortera produkter"
                    class="text-sm text-gray-700 border border-gray-300 bg-white py-2 px-3 rounded cursor-pointer">
                    <option value="id_asc" {{ request('sort', 'id_asc') === 'id_asc' ? 'selected' : '' }}>ID stigande</option>
                    <option value="id_desc" {{ request('sort') === 'id_desc' ? 'selected' : '' }}>ID fallande</option>
                    <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Namn A-Ö</option>
                    <option value="name_desc" {{ request('sort') === 'name_desc' ? 'selected' : '' }}>Namn Ö-A</option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Pris lägst först</option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Pris högst först</option>
                </select>
        </div>
        
            {{-- Price --}}
            <div class="hidden lg:flex flex-col gap-1">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">
                    Max Pris: <span id="priceDisplay" class="text-gray-800 normal-case">{{ request('max_price', 3500) }} kr</span>
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
                    class="w-40 cursor-pointer accent-slate-600">
            </div>

            {{-- Buttons --}}
            <div class="flex items-center gap-2 ml-auto">
                <a 
                    href="{{ route('products.index') }}" 
                    aria-label="Återställ filter" 
                    class="text-sm text-gray-500 hover:text-gray-800 hover:underline px-2 py-2 focus:outline-2">
                    Återställ
                </a>
                <button 
                    type="submit" 
                    aria-label="Applicera filter" 
                    class="bg-slate-700 hover:bg-slate-900 text-white text-sm font-semibold py-2 px-4 rounded cursor-pointer transition-colors duration-150 focus:outline-2">
                    Applicera
                </button>
            </div>

        </div>
    </form>

    {{-- Total products found --}}
    <p class="text-sm text-gray-600">{{ $products->total() }} produkter hittades </p>

    {{-- Products table --}}
    <div class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm overflow-x-auto">
        <table class="table" aria-label="Navigeringslista för utökad information om produkter" aria-rowcount="{{ $products->total() + 1 }}">
            <thead>
                <tr>
                    <th scope="col" class="th-col">ID</th>
                    <th scope="col" class="th-col">Namn</th>
                    <th scope="col" class="th-col hidden sm:table-cell">Kategori</th>
                    <th scope="col" class="th-col hidden lg:table-cell">Pris</th>
                    <th scope="col" class="th-col hidden lg:table-cell">Material</th>
                    <th scope="col" class="th-col hidden lg:table-cell">Färg</th>
                    <th scope="col" class="th-col"></th>
                </tr>
            </thead>
            
            <tbody>
                @forelse ($products as $product)
                    <tr class="tr-row" aria-label="Produktrad">
                        <td class="td-cell text-gray-400 text-xs">{{ $product->id }}</td>
                        <td class="td-cell font-medium">{{ $product->name }}</td>
                        <td class="td-cell hidden sm:table-cell">{{ $product->category->name ?? 'Ingen kategori' }}</td>
                        <td class="td-cell hidden lg:table-cell font-medium text-slate-700">{{ $product->price }} kr</td>
                        <td class="td-cell hidden lg:table-cell">{{ $product->material }}</td>
                        <td class="td-cell hidden lg:table-cell">{{ $product->color }}</td>
                        <td class="td-cell">
                            <a 
                                href="{{ route('products.show', $product->id) }}"
                                class="inline-flex items-center gap-1 text-sm text-slate-600 hover:text-slate-900 font-medium hover:underline focus:outline-2"
                                aria-label="Ändra {{ $product->name }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-4 h-4" fill="#000000" aria-hidden="true"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                                Ändra
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-gray-600 py-12">
                            Inga produkter hittades som matchade din sökning.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <nav 
    role="navigation" 
    aria-label="Pagination Navigering" 
    class="pagination-white pt-1">
        {{ $products->links() }}
    </nav>

</div>

@endsection