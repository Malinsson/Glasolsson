@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')

<div aria-label="Kategorilista" class="w-full max-w-6xl mx-auto px-3 pb-3 pt-3">
    
    
    {{-- Header --}}
    <section class="font-text flex flex-col gap-3 md:flex-row md:gap-6 pb-6">
        <div class="font-text pb-6 pt-6 w-full">
            <h2 class="text-2xl"><strong>Kategorier</strong></h2>
            {{ Breadcrumbs::render('kategorier') }}
        </div>
        <div class="flex items-center md:items-start md:justify-end md:pl-4">
            <a 
            class="bg-slate-700 hover:bg-slate-900 text-white text-sm font-semibold py-2 px-4 rounded transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500" 
            aria-label="Skapa ny kategori" 
            href="{{ route('categories.create') }}">
            Skapa ny kategori
            </a>
        </div>
    </section>

    {{-- Total categories found --}}

    <p class="text-sm text-gray-600">{{ $categories->total() }} kategorier hittades</p>
    <div class="bg-white p-4 rounded-lg shadow-sm overflow-x-auto">


        {{-- Categories table --}}
        <table class="table" aria-label="Navigeringslista för kategorier" aria-rowcount="{{ $categories->total() + 1 }}">
    
            <thead>
                <tr>
                    <th scope="col" class="th-col">ID</th>
                    <th scope="col" class="th-col">Namn</th>
                    <th scope="col" class="th-col"></th>
                </tr>
            </thead>
    
            <tbody>
                @foreach ($categories as $category)
                <tr class="tr-row" aria-label="Rad för kategori: {{ $category->name }}"> 
                    <td class="td-cell">{{ $category->id }}</td>
                    <td class="td-cell">{{ $category->name }}</td>
                    <td class="td-cell">
                        <a 
                            href="{{ route('categories.show', $category->id)}}"
                            class="inline-flex items-center gap-1 text-sm text-slate-600 hover:text-slate-900 font-medium hover:underline focus:outline-2"
                            aria-label="Ändra {{ $category->name }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-4 h-4" fill="#000000" aria-hidden="true"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                            Ändra
                        </a>
                    </td>
                </tr>
                                    
                @endforeach
            </tbody>
        </table>
    
        {{-- Pagination --}}
        <nav 
        role="navigation" 
        aria-label="Pagination Navigering" 
        class="pagination-white">
            {{ $categories->links() }}
        </nav>
    </div>
</div>

@endsection
