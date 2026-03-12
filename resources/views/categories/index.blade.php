@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')

<div aria-label="Kategorilista" class="w-full max-w-6xl mx-auto px-3 pb-3 pt-3">

    {{-- Header --}}
    <div class="flex items-center justify-between pb-6 pt-6">
        <h2 class="text-2xl"><strong>Kategorier</strong></h2>
        <a 
        class="bg-slate-700 hover:bg-slate-900 text-white text-sm font-semibold py-2 px-4 rounded transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500" 
        aria-label="Skapa ny kategori" 
        href="{{ route('categories.create') }}">
        Skapa ny kategori
        </a>
    </div>

    {{-- Total categories found --}}

    <p class="text-sm text-gray-500">{{ $categories->total() }} kategorier hittades</p>
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
                            <img src="{{ asset('icons/edit.svg')}}" alt="" class="w-4 h-4">
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
