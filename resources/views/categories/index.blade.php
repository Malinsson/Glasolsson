@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')

<div aria-label="Kategorilista" class="w-full max-w-6xl mx-auto px-3 pb-3 pt-3">
    
    
    {{-- Header --}}
    <section class="font-text flex flex-row items-center justify-between pb-6 pt-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Kategorier</h2>
            {{ Breadcrumbs::render('kategorier') }}
        </div>
        <a href="{{ route('categories.create') }}" aria-label="Skapa ny kategori" class="btn-primary">
            Skapa ny kategori
        </a>
    </section>

    {{-- Total categories found --}}

    <p class="text-sm text-gray-600">{{ $categories->total() }} kategorier hittades</p>
    <div class="bg-white p-4 rounded-lg shadow-sm overflow-x-auto">


        {{-- Categories table --}}
        <table class="table" aria-label="Navigeringstabel för kategorier" aria-rowcount="{{ $categories->total() + 1 }}">
    
            <thead>
                <tr>
                    <th scope="col" class="th-col">ID</th>
                    <th scope="col" class="th-col">Namn</th>
                    <th scope="col" class="th-col"></th>
                    <th scope="col" class="th-col hidden lg:table-cell"></th>
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
                    <td class="td-cell hidden lg:table-cell">
                        <button 
                            type="button"
                            data-delete-url="{{ route('categories.destroy', ['category' => $category->id]) }}"
                            class="open-delete-modal inline-flex items-center gap-1 text-sm text-red-600 hover:text-red-900 font-medium hover:underline focus:outline-2"
                            aria-label="Radera {{ $category->name }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="w-4 h-4" fill="currentColor" aria-hidden="true">
                                <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                            </svg>
                            Radera
                        </button>
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
